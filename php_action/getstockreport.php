<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM stock_record WHERE entry_date >= '$start_date' AND entry_date <= '$end_date';";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Product Name</th>
			<th>Entry Date</th>
			<th>Quantity In</th>
			<th>Remaining</th>
			<th>Total Stock</th>
			<th>Invoic/Challan</th>
		</tr>

		<tr>';



		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['entry_date'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['current_quantity'].'</center></td>
				<td><center>'.$result['remain_quantity'].'</center></td>
				<td><center>'.$result['inchal'].'</center></td>
			</tr>';	



		}
		$table .= '
		</tr>

		<tr>
			
			<td colspan="6"><center>End Of Doc</center></td>
		

		</tr>
	</table>
	';	

	echo "<h3 style='border-style: groove; text-align: center; '>Stock Report From $startDate To $endDate </h3>".$table;

}

?>