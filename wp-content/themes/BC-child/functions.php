<?php

echo "wangyidong....functions.php<br>";
//echo get_template_directory();
var_dump($_GET) ;
echo '<br>' . $_GET['url'] . "  <br>" ;
add_theme_support('nav-menus');


function php_login_setup()
{
	//require_once get_stylesheet_directory() . "/php-login/index.php";
	echo "in the php_login_setup <br>";
	require_once "/Users/zxl2013/Sites/BiosphericallyCorrect" . "/php-login/index.php";

}


echo "$_SERVER[REQUEST_URI]". " functions.php end<br>";

/*
if ($_SERVER[REQUEST_URI] == "/BiosphericallyCorrect/index2/") {
	echo "start add_action because of " . $_SERVER[REQUEST_URI];
	add_action( 'after_setup_theme', 'php_login_setup' );
}
*/
/*
if ($_SERVER[REQUEST_URI] == "/BiosphericallyCorrect/login2/") {
	echo "start add_action because of " . $_SERVER[REQUEST_URI];
	add_action( 'after_setup_theme', 'php_login_setup' );
}
*/



?>