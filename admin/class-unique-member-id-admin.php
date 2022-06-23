<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.arlienyams.com
 * @since      1.0.0
 *
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/admin
 * @author     Arlington Nyamukapa <developer@arlienyams.com>
 */
class Unique_Member_Id_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Unique_Member_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Unique_Member_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/unique-member-id-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Unique_Member_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Unique_Member_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/unique-member-id-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Add Column
	 *
	 * @param array $columns
	 * @return array
	 */
	public function nyams_user_id_column($columns)
	{

		$columns['user_id'] = 'Customer ID';
		return $columns;
	}

	/**
	 * Column Content
	 *
	 * @param string $value
	 * @param string $column_name
	 * @param integer $user_id
	 * @return string
	 */
	public function nyams_user_id_column_content($value, $column_name, $user_id)
	{
		if ('user_id' == $column_name) {
			$user_id =  str_pad($user_id, 4, "0", STR_PAD_LEFT);

			return $user_id;
		}

		return $value;
	}
}
