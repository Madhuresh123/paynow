<?php
/**
 * Plugin Name: Pay Now
 * Description: The most robust, flexible, and intuitive way to accept donations on WordPress.
 * Version: 1.2
 * Author: Madhuresh
 * 
 */

 
 if(!defined('ABSPATH')){
    header("Location: /");
    die();
 }

 //activate plugin
 include "functions/activate.php";
 register_activation_hook(__FILE__, 'my_plugin_activation');

 //deactivate plugin
include "functions/deactivate.php";
 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

 //donate button
 function donation_btn_fun() {
    ob_start();
    include(__DIR__ . '/src/template/donate.php');
    $output = ob_get_clean();
    return $output;
}
 add_shortcode('donation_btn', 'donation_btn_fun');


 //donation form
 function donation_form_fun(){
    ob_start();
    include(__DIR__ . '/src/template/form/form.php'); 
    $output = ob_get_clean();
    return $output;   
 }
 add_shortcode('donation_form', 'donation_form_fun');


//donation receipt
 function donation_receipt_fun(){
   
   ob_start();
   include(__DIR__ . '/src/template/donate.receipt.php'); 
   $output = ob_get_clean();
   return $output;
 }
 add_shortcode('donation_receipt', 'donation_receipt_fun');


 function my_custom_scripts(){
    $path = plugins_url('src/script/donate.js',__FILE__);
    $dep = array('jquery');
    $ver = filemtime(plugin_dir_path(__FILE__).'src/script/donate.js');
    wp_enqueue_script('my-custom-js', $path, $dep, $ver, true);

 }

 add_action('wp_enqueue_scripts','my_custom_scripts');

 function my_custom_styles(){

    $path = plugins_url('src/style/donate.css',__FILE__);
    $ver = filemtime(plugin_dir_path(__FILE__).'src/style/donate.css');
    wp_enqueue_style('my-custom-style', $path, '', $ver, '');
 }

 add_action('wp_enqueue_scripts','my_custom_styles');


 function my_plugin_page_func(){
    include "src/template/admin/donation.php";
 }

 function my_plugin_subpage_func(){
    include "src/template/admin/donor.php";
 }

 function my_plugin_donation_edit(){
    include "src/template/admin/donation.edit.php";
 }

 function my_plugin_donation_delete(){
    include "src/template/admin/donation.delete.php";
 }

 //wp-menu creation
 function my_plugin_menu(){
    add_menu_page('Donation', 'Donation', 'manage_options', 'my-plugin-page', 'my_plugin_page_func','',6 );

    add_submenu_page('my-plugin-page', 'Donor', 'Donor', 'manage_options', 'my-plugin-subpage', 'my_plugin_subpage_func');

    add_submenu_page('null', 'update-donation', 'Update donation', 'manage_options', 'donation-edit', 'my_plugin_donation_edit');

    add_submenu_page('null', 'delete-donation', 'Delete donation', 'manage_options', 'donation-delete', 'my_plugin_donation_delete');


 }

 add_action('admin_menu','my_plugin_menu');


 