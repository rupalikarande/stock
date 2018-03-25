<?php 	

require_once 'core.php';

// $valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customerName 		      = $_POST['CustomerName'];
 
  $ContactNo			       = $_POST['ContactNo'];
  $ContactName 					= $_POST['Contact_Preson_Name'];
  $ContactNum 					= $_POST['Contact_Preson_Number'];
  $Email 					    = $_POST['Email'];
  $gender 			            = $_POST['gender'];
  $GST                       	= $_POST['Gst_num '];
  $productStatus 	            = $_POST['productStatus'];                              
	
	
	
		
				
                $sql = "INSERT INTO customer  (CustomerName, ContactNo, Contact_Preson_Name, Contact_Preson_Number, Email, gender, Gst_num,  active, status) 
				VALUES ('$customerName', '$ContactNo', '$ContactName ', '$ContactNum', '$Email', '$gender','$GST', '$productStatus', 1)";
if ($connect->query($sql) === TRUE) {
    echo "successfully Added";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	
}
				// if($connect->query($sql) === TRUE) {
				//  	$valid['success'] = true;
				// 	$valid['messages'] = "Successfully Added";	
				//  } else {
				//  	$valid['success'] = false;
				//  	$valid['messages'] = "Error while adding the members";
				// }

					
		

	$connect->close();

	// echo json_encode($valid);
 
} // /if $_POST