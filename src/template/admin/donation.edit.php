<?php
include "style.php";
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

$id = isset($_REQUEST['id'])? intval($_REQUEST['id']) : 0;


if(isset($_POST['update'])){

if(!empty($id)){

    $full_name = $wpdb->escape($_POST['full_name']);
    $email = $wpdb->escape($_POST['email']);
    $contact = $wpdb->escape($_POST['contact']);
    $pan = $wpdb->escape($_POST['pan']);
    $amount = $wpdb->escape($_POST['amount']);
    $status = $wpdb->escape($_POST['status']);

    
    
  // Prepare user data
  $user_data = array(
      'full_name' => $full_name,
      'email' => $email ,
      'contact' => $contact ,
      'PAN' => $pan,
      'amount' => $amount,
      'status' => $status,
      'Date' => current_time('mysql')
);

  // Insert user data into the database
 $wpdb->update($wp_donation, $user_data, array('id' => $id));
}

  echo '<script>window.location.href = "' . esc_url(site_url('/wp-admin/admin.php?page=my-plugin-page')) . '";</script>';
  exit; 
}


$q = $wpdb->prepare("SELECT * FROM $wp_donation WHERE id = %d", $id);
$donation = $wpdb->get_row($q);
    ?>

<h1>Update donation Info</h1>
<form action="" method="post" id="donation-form">
      <div class="first-info">
        <div class="form-group">
          <label for="name"><strong>Full Name</strong></label><br>
          <input class="donor-input" type="text" id="name" name="full_name" placeholder="Full Name" value="<?php echo $donation->full_name;?>">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label><br>
          <input  class="donor-input" type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $donation->email;?>">
        </div>
      </div>
  
      <div class="first-info">
  
        <div class="form-group">
          <label for="contact">Contact Number</label><br>
          <input class="donor-input"  type="tel" id="contact" name="contact"  placeholder="Contact Number" value="<?php echo $donation->contact;?>" >
        </div>
        <div class="form-group">
          <label for="pan">PAN Number</label><br>
          <input  class="donor-input" type="text" id="pan" name="pan"  placeholder="PAN Number" value="<?php echo $donation->PAN;?>">
        </div>
  </div>
  <div class="first-info">

  <div class="form-group">
          <label for="Amount">Amount</label><br>
          <input  class="donor-input" type="text" id="Amount" name="amount"  placeholder="₹0" value="<?php echo $donation->amount;?>">
          <label id="amount-error" class="error" for="Amount"></label>
      </div>

      <div class="form-group">
          <label for="status">Status</label><br>
          <select name="status">
          <option value="0" <?php if ($donation->status === '0') echo 'selected'; ?>>Pending</option>
            <option value="1" <?php if ($donation->status === '1') echo 'selected'; ?>>Completed</option>
                </select>

      </div>
</div>

        <div class="form-group">
          <input type="submit" class="donate_btn" name="update" value="Submit">
        </div>
      </form>