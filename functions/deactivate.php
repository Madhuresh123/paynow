<?php
function my_plugin_deactivation(){

    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix.'donation';

    $q = "TRUNCATE `$wp_donation`";
    // $q = "DROP TABLE `$wp_donation`;";
    $wpdb->query($q);

 }