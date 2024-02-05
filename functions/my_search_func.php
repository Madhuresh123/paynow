<?php

function my_search_func(){

    global $wpdb, $table_prefix;
    $wp_donation = $table_prefix.'donation';
    $search_word = $_POST['search_word'];


    if(!empty($search_word)){
        $q = "SELECT * FROM `$wp_donation` WHERE 
        `id` LIKE '%".$search_word."%'
        OR `full_name` LIKE '%".$search_word."%'
        OR `email` LIKE '%".$search_word."%'
        OR `contact` LIKE '%".$search_word."%'
        OR `PAN` LIKE '%".$search_word."%'
        ;";

    }else{
        $q = "SELECT * FROM `$wp_donation`;";
    }
    
    $results = $wpdb->get_results($q);


    ob_start();

    // $reversed_results = array_reverse($results);

    foreach($results as $row): ?>  
      <tr class="table-row" id="my-table-results">
      <td><div class="row-cell"><?php echo "RGTWF0" . $row->id; ?></div></td>
      <td><div class="row-cell"><?php echo $row->full_name; ?></div></td>
      <td><div class="row-cell"><?php echo $row->email; ?></div></td>
      <td><div class="row-cell"><?php echo $row->contact; ?></div></td>
      <td><div class="row-cell"><?php echo $row->PAN; ?></div></td>
      <td><div class="row-cell"><?php echo "₹ ". $row->amount; ?></div></td>
      <td>
      <div class="row-cell">
        <div class="status-style <?php echo ($row->status == 1) ? 'completed' : 'pending'; ?>">
        <?php echo ($row->status == 1) ? "Completed" : "Pending"; ?>
        </div>
    </div>
      </td>
      <td><div class="row-cell"><?php echo $row->date; ?></div></td>
      <td><div class="row-cell">

      <a href="admin.php?page=donation-edit&id=<?php echo $row->id; ?>" style="margin-right:1rem;">Edit</a>
      <a href="admin.php?page=donation-delete&id=<?php echo $row->id; ?>">Delete</a>
</div>
      </td>  
    </tr>
  <?php endforeach;

    echo ob_get_clean();

    die();  
 }