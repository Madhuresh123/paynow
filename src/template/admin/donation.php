<?php

global $wpdb, $table_prefix;
$wp_donation = $table_prefix.'donation';

$q = "SELECT * FROM `$wp_donation`";
$results = $wpdb->get_results($q);

ob_start()
?>
<style>
  .action_popup {
display: none;
position: fixed;
width: 35rem;
height: 25rem;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
padding: 20px 3rem;
background: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
border-radius: 8px;
z-index: 1000;
}
.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
}
.form-group {
 margin-bottom: 15px;
  margin-right: 1rem;
}
.close-btn {
position: absolute;
top: 10px;
right: 10px;
cursor: pointer;
}  

.action_btn{
  width: 4rem;
  height: 2rem;
  background-color: lightblue;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.donate_btn:hover{
  background-color: rgb(121, 94, 148);
}
</style>

<div class="wrap">
    <h1>Donations</h1>
<table class="wp-list-table widefat fixed striped table-view-list posts">
  <tr>
  <th><strong>ID</strong></th>
    <th><strong>Full Name</strong></th>
    <th><strong>Email</strong></th>
    <th><strong>Contact no.</strong></th>
    <th><strong>PAN Number</strong></th>
    <th><strong>Amount</strong></th>
    <th><strong>Status</strong></th>
    <th><strong>Date</strong></th>
    <th><strong>Action</strong></th>
  </tr>
    <?php 
    $reversed_results = array_reverse($results);

    foreach($reversed_results as $row): ?>
        <tr>
      <td><?php echo "RGTWF0" . $row->id; ?></td>
      <td><?php echo $row->full_name; ?></td>
      <td><?php echo $row->email; ?></td>
      <td><?php echo $row->contact; ?></td>
      <td><?php echo $row->PAN; ?></td>
      <td><?php echo $row->amount; ?></td>
      <td><?php echo ($row->status == 1) ? "Completed" : "Pending"; ?></td>
      <td><?php echo $row->date; ?></td>
      <td>

      <a href="admin.php?page=donation-edit&id=<?php echo $row->id; ?>">Edit</a>
      <a href="admin.php?page=donation-delete&id=<?php echo $row->id; ?>">Delete</a>

      </td>
    </tr>
  <?php endforeach; ?>
</table>
    </div>
<?php
echo ob_get_clean();



