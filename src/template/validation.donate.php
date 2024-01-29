    <?php

    // if (isset($_POST['submit'])) {
    //     global $wpdb, $table_prefix;

    //     $full_name = $wpdb->escape($_POST['full_name']);
    //     $email = $wpdb->escape($_POST['email']);
    //     $contact = $wpdb->escape($_POST['contact']);
    //     $pan = $wpdb->escape($_POST['pan']);
    //     $wp_donation = $table_prefix . 'donation';

    //     // Prepare user data
    //     $user_data = array(
    //         'full_name' => $full_name,
    //         'email' => $email,
    //         'contact' => $contact,
    //         'PAN' => $pan,
    //         'Status' => 1,
    //         'Date' => current_time('mysql')
    //     );

    //     // Insert user data into the database
    //      $working = $wpdb->insert($wp_donation, $user_data);

    //     if ( $working) {
    //         // Send a success response
    //         echo 'success';
    //     } else {
    //         // Send an error response
    //         echo 'Error inserting user data into the database.';
    //     }
    // }

    echo 'success';

    ?>