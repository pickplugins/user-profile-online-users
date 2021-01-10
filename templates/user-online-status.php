<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$this_user			= get_user_by( 'ID', $user_id );
$upou_last_seen		= get_user_meta( $user_id, 'upou_last_seen', true );

$time_now 			= strtotime( current_time( 'mysql' ) );
$time_diff			= round( abs( $upou_last_seen - $time_now ), 2 );

$display_text		= __( 'Offline', 'user-profile-online-users' );
$display_css 		= 'upou_status_offline';
$human_time_diff 	= sprintf(__("Last seen: %s ago",'user-profile-online-users'), human_time_diff( $upou_last_seen, $time_now));


if( ! empty( $upou_last_seen ) && $time_diff <= UPOU_TIME_COMPARE ){
	
$display_text		= __( 'Online', 'user-profile-online-users' );
$display_css		= 'upou_status_online';
$human_time_diff	= __( "Active now", 'user-profile-online-users' );

}

echo "<span class='upou_online_status $display_css hint--bottom' aria-label='$human_time_diff'>";
echo "<i class='fa fa-circle'></i> ";
echo apply_filters( 'user_profile_filter_online_user_text', $display_text );
echo "</span>";

