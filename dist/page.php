<?php /* The Bit Jazz Band - single */ ?>	
<?php get_header(); ?>
<div id="main" class="layout_contenedor margenes_verticales caja">
<div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

	<?php while ( have_posts() ) : the_post(); // #loop. ?>
	
	<?php get_template_part( 'content', 'page' ); ?>	

	<?php comments_template( '', true ); ?>
	<?php endwhile; // #loop. ?>
	
	</div><!-- #bloque_principal -->
	
	<?php require_once('barra-lateral.php'); ?>


</div><!-- #main -->	

<?php get_footer(); ?>