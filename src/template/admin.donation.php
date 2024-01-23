<?php

global $wpdb, $table_prefix;
$wp_donation = $table_prefix.'donation';

$q = "SELECT * FROM `$wp_donation`";
$results = $wpdb->get_results($q);

ob_start()
?>

<div class="wrap">
    <h1>Donations</h1>
<table class="wp-list-table widefat fixed striped table-view-list posts">
  <tr>
  <th><strong>ID</strong></th>
    <th><strong>Full Name</strong></th>
    <th><strong>Email</strong></th>
    <th><strong>Contact no.</strong></th>
    <th><strong>PAN Number</strong></th>
    <th><strong>Status</strong></th>
    <th><strong>Date</strong></th>
    <th><strong>Action</strong></th>
  </tr>
    <?php 
    $reversed_results = array_reverse($results);

    foreach($reversed_results as $row): ?>
        <tr>
      <td><?php echo $row->id; ?></td>
      <td><?php echo $row->full_name; ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo $row->contact; ?></td>
      <td><?php echo $row->PAN; ?></td>
      <td><?php echo ($row->Status == 1) ? "Donated" : "Pending"; ?></td>
      <td><?php echo $row->Date; ?></td>
      <td>
        <!-- Add your edit, copy, delete links/buttons here -->
        <!-- Example: -->
        <a href="edit.php?id=<?php echo $row->id; ?>">Edit</a>
        <a href="delete.php?id=<?php echo $row->id; ?>">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
    </div>
<?php
echo ob_get_clean();



