<?php
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

$q = "SELECT * FROM `$wp_donation` ORDER BY id DESC LIMIT 1";
$result = $wpdb->get_row($q);
?>

<?php echo ($result && $result->status == 0) ? "<h2>Donation receipt access denied</h2>" : include(__DIR__ . '/receipt/thank-you.php'); ?>
