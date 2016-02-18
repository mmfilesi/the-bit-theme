<?php /* The Bit Jazz Band - category */ ?>	
<?php get_header(); ?>
<div class="grid-container"> <!-- main layout -->
	<section class="main-container-summaries grid-cell grid-cell-9 grid-sep-right-02">

	<header class="header-articles">
		<?php if (is_category()): ?>	
		<h2 class=""> categor&iacute;a:
			<?php echo single_cat_title(); ?> </h2>
		<?php endif; ?>	
		
		<?php if (is_tag()): ?>	
		<h2 class=""> tag:
			<?php echo single_tag_title(); ?> </h2>
		<?php endif; ?>	
		
		<?php if (is_date()): ?>	
		<h2 class="fuente_10 negrita borde_inferior_verde"> Fecha:
			<?php echo get_the_date(); ?> </h2>
		<?php endif; ?>					
	</header>

	<?php // chequeamos que no tenga ningún formato wp (las entradas normales devuelven false)	
	$check_formato = get_post_format();

	/* Si tiene alguno, cargamos la plantilla específica, en este caso microentradas, de lo contrario, la normal (content-single).
	Si se van a usar más formatos, entonces hacer un case mejor que un if else */
	
	if ($check_formato!=false && is_date()==false && is_category()==false && is_tag()==false) {
		get_template_part( 'archive', get_post_format() );
	} else {
		get_template_part( 'archive', 'single' );
	} ?>

    </section>

    <?php require_once('main-sidebar.php'); ?>

</div> <!-- #main layout -->
<?php get_footer(); ?>