<?php 	

require_once 'core.php';

$sql = "SELECT * FROM product";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];
 	// active 
 	if($row[2] == 1) {
 		// activate member
 		$activeCategories = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$activeCategories = "<label class='label label-danger'>Not Available</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	$totalin = "SELECT SUM(quantity) FROM stock_record WHERE product_name='$row[1]';";
	$tot_in_qry = $connect->query($totalin);
	$tot_in_res = $tot_in_qry->fetch_row();
	
	$totalout = "SELECT SUM(quantity) FROM order_item WHERE product_id='$row[0]';";
	$tot_out_qry = $connect->query($totalout);
	$tot_out_res = $tot_out_qry->fetch_row();

	$currentstock = "SELECT quantity FROM product WHERE product_name='$row[1]';";
							$curr_stock = $connect->query($currentstock);
							$curr_stock_res = $curr_stock->fetch_row();
	
 	$output['data'][] = array( 		
 		$row[1], 
		$tot_in_res[0], 		
 		$tot_out_res[0],
		$curr_stock_res[0],
		
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();
echo json_encode($output);