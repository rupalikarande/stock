
<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");

	$productId = $_POST['productName'];	

	$get_name = "SELECT product_name FROM product WHERE product_id = '$productId';";
	$name = $connect->query($get_name);
	$name_res = $name->fetch_row();
	
	
	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM orders INNER JOIN order_item ON orders.order_id=order_item.order_id  WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1 AND product_id='$productId';";	
	//$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1";
	$query = $connect->query($sql);

	$table = '
	<table  border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Order Id</th>
			<th>Order Date</th>
			<th>Quantity</th>
			<th>Rate</th>
			<th>Grand Total</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_id'].'</center></td>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['grand_total'].'</center></td>
			</tr>';	
			$totalAmount += $result['grand_total'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="4"><center>Total Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo "<h3 style='border-style: groove; text-align: center; '>Sells Report For $name_res[0] From $startDate To $endDate </h3>".$table;

}

?>