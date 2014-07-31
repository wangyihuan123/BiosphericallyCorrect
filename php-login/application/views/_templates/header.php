<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS from php-login--><!-- 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
 -->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css?<?php echo rand(); ?>" />

    <link rel="stylesheet" href="<?php echo URL; ?>public/css/myDashboard.css?<?php echo rand(); ?>" />


    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo rand(); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

    
    <!-- from php-login, in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>

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

    <?php if (Session::get('user_logged_in') == false):?>
    <ul id="header-bar">
        <li><a href="<?php bloginfo('url'); ?>/php-login/login/index">login</a></li>
        <li><a href="<?php bloginfo('url'); ?>/register">Register</a>
        <li><a href="<?php bloginfo('url'); ?>/donate">Donate to this project</a></li>
        
    </ul>
    <?php endif; ?>


    <div class="php-login-header">
        <div class="header_left_box">
        <ul id="menu">
        <!-- 
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/index">Help</a>
            </li>
             -->
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "questionnaire")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>questionnaire/index">Questionnaire</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>user/index">Users Manager</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/ratingsystem">Rating System</a>
                <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "question")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>question/index">Questions Admin</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "question")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>earnmorepoint/index">Earn More Point Admin</a>
                        </li>
                        
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/changeaccounttype">Change account type</a>
                        </li>
                        <!-- <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li> -->
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my username</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
 
            <!-- for not logged in users -->
            <!-- 
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?> -->
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                <!-- <div class="avatar">
                    <?php if (USE_GRAVATAR) { ?>
                        <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } else { ?>
                        <img src='<?php echo Session::get('user_avatar_file'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } ?>
                </div> -->
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>

    <div id="sidebar">
            112233
    </div>

<!-- 

<?php echo bloginfo('stylesheet_url');  echo rand(); ?>
 -->
<!-- 

    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>

    <div class='title-box'>
        <a href="<?php echo URL; ?>">My Application</a>
    </div>

    <div class="header">
        <div class="header_left_box">
        <ul id="menu">
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/index">Help</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>overview/index">Overview</a>
            </li>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>note/index">My Notes</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/changeaccounttype">Change account type</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my username</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
 -->
            <!-- for not logged in users --><!-- 
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                <div class="avatar">
                    <?php if (USE_GRAVATAR) { ?>
                        <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } else { ?>
                        <img src='<?php echo Session::get('user_avatar_file'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>
 -->