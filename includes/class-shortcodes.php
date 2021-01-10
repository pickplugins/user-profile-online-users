<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class UPOU_Shortcodes{
	
    public function __construct(){
		add_shortcode( 'user_online_status', array( $this, 'user_online_status_display' ) );
		add_shortcode( 'online_users', array( $this, 'online_users_display' ) );
   	}	
	
	public function online_users_display($atts, $content = null ) {
		
		$atts = shortcode_atts( array('item_count'=>20), $atts );
		
		$item_count = $atts['item_count'];

		ob_start();
		include( UPOU_PLUGIN_DIR . 'templates/online-users.php');
		return ob_get_clean();
	}
	
	public function user_online_status_display($atts, $content = null ) {
			
		$atts = shortcode_atts( array('user_id'=> get_current_user_id()), $atts );
		
		$user_id = $atts['user_id'];

		//echo "<pre>"; print_r( $user_id ); echo "</pre>";

		ob_start();
		include( UPOU_PLUGIN_DIR . 'templates/user-online-status.php');
		return ob_get_clean();
	}
	
	
	
} new UPOU_Shortcodes();