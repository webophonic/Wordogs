<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://webophonic.com
 * @since             0.1.0
 * @package           Wordogs
 *
 * @wordpress-plugin
 * Plugin Name:       Wordogs
 * Plugin URI:        Wordogs
 * Description:       Wordogs is a wordpress plugin for Discogs. Custom Types (a.k.a. Records), Widgets, Shortcodes,..
 * Version:           0.1.0
 * Author:            webophonic
 * Author URI:        http://webophonic.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordogs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin (sic) version.
 */
define( 'WORDOGS_VERSION', '0.1.0' );

//Webophonic Toolkits 
require_once( plugin_dir_path( __FILE__ ) . 'includes/WebophonicFunctions.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/WebophonicTypes.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-records.php');
array_push($tisselys_plugin_variables['tisselysTypes'],new TisselysProgrammes());


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordogs-activator.php
 */
function activate_wordogs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordogs-activator.php';
	Wordogs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordogs-deactivator.php
 */
function deactivate_wordogs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordogs-deactivator.php';
	Wordogs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wordogs' );
register_deactivation_hook( __FILE__, 'deactivate_wordogs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordogs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_wordogs() {

	$plugin = new Wordogs();
	$plugin->run();

}
run_wordogs();
