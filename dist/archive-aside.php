	<div itemscope itemtype="http://schema.org/BlogPosting"> <!-- microdatos -->	
	
	<?php // paginacion( 'nav-above' ); ?>
	
	<div class="contenedor_microblogging"> <!-- layout microblogging -->	
	<?php
	// armamos la query /añadir post_per_page en otro momento para mostrar varias páginas	
	$categoria_microblogging=44;
	$query_post = new WP_Query('post_status=publish&showposts=30&cat='.$categoria_microblogging); ?>
	
	<?php if ( have_posts() ) : while ($query_post->have_posts() ) : $query_post->the_post(); ?>
	
	<article class="microblog-capsula">
	<header>
	<h6>&#123;<span itemprop="name"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></span>&#125;</h6>
	</header>
	<aside class="microblog-capsula-metadatos">
	<?php echo get_the_date(Y-m-d); ?> &#124;&#124; <a href="<?php echo get_permalink(); ?>">comentarios: <?php echo get_comments_number(); ?></a>
	</aside>
	<section class="microblog-capsula-contenidos">
	<span itemprop="articleBody"<?php the_content(); ?></span>
	</section>	
	</article>
	
	<?php endwhile; 
		wp_reset_query(); ?> 	
	
	</div> <!-- #layout microblogging -->
	
	<?php else : ?>
				
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h3>Sin resultados <img src="<?php echo get_template_directory_uri(); ?>/images/sm_desconcierto.gif" width="18px" height="18px" class="imagenes_fijas" /></h3>
					</header><!-- .entry-header -->

					<div>
						<p>Disculpas, pero no hay resultados para esta b&uacute;squeda. </p>
						<p> Puedes <a href="index.php">ir a la portada </a> o probar con otras palabras</p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->	
				</div>  <!-- #layout microblogging -->
	<?php endif; ?>	
	
	
	</div> <!-- microdatos -->
