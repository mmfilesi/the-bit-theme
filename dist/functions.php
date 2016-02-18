<?php
/*
* @package WordPress
* @subpackage mmfilesi-bones
* @since mmfilesi-bones 1.0
*/
?><?php

/*-----------------------------------------------
Funcionalidades añadidas
----------------------------------------------- */

/* Añadir miniaturas
----------------------------------------------- */

add_theme_support( 'post-thumbnails' );

/* Para escapar caracteres
----------------------------------------------- 
fuente: http://www.ilertech.com/2011/06/escape-wordpress-shortcodes-in-content-with-a-shortcode/ 
*/

function escapeHTML($atts, $content=null){
        $plus1_code = htmlentities($content);
        return $plus1_code;
	}
 
add_shortcode('esc', 'escapeHTML');

/* Para meter shortcodes en el sidebar
----------------------------------------------- */	

add_filter('widget_text', 'do_shortcode');


/* Para trabajar con variables globales
----------------------------------------------- */

if ( !session_id() )
add_action( 'init', 'session_start' );
if ( !session_id() )add_action( 'init', 'session_start' ); 

/* Estilos en el panel TyniMCE
----------------------------------------------- */	

// add_editor_style('estilos-tiny.css');

function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Code Violet',  
			'block' => 'span',  
			'classes' => 'color-code-violet',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Code Blue',  
			'block' => 'span',  
			'classes' => 'color-code-violet',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Code Red',  
			'block' => 'span',  
			'classes' => 'color-code-violet',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Code Orange',  
			'block' => 'span',  
			'classes' => 'color-code-violet',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'Code Coment',  
			'block' => 'span',  
			'classes' => 'color-code-violet',
			'wrapper' => true,
			
		)
	);  


	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function my_theme_add_editor_styles() {
    add_editor_style( 'estilos-tiny.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

/* Formatos de entrada
----------------------------------------------- */	

add_theme_support( 'post-formats', array( 'aside','chat', 'link', 'status', 'quote', 'video', 'audio','image', 'gallery' ) );

/* Quita las putas comillas artísticas
----------------------------------------------- */

remove_filter('the_content', 'wptexturize'); 


/*-----------------------------------------------
Querys
----------------------------------------------- */

$numero_de_post_destacados = 1;
$categorias_excluidas=-44;

function cambia_queries ( $query  ) {	
	if ( ! is_admin()&& is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 18 );
        $query->set( 'cat', -44);
		// $query->set( 'offset', 1);        
        return;
    }    
}

add_action( 'pre_get_posts', 'cambia_queries' , 1); 


/*-----------------------------------------------
Formularios
----------------------------------------------- */	
	

/*-----------------------------------------------
	Taxonomías
----------------------------------------------- */

// Series

add_action( 'init', 'create_taxonomia_series', 0 );

function create_taxonomia_series() { 

  $labels = array(
    'name' => __( 'series', 'thebit' ),
    'singular_name' => __( 'Serie', 'thebit' ),
    'search_items' =>  __( 'Buscar serie', 'thebit' ),
    'popular_items' => __( 'Series más usadas', 'thebit' ),
    'all_items' => __( 'Todas las series', 'thebit' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar serie', 'thebit' ),
    'update_item' => __( 'Actualizar serie', 'thebit' ),
    'add_new_item' => __( 'Añadir nueva serie', 'thebit' ),
    'new_item_name' => __( 'Nombre de la nueva serie', 'thebit' ),
    'separate_items_with_commas' => __( 'Separa las referencias por comas', 'thebit' ),
    'add_or_remove_items' => __( 'Añadir o borrar serie', 'thebit' ),
    'choose_from_most_used' => __( 'Series m&aacute;s usadas', 'thebit' ),
    'menu_name' => __( 'Series', 'thebit' ),
  ); 

  register_taxonomy('series', array('post'),array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'series' ),
  ));
} 


/* Short Codes //// METER EN UN PLUGIN
----------------------------------------------- */	
// destacados

