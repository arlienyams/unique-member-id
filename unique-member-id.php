<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.arlienyams.com
 * @since             1.0.0
 * @package           Unique_Member_Id
 *
 * @wordpress-plugin
 * Plugin Name:       Unique Customer/ Member ID
 * Plugin URI:        https://www.arlienyams.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Arlington Nyamukapa
 * Author URI:        https://www.arlienyams.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       unique-member-id
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'UNIQUE_MEMBER_ID_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-unique-member-id-activator.php
 */
function activate_unique_member_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unique-member-id-activator.php';
	Unique_Member_Id_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-unique-member-id-deactivator.php
 */
function deactivate_unique_member_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-unique-member-id-deactivator.php';
	Unique_Member_Id_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_unique_member_id' );
register_deactivation_hook( __FILE__, 'deactivate_unique_member_id' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-unique-member-id.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_unique_member_id() {

	$plugin = new Unique_Member_Id();
	$plugin->run();

}
run_unique_member_id();
