<?php
ob_start();

    if(isset($_POST['register'])){
      global $wpdb, $table_prefix;

      $full_name = $wpdb->escape($_POST['full_name']);
      $email = $wpdb->escape($_POST['email']);
      $contact = $wpdb->escape($_POST['contact']);
      $pan = $wpdb->escape($_POST['pan']);
      
      $wp_donation = $table_prefix . 'donation';
      
    // Prepare user data
    $user_data = array(
      'full_name' => $full_name,
        'email' => $email ,
        'contact' => $contact ,
        'PAN' => $pan,
        'Status' => 1,
        'Date' => current_time('mysql')
  );

    // Insert user data into the database
    $wpdb->insert($wp_donation, $user_data);

    if ($wpdb->insert_id) {
 
        wp_redirect('success-page-url');
        exit;

        // echo "success";
    } else {
        // Insert failed
        // Handle error, e.g., display an error message
        echo 'Error inserting user data into the database.';
    }


    }



?>

  <div class="container">

  <!-- Donate Now Button -->
  <button class="donate_btn" onclick="openPopup()">Donate Now</button>

  <!-- Popup Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Donation Form Popup -->
  <div class="popup" id="popup">
    <span class="close-btn" onclick="closePopup()">X</span>
    <h2>Personal Info</h2>

    <form action="<?php echo get_the_permalink(); ?>" method="post">
      
    
    <div class="first-info">
      <div class="form-group">
        <label for="name">Full Name<span class="required-symbol">*</span></label><br>
        <input class="donor-input" type="text" id="name" name="full_name" placeholder="Full Name" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
      </div>
      <div class="form-group">
        <label for="email">Email Address<span class="required-symbol">*</span></label><br>
        <input  class="donor-input" type="email" id="email" name="email" placeholder="Email Address" onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)"  required>
      </div>
    </div>

    <div class="first-info">

      <div class="form-group">
        <label for="contact">Contact Number<span class="required-symbol">*</span></label><br>
        <input class="donor-input"  type="tel" id="contact" name="contact"  placeholder="Contact Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)" required>
      </div>
      <div class="form-group">
        <label for="pan">PAN Number</label><br>
        <input  class="donor-input" type="text" id="pan" name="pan"  placeholder="PAN Number"  onfocus="clearPlaceholder(this)" onblur="restorePlaceholder(this)">
      </div>
</div>
      <div>
      <p>To make an offline donation toward this cause, follow these steps:</p>

<ol>
    <li>Write a check payable to "RGT Welfare Foundation"</li>
    <li>On the memo line of the check, indicate that the donation is for "RGT Welfare Foundation"</li>
    <li>Mail your check to:</li>
</ol>

<address>
    RGT Welfare Foundation<br>
    Noida, India<br>
    Electronic City<br>
    Ground Floor, Pinnacle Tower,<br>
    A-42/6 Sector 62 Noida (UP) 201301
</address>

<p>Your tax-deductible donation is greatly appreciated!</p>

<p><strong>Donation Total:</strong> ₹100.00</p>

</div>
      <div class="form-group">
        <input type="submit" class="donate_btn" name="register" value="Submit">
      </div>
    </form>

  </div>
</div>
  <?php
ob_end_flush();
?>

