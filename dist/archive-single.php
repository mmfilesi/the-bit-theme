        <div class="category-content">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="category-box box-standar flex-container">
                <div class="block-img">
                    <a href="http://www.mmfilesi.com/blog/express-6-request/">
                    <?php	
                    if ( has_post_thumbnail() ) { 
						the_post_thumbnail('medium', array('class' => 'img-links img-responsive' ));
						} else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/sinimagen.jpg"  class="img-links img-responsive" >
					<?php } ?>
                    </a>
                
                </div>
                <div class="block-summary"> 
            		<?php 
					$titular=get_the_title();
					$caracteres_titular=strlen($titular);
					if ($caracteres_titular > 40) {
					$titular = substr($titular, 0, 40)."&hellip;";
					} ?>        
                    <h5 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo $titular; ?></a></h5>
		            <?php
						$sumario = get_the_excerpt();
						$caracteres_sumario=strlen($sumario);
						if ($caracteres_sumario > 150) {
						$sumario = substr($sumario, 0, 150)."&hellip;";
					}  ?>
                    <p class="summary"><?php echo $sumario ?></p> 
                </div>
            </article>

		<?php endwhile; ?> <!-- final del loop -->

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h3><?php _e('Sin resultados','thebit') ?> <img src="<?php echo get_template_directory_uri(); ?>/img/sm_desconcierto.gif" width="18px" height="18px" class="imagenes_fijas" /></h3>
				</header><!-- #entry-header -->

				<div>
					<p><?php _e('Disculpas, pero no hay resultados para esta b&uacute;squeda.','thebit') ?></p>
					<p> Puedes <a href="index.php"><?php _e('ir a la portada','thebit') ?> </a><?php _e(' o probar con otras palabras','thebit') ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->	

		<?php endif; ?>	
        
        </div>


        <div class="end-layout">
            <img src="<?php echo get_template_directory_uri(); ?>/img/remate_gris.png">
        </div>
