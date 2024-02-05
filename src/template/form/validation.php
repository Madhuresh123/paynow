<?php

if(isset($_POST['register'])){
    global $wpdb, $table_prefix;

    $full_name = $wpdb->escape($_POST['full_name']);
    $email = $wpdb->escape($_POST['email']);
    $contact = $wpdb->escape($_POST['contact']);
    $pan = $wpdb->escape($_POST['pan']);
    $amount = $wpdb->escape($_POST['amount']);
    
    $wp_donation = $table_prefix . 'donation';
    
  // Prepare user data
  $user_data = array(
      'full_name' => $full_name,
      'email' => $email ,
      'contact' => $contact ,
      'PAN' => $pan,
      'amount' => $amount,
      'status' => 1,
      'Date' => current_time('mysql')
);

  // Insert user data into the database
  $wpdb->insert($wp_donation, $user_data);

  if ($wpdb->insert_id) {

      echo '<script>window.location.href = "' . esc_url(site_url('/donation-receipt')) . '";</script>';
      exit;

  } else {
     
      echo 'Error inserting user data into the database.';
  }
  }
    ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
