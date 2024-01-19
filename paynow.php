<?php
/**
 * Plugin Name: Pay Now
 * Description: This is the test plugin
 * Version: 1.0
 * Author: Madhuresh
 * 
 */

 if( !defined('ABSPATH')){
    header("Location: /");
    die();
 }

 function my_plugin_activation(){

 }

 register_activation_hook(__FILE__, 'my_plugin_activation');

 function my_plugin_deactivation(){

 }

 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

 function my_sc_fun() {
    ob_start();

    $plugin_dir = plugin_dir_path(__FILE__);
    $template_path = $plugin_dir . 'src/template/donate.php';

    // Debugging: Print the file path
    //echo 'Template Path: ' . $template_path . '<br>';

    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo 'Error: Template file not found.';
    }

    $output = ob_get_clean();
    return $output;
}


 add_shortcode('my-sc', 'my_sc_fun');
 