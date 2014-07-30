<?php
/*
Plugin Name: Biospherically Correct - Rating System
Plugin URI: http://www.biosphericallycorrect.org
Description: Process and manage BC Producer Rating System
Version: 0.1
Author: Benjamin Wang
Author URI: 
*/

global $wpdb, $wp_version;

define("BCRS_DIR", WP_PLUGIN_DIR."/".basename( dirname( __FILE__ ) ) );
define("BCRS_DIR_URL", plugins_url()."/".basename( dirname( __FILE__ ) ) );
define("BCRS_DIR_VERSION", "0.1");

//define("BCRS_DIR_JS_DEBUG", false);

require_once( BCRS_DIR . "/includes/bc-test.php" );
require_once( BCRS_DIR . "/includes/pages.php" );
//require_once( NINJA_FORMS_DIR . "/includes/admin/save.php" );
// Set $_SESSION variable used for storing items in transient variables


//add_action( 'init', 'ninja_forms_set_transient_id', 1 );

//add_action('plugins_loaded', 'ninja_forms_load_lang');

//add_action( 'admin_init', 'ninja_forms_update_version_number' );

//register_activation_hook( __FILE__, 'ninja_forms_activation' );


