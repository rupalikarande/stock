<?php 	

require_once 'core.php';

$sql = "SELECT * FROM stock_record";
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



 	$output['data'][] = array( 		
 		$row[5], 
		$row[1], 		
 		$row[2],
		$row[3],
		$row[4],
		$row[6],	
 				
 		); 	
 } // /while 

}// if num_rows

$connect->close();
echo json_encode($output);