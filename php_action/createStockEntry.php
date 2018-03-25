<?php 	

require_once 'core.php';

if($_POST) {	

	$productName = $_POST['productName'];
	$quantity = $_POST['quantity']; 
	$entryDate =date('Y-m-d', strtotime($_POST['entryDate']));
	$inchal =$_POST['inchal'];
	if($inchal=="")
		$inchal="NA";
	$current_quant = "SELECT product.quantity FROM product WHERE product.product_name = '$productName'";
	$cur_quant = $connect->query($current_quant);
	$quant_res = $cur_quant->fetch_row();
	//echo $quant_res[0];
	$updated_qunat =  $quant_res[0]+$quantity;
	$sql = "INSERT INTO `stock_record` (`sotck_entry_id`, `entry_date`, `quantity`, `current_quantity`, `remain_quantity`, `product_name`, `inchal`) VALUES (NULL, '$entryDate', '$quantity', '$quant_res[0]', '$updated_qunat', '$productName', '$inchal');";
	//echo $sql;
	$updateProductTable = "UPDATE product SET quantity = '$updated_qunat' WHERE product_name = '$productName'";
	$connect->query($updateProductTable);
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