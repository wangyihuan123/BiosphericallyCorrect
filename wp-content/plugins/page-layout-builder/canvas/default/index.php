<?php 
//Template Name: Default 
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

    ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo MX_THEME_URL. 'canvas/default/style.css' ; ?>" />
<style type="text/css">
body{
    background: <?php echo get_post_meta(get_the_ID(),"bodybgcolor",true); ?> url("<?php echo get_post_meta(get_the_ID(),"bodybgimage",true); ?>");
}   
 
 
</style>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
    
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    
    wp_head();
?>

<!--<script language="JavaScript" src="<?php echo get_template_directory_uri(); ?>/js/cufon-yui.js"></script>
<script language="JavaScript" src="<?php echo get_template_directory_uri(); ?>/fonts/cufon/myriad-pro.cufonfonts.js"></script>
<script language="JavaScript">
 
  Cufon.replace('h1,h2,h3,h4,.notice strong,.mpbc', { fontFamily: 'Myriad Pro Bold Condensed', hover: true });
  Cufon.replace('.mpc', { fontFamily: 'Myriad Pro Condensed' });
  Cufon.replace('.notice strong', { fontFamily: 'Myriad Pro Bold', hover: true });  
 
</script>-->
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <header role="banner">
    
    <?php minimax_layout_holder('header'); ?>                
    </header>
    


<div id="main">
    
<?php the_post(); the_content(); ?>     


 
    </div> 

    <footer id="colophon" role="contentinfo">
      
    <?php minimax_layout_holder('footer'); ?>
         
    </footer> 
</div> 

<?php wp_footer(); ?>

</body>
</html>

