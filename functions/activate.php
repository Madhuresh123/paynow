<?php

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