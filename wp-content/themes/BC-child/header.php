<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- CSS from php-login-->
<!--     <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />

 -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo rand(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

	
    <!-- from php-login, in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
<!--     <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>

 -->
	<!--[if IE 7 ]><link href="<?php bloginfo('template_directory'); ?>/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<?php wp_enqueue_script('swfobject'); ?>
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php //require_once get_template_directory()."/wp-content/index/" 
?>
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
		<li><a href="<?php bloginfo('url'); ?>/php-login/login/index">login</a></li>
		<li><a href="<?php bloginfo('url'); ?>/register">Register</a></li>
		<li><a href="<?php bloginfo('url'); ?>/donate">Donate to this project</a></li>
	</ul>

