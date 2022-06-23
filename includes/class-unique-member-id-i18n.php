<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.arlienyams.com
 * @since      1.0.0
 *
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/includes
 * @author     Arlington Nyamukapa <developer@arlienyams.com>
 */
class Unique_Member_Id_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'unique-member-id',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
