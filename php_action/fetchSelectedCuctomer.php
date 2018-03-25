<?php 	

require_once 'core.php';

$customerId = $_POST['customerId'];

$sql = "SELECT CustomerName, ContactNo, Contact_Preson_Name, Contact_Preson_Number, Email, gender, Gst_num,  active, status FROM customer WHERE customer_id = $customerId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);

