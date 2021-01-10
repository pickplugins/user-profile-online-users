<?php
/*
* @Author 		pickplugins
* Copyright: 	pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


function user_profile_action_after_profile_navs_function( $user_id ){

	//echo "<pre>"; print_r( $user_id ); echo "</pre>";

	echo do_shortcode( "[user_online_status user_id='$user_id']" );
}
add_action( 'user_profile_action_after_profile_navs', 'user_profile_action_after_profile_navs_function', 10, 1 );


function user_profile_update_last_seen_data(){
	
	if( is_user_logged_in() ){
		
		$current_time = strtotime( current_time( 'mysql' ) );
		update_user_meta( get_current_user_id(), 'upou_last_seen', $current_time );
	}
}
add_action( 'wp_footer', 'user_profile_update_last_seen_data' );



if( ! function_exists( 'is_user_online' ) ) { 
	function user_profile_is_user_online( $user_id ){
		
		$upou_last_seen		= get_user_meta( $user_id, 'upou_last_seen', true );
		$time_now 			= strtotime( current_time( 'mysql' ) );
		$time_diff			= round( abs( $upou_last_seen - $time_now ), 2 );

		if( ! empty( $upou_last_seen ) && $time_diff <= UPOU_TIME_COMPARE ) return true;
		else return false;
	}
}


