<?php
global $wpdb, $table_prefix;
$wp_donation = $table_prefix . 'donation';

$id = isset($_REQUEST['id'])? intval($_REQUEST['id']) : 0;

if(isset($_POST['delete'])) {
    if($_POST['conf'] == 'yes') {
        $row_exists = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM $wp_donation WHERE id = %d", $id)
        );

        if($row_exists) {   
            $wpdb->delete($wp_donation, array('id' => $id)); // Delete the row
        }
    }

    // Redirect after the delete operation
    echo '<script>window.location.href = "' . esc_url(site_url('/wp-admin/admin.php?page=my-plugin-page')) . '";</script>';
    exit; 
}
?>

<style>
.delete-opt{
    width: 6rem;
    display: flex;
    justify-content:space-between;
}
</style>

<form action="" method="post">

    <label><h3>Are you sure you want to delete this donation info?</h3><label><br>
    <div class="delete-opt">
    <div><input type="radio" name="conf" value="yes">Yes</div>
    <div><input type="radio" name="conf" value="no" checked>No</div>
    </div>

    <div style="margin-top:1rem;">
    <button type="submit" name="delete">save</button>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>

</form>