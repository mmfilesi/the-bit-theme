<?php /* The Bit Jazz Band - index aka home */ ?>

<?php get_header(); ?>
	
        <div class="grid-container"> <!-- main layout -->

                <section class="main-container-summaries grid-cell grid-cell-9 grid-sep-right-02">

                    <div class="slider-main-container grid-container box-standar box-slider" id="js-carrousel"> <!-- slider -->
                        <article class="box-standar box-slider grid-row" id="js-lastEntry-0">
                            <div class="img-container grid-cell grid-cell-6">
                                <a href="http://www.mmfilesi.com/blog/harmony-3-introduccion-a-babel/">
                                    <img src="http://www.mmfilesi.com/wp-content/uploads/2016/01/christian-schloe-03.jpg" class="img-responsive img-links" alt="Christian Schloe">
                                </a>
                            </div>
                            <div class="content grid-cell grid-cell-6">
                                <header class="title">
                                    <a href="http://www.mmfilesi.com/blog/harmony-3-introduccion-a-babel/">harmony: 3. introducción a babel</a>
                                </header>
                                <p class="summary">Introducción al compilador de javaScript Babel.</p>
                                 <aside class="complementary">
                                    <span itemprop="about"><a href="http://www.mmfilesi.com/blog/category/javascript/">JavaScript</a></span> :: <a href="http://www.mmfilesi.com/blog/category/javascript/">Polymer</a>
                                </aside>                           
                            </div>
                        </article>
                    </div>  <!-- #slider -->

                    <nav class="secondary-nav" id="js-secondaryNav">
                        <span class="icon-cogs icon"></span>
                        <div class="categories">
                            <span class="link js-filterCategory" data-category="all">todas</span> <span class="sep">|</span> 
                            <span class="link js-filterCategory" data-category="internet">internet</span> <span class="sep">|</span> 
                            <span class="link js-filterCategory" data-category="javascript">javascript</span> <span class="sep">|</span> 
                            <span class="link js-filterCategory" data-category="php">php</span> <span class="sep">|</span>
                            <span class="link js-filterCategory" data-category="wordpress">wordpress</span> <span class="sep">|</span>
                            <span class="link js-filterCategory" data-category="html">html</span> <span class="sep">|</span>
                            <span class="link js-filterCategory" data-category="electronica">electrónica</span> <span class="sep">|</span> 
                            <span class="link js-filterCategory" data-category="varios">varios</span>                                
                        </div>
                        <div class="pagination" id="js-layoutSummaries-pagination"></div> 
                    </nav>
                    <div class="flex-container fade" id="js-layoutSummaries"> <!-- grid sumaries -->
                    </div>

                    <div class="end-layout">
                        <img src="<?php bloginfo('template_directory'); ?>/img/remate_gris.png">
                    </div>

                </section>

				<?php require_once('main-sidebar.php'); ?>

        </div> <!-- #main layout -->
	
<?php
$args = array (
	'cat' => '-44',
	'posts_per_page' => '-1'
	);

$todoArticulos = array();

$query_post = new WP_Query( $args );

if ( have_posts() ) : while ($query_post->have_posts() ) : $query_post->the_post();

	//$itemTemp['enlace'] = "<a href='". get_permalink() ."'>";		
	$itemTemp['enlace'] = get_permalink();	

	$titular = get_the_title();
	$caracteres_titular=strlen($titular);
	if ($caracteres_titular > 55) {
		$titular = substr($titular, 0, 55)."&hellip;";
	} 
	$itemTemp['titulo'] = $titular;	

	$category = get_the_category(); 
	if($category[0]){
		$categoria = "<a href='".get_category_link($category[0]->term_id )."'>".$category[0]->cat_name."</a>";
		$idCategoria = $category[0]->slug;
	}
	$itemTemp['categoria'] 	 = $categoria;
	$itemTemp['idCategoria'] = $idCategoria;

	$sumario = get_the_excerpt();
	$caracteres_sumario=strlen($sumario);
	if ($caracteres_sumario > 100) {
		$sumario = substr($sumario, 0, 100)."&hellip;";
	}
	$itemTemp['sumario'] = $sumario;

	if ( has_post_thumbnail() ) { 
		//$imagen = get_the_post_thumbnail('thumbnail', array('class' => 'imagenes_elasticas esquinas_redondeadas_muy_peques opacidad_hover' ));
		$imagen = get_the_post_thumbnail(  $post_id, 'thumbnail' );
	} else {
		$imagen = "<img src='<?php echo get_template_directory_uri(); ?>/img/sinimagen.jpg' class='imagenes_elasticas esquinas_redondeadas_muy_peques opacidad_hover' />";
	}
	$itemTemp['imgDestacada'] = $imagen;

	$itemTemp['tags'] = get_the_tag_list();

	$itemTemp['fecha'] = get_the_date(Y-m-d);

	array_push($todoArticulos, $itemTemp);

	endwhile;

endif;

wp_reset_query(); 
wp_reset_postdata();

?>

<script>
var todoArticulos = <?php echo json_encode($todoArticulos); ?>;
</script>

<?php get_footer(); ?>
