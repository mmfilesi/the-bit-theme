<!doctype html>
<html lang="es">
<head>

<meta charset="utf-8">

<meta name="author" content="mmfilesi">
<meta name="Copyright" content="cc-by-sa">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui, shrink-to-fit=no">	
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style.css">

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	wp_head();
?>
</head>

<body itemscope itemtype="http://schema.org/WebPage">

    <div class="wrap box-standar">

        <header role="banner" class="main-header" itemscope itemtype="http://schema.org/WPHeader">
            <a href="http://www.mmfilesi.com/">
                <img src="<?php bloginfo('template_directory'); ?>/img/main-title.png" class="img-responsive" alt="The Bit Jazz Band">
            </a>
        </header>

        <nav class="main-nav">
        	<?php if ( is_home() ) { ?>
            <div class="search">
                <input type="text" class="inputSearch" placeholder="buscar" id="js-searchInput">
            </div>
            <?php } ?>
            <ul role="navigation">
                <li class="link"><a href="http://www.mmfilesi.com/">portada</a></li> <span class="sep">|</span> 
                <li class="link"><a href="http://www.mmfilesi.com/tcabaret/">tannhäuser</a></li> <span class="sep">|</span> 
                <li class="link"><a href="http://mmfilesi.github.io/presentations/">talleres</a></li> <span class="sep">|</span> 
                <li class="link"><a href="mailto:mmfilesi@gmail.com">contactar</a></li> <span class="sep">|</span> 
            </ul>
        </nav>