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

 function my_plugin_activation() {
    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix . 'donation';

    $q = "CREATE TABLE IF NOT EXISTS `$wp_donation` (
        `id` INT(50) NOT NULL AUTO_INCREMENT,
        `Full Name` VARCHAR(100) NOT NULL,
        `Email Address` VARCHAR(100) NOT NULL,
        `Contact no` TEXT NOT NULL,
        `PAN Number` TEXT NOT NULL,
        `Status` DOUBLE NOT NULL,
        `Date` DATE NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;";
    $wpdb->query($q);

    // Insert dummy data if needed
    
    $data = array(
        'Full Name' => 'Akshay',
        'Email Address' => 'akshay@gmai.com',
        'contact no' => '9349413345',
        'PAN Number' => 'FGEOP2398K',
        'Status' => 1,
        'Date' => current_time('mysql')
    );

    $wpdb->insert($wp_donation,$data);

}


 register_activation_hook(__FILE__, 'my_plugin_activation');

 function my_plugin_deactivation(){

    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix.'donation';

    $q = "TRUNCATE `$wp_donation`";
    $wpdb->query($q);

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

    // if(is_page('home')){
    //     wp_enqueue_script('my-custom-js', $path_js, $dep, $ver, true);
    // }
 }

 add_action('wp_enqueue_scripts','my_custom_styles');
 