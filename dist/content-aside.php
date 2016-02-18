<?php /* the bit jazz band */ ?>

<article id="post-<?php the_ID(); ?>" class="articulos">
<div itemscope itemtype="http://schema.org/Article"> <!-- bloque microdatos -->
	<!-- cabecera -->
	<header class="entry-header">		
		
			<p class="articulos-metadatos">
			&#123;<b><span itemprop="name"><?php the_title(); ?></span></b>&#125; &#124;&#124;
			Archivado en  
			<?php $category = get_the_category(); 					
					echo '<a href="'.get_category_link($category[0]->term_id ).'"><span itemprop="about">'.$category[0]->cat_name.'</span></a>'; ?>
			&#124;&#124;
			<meta itemprop="datePublished" content="<?php echo get_the_date(Y); ?>-<?php echo get_the_date(m); ?>-<?php echo get_the_date(d); ?>" /><?php echo get_the_date(Y-m-d); ?> 
			&#124;&#124;
			<span itemprop="author">Marcos M&eacute;ndez Filesi</span>			
			</p>
			<!-- microdatos: thumbnail-->	
				<meta itemprop="image" content="<?php if (has_post_thumbnail()) : ?>
						<?php 
						$image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id,'large', true); ?>
						<?php echo $image_url[0]; ?> 
					<?php else : ?>
						http://www.mmfilesi.com/wp-content/uploads/2012/08/sin_imagenes.jpg						
					<?php endif; ?>
					"/>
			
			<!-- #microdatos: thumbnail-->	
	
	<!-- #cabecera -->
	</header><!-- .entry-header -->
	
	<div class="articulos-desarrollo"> <!-- desarrollo -->
	<span itemprop="articleBody"><?php the_content(); ?></span>
	</div> <!-- #desarrollo -->
	
</div>	<!-- #bloque microdatos -->
</article><!-- #post-<?php the_ID(); ?> -->