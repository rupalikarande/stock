<?php 	

require_once 'core.php';

$sql = "SELECT * FROM expence_record";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeCategories = ""; 

 while($row = $result->fetch_array()) {
  	$output['data'][] = array( 		

		$row[1], 		
 		$row[2],
		$row[3],
		$row[4],

 		); 	
 } // /while 

}// if num_rows

$connect->close();
echo json_encode($output);