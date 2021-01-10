<?php
/*
Plugin Name: User profile - Online Users
Plugin URI: http://pickplugins.com/item/user-profile-online-users
Description: Show online users on your website.
Version: 1.0.0
Text Domain: user-profile-online-users
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class UserProfileOnlineUsers{
	
	public function __construct(){
	
		$this->upou_define_constants();
				
		require_once( UPOU_PLUGIN_DIR . 'includes/class-shortcodes.php');
		require_once( UPOU_PLUGIN_DIR . 'includes/functions.php');
			
		add_action( 'wp_enqueue_scripts', array( $this, 'upou_front_scripts' ) );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ));
	}
	
	public function load_textdomain() {
		
		load_plugin_textdomain( 'user-profile-online-users', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	
	public function upou_front_scripts(){

		wp_enqueue_style('hint.min', UPOU_PLUGIN_URL.'assets/front/css/hint.min.css');
		wp_enqueue_style('upou_style', UPOU_PLUGIN_URL.'assets/front/css/style.css');
	}

	public function upou_define_constants() {

		$this->define('UPOU_PLUGIN_URL', plugins_url('/', __FILE__)  );
		$this->define('UPOU_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
		$this->define('UPOU_TIME_COMPARE', 60 );
	}
	
	private function define( $name, $value ) {
		if( $name && $value )
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

} new UserProfileOnlineUsers();