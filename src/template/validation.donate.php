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

      wp_redirect('http://localhost/PAY/donation-receipt');
      exit;

      // echo "success";
  } else {
      // Insert failed
      // Handle error, e.g., display an error message
      echo 'Error inserting user data into the database.';
  }


  }
    ?>