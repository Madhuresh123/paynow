<?php
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

$q = "SELECT * FROM `$wp_donation` ORDER BY id DESC LIMIT 1";
$result = $wpdb->get_row($q);
?>

<div>
    <h2 style="color:red;"><?php echo ($result && $result->status == 0) ? "Donation receipt access denied." : ""; ?></h2>
</div>