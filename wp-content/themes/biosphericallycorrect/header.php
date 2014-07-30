<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo rand(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	<!--[if IE 7 ]><link href="<?php bloginfo('template_directory'); ?>/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<?php wp_enqueue_script('swfobject'); ?>
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="network_panel">

	<div id="network_panel_tab"></div>
	
	<ul>
		<li><a href="http://www.vfh.org.nz">Vision For Humanity</a></li>
		<li><a href="http://www.biosphericallycorrect.org">Biospherically Correct</a></li>
		<li><a href="http://www.visionproducts.co.nz">Vision Products</a></li>
	</ul>
	
	<a href="#" id="network_panel_close">^</a>
	
</div>

<div id="container" class="clearfix">

	<div id="flash"></div>
	<img src="<?php bloginfo('template_directory'); ?>/images/flash_<?php echo (is_front_page()) ? 'start' : 'end'; ?>.jpg" width="960" height="200" id="banner" />
	<div id="header" role="banner" class="clearfix">
		<h1>biospherically correct products and services</h1>
		<ol id="header_badges">
			<li class="bc_1"></li>
			<li class="bc_2"></li>
			<li class="bc_3"></li>
		</ol>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>
	<ul id="header-bar">
		<li><a href="<?php bloginfo('url'); ?>/register">Register</a></li>
		<li><a href="<?php bloginfo('url'); ?>/donate">Donate to this project</a></li>
		<li><a href="<?php bloginfo('url'); ?>/login">Login</a></li>
	</ul>

<?php echo get_option('current_page_template'); ?>