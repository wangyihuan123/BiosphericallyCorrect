<?php
/*
Plugin Name: Biospherically Correct - login
Plugin URI: http://www.biosphericallycorrect.org
Description: 
Version: 1.0
Author: Benjamin Wang
Author URI: 
*/
// echo "php-login root index.php: random number: " . rand() . "<br>";
// Load application config (error reporting, database credentials etc.)
require 'application/config/config.php';

// The auto-loader to load the php-login related internal stuff automatically
require 'application/config/autoload.php';

// The auto-loader to load the php-login related internal stuff automatically
require 'application/config/PHPMailerAutoload.php';

// The Composer auto-loader (official way to load Composer contents) to load external stuff automatically
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// Start our application
$app = new Application();
