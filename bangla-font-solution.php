<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Bangla Font Solution
 * Plugin URI:        https://themebing.com/plugins/bangla-font-solution
 * Description:       This is Bangla Font solution plugin which is allows you to install clear bangla font to your wordpress site. this plugin display neat and clean Bangla Font
 * Version:           1.0.3
 * Author:            ThemeBing
 * Author URI:        https://themebing.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bangla-font-solution
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Bangla_Fonts_Solution {
	private static $instance = null;
	private $plugin_path;
	private $plugin_url;
	private $text_domain = 'bangla-font-solution';
	/**
	 * Creates or returns an instance of this class.
	 */
	public static function get_instance() {
		// If an instance hasn't been created and set to $instance create an instance and set it to $instance.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Initializes the plugin by setting localization, hooks, filters, and administrative functions.
	 */
	private function __construct() {
		$this->plugin_path = plugin_dir_path( __FILE__ );
		$this->plugin_url  = plugin_dir_url( __FILE__ );
		load_plugin_textdomain( $this->text_domain, false, $this->plugin_path . '\languages' );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );
	}
	public function get_plugin_url() {
		return $this->plugin_url;
	}
    public function register_scripts() {
    	wp_enqueue_script( 'bangla-font-solution', $this->get_plugin_url().'assets/js/plugin.js',array('jquery'), null , true  );
    }
    public function register_styles() {
    	wp_enqueue_style( 'bangla-font-solution', $this->get_plugin_url() . 'assets/css/style.css');
	}
}
Bangla_Fonts_Solution::get_instance();