function shortcode_destacados($atts, $content = null) {
	extract(shortcode_atts(array('micropost'=> '1'), $atts));
	$query_post = new WP_Query('post_status=publish&cat=44&showposts='.$micropost); 
	if ( have_posts() ) : while ($query_post->have_posts() ) : $query_post->the_post();
	// Esto que sigue se podría armar todo en una cadena, pero prefiero separarlo para que quede más claro
	/* $fecha=get_the_date(Y-m-d); */
	$contenido=get_the_content();
	$tip ="<div class='microblogging'>".$contenido."</div>";
	endwhile;
	wp_reset_query();
	endif;		
	$tip .="<div class='centrado'><a href='http://www.mmfilesi.com/blog/type/aside/'>ver &#43; microentradas</a></div>";
	return "<div class='microblogging'>".$tip."</div>";
}
add_shortcode('destacados', 'shortcode_destacados');

function shortcode_misma_categoria($atts, $content = null) {
	extract(shortcode_atts(array('entradas'=> '1'), $atts));
	$categoria = get_the_category();
	$query_post = new WP_Query('post_status=publish&cat='.$categoria.'&showposts='.$entradas); 
	if ( have_posts() ) : while ($query_post->have_posts() ) : $query_post->the_post();
	$titulo=get_the_title();
	$tip ="<div class='microblogging'>".$titulo."</div>";
	endwhile;
	wp_reset_query();
	endif;		
	$tip .="<div class='centrado'><a href='http://www.mmfilesi.com/blog/type/aside/'>ver &#43; microentradas</a></div>";
	return "<div class='microblogging'>".$tip."</div>";
}
add_shortcode('categoria', 'shortcode_misma_categoria');


function shortcode_panel($atts, $content = null) {
	$content = do_shortcode($content);
	if (!$atts) {
		$atts = "dred";
	}
	/* $content = str_replace("<ul>","<ul class='linenums'>",$content);
	$content = str_replace("<ol>","<ol class='linenums'>",$content);
	$content = str_replace("<em>","<span style='margin-left:3em;'>",$content);
	$content = str_replace("</em>","</span>",$content); */
	return "<div class='panel-destacados ".$atts."'>".$content."</div>";
}
add_shortcode('panel', 'shortcode_panel');


/* Comentarios -> Mostrar
----------------------------------------------- */	

add_theme_support( 'automatic-feed-links' );

if ( ! function_exists( 'thebit_comment' ) ) :

function thebit_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'thebit' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'thebit' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comentario-singular">
			<div class="comment-meta negrita">
				<div class="comment-author">
					<?php
						$avatar_size = 32;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 19;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '<span class="autor-comentario"> %1$s el %2$s  dijo: </span>', 'thebit' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s a las %2$s', 'thebit' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'thebit' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comentarios-espera-moderacion"><?php _e( 'Gracias por el aporte. Su comentario ser&aacute aprobado en breve.', 'thebit' ); ?></em>
					<br />
				<?php endif; ?>

			</div>

			<div class="commentarios-desarrollo"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Responder <span>&darr;</span>', 'thebit' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()

/* Comentarios -> Panel de escritura
----------------------------------------------- */	
// Campos (Autor, URL y correo)

function alter_comment_form_fields($fields){
    $fields['author'] = '<p class="negrita">'.'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
						'<label for="author">' . __( ' nombre/alias*','thebit') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'</p>';
    $fields['email'] = '<p class="negrita">'.'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_email'] ) . '" size="30"' . $aria_req . ' />'.
						'<label for="negrita">' . __( ' e-mail*','thebit') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'</p>'; 
    $fields['url'] = '<p class="campo-formulario negrita">'.'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_url'] ) . '" size="30"' . $aria_req . ' />'.
						'<label for="url">' . __( ' web','thebit') . '</label> ' . '</p>'; 
    return $fields;
}

add_filter('comment_form_default_fields','alter_comment_form_fields');

/* Cadenas */

function cambiar_argumentos(){
	$comments_args = array (        
        'title_reply'=>'<h4 class="margenes_verticales_peques bandas_verdes">Aportar un comentario</h4>',
        'comment_notes_after'=>'',
        'comment_notes_before' => '',
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( '<span class="negrita">comentario </span><br />','thebit') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="fuente_verde bordes_naranjas"></textarea></p>',
		'id_submit'=>'submit-comentarios',
		'class_submit' => 'class="botonesVerdes',
		'label_submit' => 'enviar comentario',
		);	
	return $comments_args;
}


?>