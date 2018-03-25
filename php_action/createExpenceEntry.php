<?php 	

require_once 'core.php';

if($_POST) {	

	$exprea = $_POST['exprea'];
	$expamount = $_POST['amount']; 
	$expdate =date('Y-m-d', strtotime($_POST['expdate']));
	$expnote =$_POST['note'];

	$sql = "INSERT INTO `stock`.`expence_record` (`exp_id`, `exp_reason`, `exp_amount`, `exp_date`, `exp_note`) VALUES (NULL, '$exprea', '$expamount', '$expdate', '$expnote');";
	//echo $sql;


	if($connect->query($sql) === TRUE) {
		echo "<script>alert('hi!!');</script>";
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
		header('Location: ../stockentry.php');
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	//echo json_encode($valid);
	$connect->close();
	
	
 
} // /if $_POST