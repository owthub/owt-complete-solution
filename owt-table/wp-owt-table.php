<?php

/*
 * Plugin Name: OWT Table 
 * Description: This is a simple plugin used to demonstrate Table Generation
 * Plugin URI: http://onlinewebtutorhub.blogspot.in/
 * Author: Online Web Tutor
 * Author URI: http://onlinewebtutorhub.blogspot.in/
 */

function owt_generate_table() {

    global $wpdb;
    global $table_prefix;

    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . "owt_playlists"; //$table_prefix

    $sql = "CREATE TABLE `" . $table_name . "` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `no_of_videos` int(11) DEFAULT NULL,
            `no_of_users` int(11) DEFAULT NULL,
            PRIMARY KEY (`id`)
           ) $charset_collate";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
    
    // wp_list_users
    
    $table_name = $wpdb->prefix . "list_users"; //$table_prefix

    $sqlToListUsers = "CREATE TABLE `" . $table_name . "` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(130) NOT NULL,
            `phone` varchar(15) NOT NULL,
            `address` text NOT NULL,
            PRIMARY KEY (`id`)
           ) $charset_collate";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sqlToListUsers);
}

register_activation_hook(__FILE__, 'owt_generate_table');
