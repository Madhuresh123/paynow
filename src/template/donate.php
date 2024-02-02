<?php
ob_start();
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

if(isset($_POST['donate-btn'])) {
    // Redirect after the delete operation
    echo '<script>window.location.href = "' . esc_url(site_url('/donation-form')) . '";</script>';
    exit; 
}
?>

<div class="container">
  <!-- Donate Now Button -->
  <form method="post">
    <button class="donate_btn" type="submit" name="donate-btn">Donate Now</button>
  </form>
</div>

<?php
ob_end_flush();
?>