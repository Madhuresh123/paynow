<?php
/**
 * Plugin Name: Pay Now
 * Description: The most robust, flexible, and intuitive way to accept donations on WordPress.
 * Version: 1.0
 * Author: Madhuresh
 * 
 */

 if(!defined('ABSPATH')){
    header("Location: /");
    die();
 }

function my_plugin_activation() {
    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix . 'donation';

    $q = "CREATE TABLE IF NOT EXISTS `$wp_donation` (
        `id` INT(50) NOT NULL AUTO_INCREMENT , 
      `full_name` VARCHAR(100) NOT NULL , 
      `email` VARCHAR(100) NOT NULL , 
      `contact` TEXT NOT NULL , 
      `PAN` TEXT NOT NULL , 
      `amount` TEXT NOT NULL , 
      `status` BOOLEAN NOT NULL , 
      `date` DATE NOT NULL , 
      PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;";
    $wpdb->query($q);

    // Insert dummy data if needed
    
    $data = array(
        'full_name' => 'Akshay',
        'email' => 'akshay@gmai.com',
        'contact' => '9349413345',
        'PAN' => 'FGEOP2398K',
        'amount' => '100',
        'status' => 0,
        'Date' => current_time('mysql')
    );

    $wpdb->insert($wp_donation,$data);

}

 //action function
 register_activation_hook(__FILE__, 'my_plugin_activation');

 function my_plugin_deactivation(){

    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix.'donation';

   //  $q = "TRUNCATE `$wp_donation`";
    $q = "DROP TABLE `$wp_donation`;";
    $wpdb->query($q);

 }

 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

 function donation_btn_fun() {

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

    // include "src/template/donate.php";
}

 add_shortcode('donation_btn', 'donation_btn_fun');


 function donation_receipt_fun(){
   
   ob_start();

   $plugin_dir = plugin_dir_path(__FILE__);
   $template_path = $plugin_dir . 'src/template/donate.receipt.php';

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
    include "src/template/admin.donation.php";
 }

 function my_plugin_subpage_func(){
    include "src/template/admin.donor.php";
 }

 //wp-menu creation
 function my_plugin_menu(){
    add_menu_page('Donation', 'Donation', 'manage_options', 'my-plugin-page', 'my_plugin_page_func','',6 );

    add_submenu_page('my-plugin-page', 'Donor', 'Donor', 'manage_options', 'my-plugin-subpage', 'my_plugin_subpage_func');
 }

 add_action('admin_menu','my_plugin_menu');


 //delete button 

 // Ajax handler for deleting data
add_action('wp_ajax_delete_data_action', 'delete_data_function');

function delete_data_function() {
   global $wpdb, $table_prefix;
   $wp_donation = $table_prefix . 'donation';

    // Get ID from Ajax request
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Perform deletion
    if ($id > 0) {
        // Your deletion logic
        $wpdb->delete($wp_donation, array('id' => $id));
        
        // Return success message
        wp_send_json_success('Data deleted successfully.');
    } else {
        // Return error message
        wp_send_json_error('Invalid ID.');
    }

    wp_die(); // Always include wp_die() at the end of your Ajax callback function.
}




 