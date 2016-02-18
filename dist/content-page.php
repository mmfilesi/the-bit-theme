<?php /* the bit jazz band */ ?>

<article id="post-<?php the_ID(); ?>" class="columna_estrecha">

	<!-- cabecera -->
	<header class="entry-header">		
		<h2 class="titulares"><span itemprop="name"><?php the_title(); ?></span></h2>	
	<!-- #cabecera -->
	</header><!-- .entry-header -->
	
	<div class="fuente_10 interlineado_160 borde_derecha_verde padding_horizontal_derecha"> <!-- desarrollo -->
	<?php the_content(); ?>
	</div> <!-- #desarrollo -->		

</article><!-- #post-<?php the_ID(); ?> -->