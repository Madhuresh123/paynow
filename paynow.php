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
    
    $template_path = './src/template/template.donate.php';

    if (file_exists($template_path)) {
        include $template_path;
    } else {
        echo 'Error: Template file not found.';
    }

    $output = ob_get_clean();
    return $output;
}


 add_shortcode('my-sc', 'my_sc_fun');