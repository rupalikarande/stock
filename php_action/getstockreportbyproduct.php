
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

	$sql = "SELECT * FROM stock_record WHERE entry_date >= '$start_date' AND entry_date <= '$end_date' AND product_name='$name_res[0]';";	
	//$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1";
	$query = $connect->query($sql);

	$table = '
	<table  border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Entry Date</th>
			<th>Quantity In</th>
			<th>Remaining</th>
			<th>Final Stock</th>
		</tr>

		<tr>';
		$totalremain = "";
		$totalquantity = "";
		$totalcurrquantity = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['entry_date'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['current_quantity'].'</center></td>
				<td><center>'.$result['remain_quantity'].'</center></td>
			</tr>';	
			$totalremain = $result['remain_quantity'];
			$totalquantity += $result['quantity'];
			$totalcurrquantity = $result['current_quantity'];
		}
		$table .= '
		</tr>

		<tr>
			
			<td colspan="1"><center>Final Stock</center></td>
			<td><center>'.$totalquantity.'</center></td>
			<td><center>'.$totalcurrquantity.'</center></td>
			<td><center>'.$totalremain.'</center></td>
		</tr>
	</table>
	';	

	echo "<h3 style='border-style: groove; text-align: center; '>Stock Report For $name_res[0] From $startDate To $endDate </h3>".$table;

}

?>