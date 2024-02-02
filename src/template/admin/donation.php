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

.wp-list-table{
  font-size:20px;
}

.status-style{
  width: 5rem;
  background-color: #E4FFE5;
  text-align:center;
  border-radius:5px;
  height: 2rem;
  display:flex;
  justify-content:center;
  align-items:center;
  color:black;
  font-weight:500;
}

.completed {
    background-color: #E4FFE5;
}

.pending {
    background-color: #FBECB7;
}

.row-cell{
  width:5rem;
  height:2rem;
  display:flex;
  justify-content:left;
  align-items:center;
  color:black;
  font-weight:400;
}

</style>

<div class="wrap">
    <h1>Donation History</h1>
<table class="wp-list-table widefat fixed striped table-view-list posts" style="margin-top:1rem;">
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
        <tr class="table-row">
      <td><div class="row-cell"><?php echo "RGTWF0" . $row->id; ?></div></td>
      <td><div class="row-cell"><?php echo $row->full_name; ?></div></td>
      <td><div class="row-cell"><?php echo $row->email; ?></div></td>
      <td><div class="row-cell"><?php echo $row->contact; ?></div></td>
      <td><div class="row-cell"><?php echo $row->PAN; ?></div></td>
      <td><div class="row-cell"><?php echo "₹ ". $row->amount; ?></div></td>
      <td>
        <div class="status-style <?php echo ($row->status == 1) ? 'completed' : 'pending'; ?>">
        <?php echo ($row->status == 1) ? "Completed" : "Pending"; ?>
        </div>
      </td>
      <td><div class="row-cell"><?php echo $row->date; ?></div></td>
      <td><div class="row-cell">

      <a href="admin.php?page=donation-edit&id=<?php echo $row->id; ?>" style="margin-right:1rem;">Edit</a>
      <a href="admin.php?page=donation-delete&id=<?php echo $row->id; ?>">Delete</a>
</div>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
    </div>
<?php
echo ob_get_clean();



