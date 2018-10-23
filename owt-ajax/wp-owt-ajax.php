<?php

/*
 * Plugin Name: OWT Ajax
 * Description: This is a simple plugin used to demonstrate Ajax request in Wordpress.
 * Plugin URI: http://onlinewebtutorhub.blogspot.in/
 * Author: Online Web Tutor
 * Author URI: http://onlinewebtutorhub.blogspot.in/
 */

add_shortcode("owt-ajax-shortcode", "owt_wpl_run_shortcode");

function owt_wpl_run_shortcode() {

    ob_start();

    include_once plugin_dir_path(__FILE__) . 'views/owt-ajax-page-view.php';

    $template = ob_get_contents();
    ob_end_clean();

    echo $template;
}

add_action("wp_enqueue_scripts", "owt_include_scripts");

function owt_include_scripts() {

    wp_enqueue_script("jquery");
}

add_action("wp_ajax_owt_ajax_lib", "owt_lib_ajax_handler_fn");
add_action("wp_ajax_nopriv_owt_ajax_lib", "owt_lib_ajax_handler_fn");

function owt_lib_ajax_handler_fn() {

    $param = isset($_REQUEST['param']) ? trim($_REQUEST['param']) : "";

    global $wpdb;

    if (!empty($param)) {

        if ($param == "get_all_posts") {

            /* $all_posts = get_posts(array(
              "post_type" => "post",
              "post_status" => "publish"
              ));

              print_r($all_posts); */

            $all_posts = $wpdb->get_results(
                    $wpdb->prepare(
                            "SELECT * from " . $wpdb->prefix . "posts WHERE post_type = %s AND post_status = %s", "post", "publish"
                    )
            );

            print_r($all_posts);
        }
    }
    wp_die();
}
