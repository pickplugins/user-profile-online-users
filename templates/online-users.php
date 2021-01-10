<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$User_Query = new WP_User_Query( array(
	'meta_query' => array(
		array(
			'key'     => 'upou_last_seen',
			'value'   => strtotime( current_time( 'mysql' ) . " - ". UPOU_TIME_COMPARE ." seconds" ),
	 		'compare' => '>=',
		),
	),
	'order' => 'DESC',
	'orderby' => 'meta_value_num',
) );


echo sprintf( "<p>%s : %d</p>", apply_filters( 'user_profile_filter_online_user_count_text', __( "Online users", 'user-profile-online-users' ) ), $User_Query->get_total() );

// $upou_display_users_count 	= get_option( 'upou_display_users_count', 20 );
// $upou_display_users_count	= empty( $upou_display_users_count ) ? 20 : $upou_display_users_count;
$display_users_count		= 0;

foreach( $User_Query->get_results() as $user ) : $display_users_count++;
	
	if( $display_users_count > $item_count ) continue;
	
	$avatar_url 	= get_avatar_url( $user->ID );
	
	echo "<span class='upou_avatar hint--top' aria-label='{$user->display_name}'><img src='$avatar_url' /></span>";
	
endforeach;

