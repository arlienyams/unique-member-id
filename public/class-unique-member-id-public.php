<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.arlienyams.com
 * @since      1.0.0
 *
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Unique_Member_Id
 * @subpackage Unique_Member_Id/public
 * @author     Arlington Nyamukapa <developer@arlienyams.com>
 */
class Unique_Member_Id_Public
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/unique-member-id-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/unique-member-id-public.js', array('jquery'), $this->version, false);
	}
}

// show user id in profile and in shortcode
// Add Shortcode
function uniqueID_shortcode()
{

	//Use the wordpress  user ID as the unique customer ID
	$user_id = get_current_user_id();
	if ($user_id == 0) {
		echo '';
	} else {

		$user_id =  str_pad($user_id, 4, "0", STR_PAD_LEFT);
		echo 'Customer ID _' . $user_id;
	}
}
add_shortcode('nyams_uniqueID', 'uniqueID_shortcode');



/*
 * Adding the column
 */
function nyams_user_id_column($columns)
{
	$columns['user_id'] = 'Customer ID';
	return $columns;
}
add_filter('manage_users_columns', 'nyams_user_id_column');

/*
 * Column content
 */
function nyams_user_id_column_content($value, $column_name, $user_id)
{
	if ('user_id' == $column_name)
		return $user_id;
	return $value;
}
add_action('manage_users_custom_column',  'nyams_user_id_column_content', 10, 3);

/*
 * Column style (you can skip this if you want)
 */
function nyams_user_id_column_style()
{
	echo '<style>.column-user_id{width: 10%}</style>';
}
add_action('admin_head-users.php',  'nyams_user_id_column_style');
