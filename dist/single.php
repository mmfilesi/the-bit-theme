<?php /* The Bit Jazz Band - single */ ?>	
<?php get_header(); ?>
<div class="grid-container"> <!-- main layout -->
	<section class="main-container-summaries grid-cell grid-cell-9 grid-sep-right-02">

	<?php while ( have_posts() ) : the_post(); // #loop. ?>
	
	<?php // chequeamos que no tenga ningún formato wp (las entradas normales devuelven false)	
	$check_formato = get_post_format();
	
	/* Si tiene alguno, cargamos la plantilla específica, en este caso microentradas, de lo contrario, la normal (content-single).
	Si se van a usar más formatos, entonces hacer un case mejor que un if else */
	
	if ($check_formato!=false) {
		get_template_part( 'content', get_post_format() );
	} else {
		get_template_part( 'content', 'single' );
	}
	?>
		<nav id="nav-single" class="border-grey">
			<?php if(function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
		
				<span class="nav-next pull-left">
				<?php previous_post_link( '%link', __( '<span class="meta-nav">Anterior &rarr;</span> ', 'thebit' )); ?>
				</span>	
				<span class="nav-previous pull-right">
				<?php next_post_link( '%link', __( '<span class="meta-nav">&larr; Siguiente</span>', 'thebit' )); ?>
				</span>
			<?php } ?>
			<div class="clear"></div>
		</nav><!-- #nav-single -->
	
	<?php comments_template( '', true ); ?>
	<?php endwhile; // #loop. ?>
	
    </section>
    <?php require_once('main-sidebar.php'); ?>
</div> <!-- #main layout -->
<?php get_footer(); ?>