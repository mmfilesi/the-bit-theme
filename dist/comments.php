<?php /* the bit jazz band */ ?>

<div id="commentarios" class="borde_derecha_verde padding_horizontal_derecha columna_estrecha">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'Este art&iacute;culo est&aacute; protegido. Introduzca la contrase&ntilde;a para ver los comentarios.', 'thebit' ); ?></p>
	</div><!-- #commentarios -->
	<?php
			return;
		endif;
	?>	
	
	<?php if ( have_comments() ) : ?>
		<h3>
			<?php
				printf( _n( 'Una respuesta a &ldquo;%2$s&rdquo; ', '%1$s respuestas a &ldquo;%2$s&rdquo;', get_comments_number(), 'thebit' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Navegación comentarios ?>
		<nav id="comment-nav-above">			
			<span class="nav-previous"><?php previous_comments_link( __( '&larr; Comentarios antiguos', 'thebit' ) ); ?></span>
			<span class="nav-next"><?php next_comments_link( __( 'Comentarios recientes &rarr;', 'thebit' ) ); ?></span>
		</nav>
		<?php endif; // #Navegación comentarios ?>

		<ol class="commentlist">
			<?php	// Llamo a la función thebit_comment para el loop de los comentarios		
				wp_list_comments( array( 'callback' => 'thebit_comment' ) );
			?>
		</ol>

	<?php
		/* Si los comentarios están cerrados */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Los comentarios est&aacuten cerrados.', 'thebit' ); ?></p>
	<?php endif; ?>
	<div id="contenedor_formulario_comentarios"> 
	<!-- Formulario comentarios -->
	<?php // Llamo a esta función para cambiar los elementos que vienen por defecto en WP
	$comments_args = cambiar_argumentos();	?>
	<?php comment_form($comments_args); ?>
	</div> <!-- #contenedor_formulario_comentarios -->
	
</div><!-- #commentarios -->