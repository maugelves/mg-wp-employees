<?php
/*
Plugin Name: MG Employees
Plugin URI:  https://github.com/maugelves/mg-wp-employees
Description: Add Employees to your WordPress Website
Version:     1.0
Author:      Mauricio Gelves
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mgemployees
Domain Path: /languages
*/

// CONSTANTS
define( 'MGEMP_PATH', dirname( __FILE__ ) );
define( 'MGMEMP_FOLDER', basename( MGEMP_PATH ) );
define( 'MGEMP_URL', plugins_url() . '/' . MGMEMP_FOLDER );


/*
*   =================================================================================================
*   BASE CLASS
*   =================================================================================================
*/
include ( MGEMP_PATH . "/inc/base.php" );



/*
*   =================================================================================================
*   PLUGIN DEPENDENCIES
*   =================================================================================================
*/
include ( MGEMP_PATH . "/inc/libs/class-tgm-plugin-activation.php" );
add_action( 'tgmpa_register', array( 'MGEMP_Base', 'check_plugin_dependencies' ) );



/*
*   =================================================================================================
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGEMP_PATH . "/inc/cpts/*.php") as $filename)
	include $filename;




/*
*   =================================================================================================
*   ADVANCED CUSTOM FIELDS
*   Include all the Advanced Custom Fields you need in the 'includes/acfs/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(MGEMP_PATH . "/inc/acfs/*.php") as $filename)
	include $filename;