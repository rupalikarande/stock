<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM product";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Product Name</th>
			<th>Quantity In</th>
			<th>Quantity Out</th>
			<th>Available Stock</th>
		</tr>

		<tr>';
		$totalremain = "";
		$totalinquant = "";
		$totaloutquant = "";
		while ($result = $query->fetch_assoc()) {
			//echo $result['product_name'];
			$totalin = "SELECT SUM(quantity) FROM stock_record WHERE product_name='".$result['product_name']."';";
			$tot_in_qry = $connect->query($totalin);
			$tot_in_res = $tot_in_qry->fetch_row();
			
			$totalout = "SELECT SUM(quantity) FROM order_item WHERE product_id='".$result['product_id']."';";
			$tot_out_qry = $connect->query($totalout);
			$tot_out_res = $tot_out_qry->fetch_row();
			
			$currentstock = "SELECT quantity FROM product WHERE product_name='".$result['product_name']."';";
			$curr_stock = $connect->query($currentstock);
			$curr_stock_res = $curr_stock->fetch_row();

			$table .= '<tr>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$tot_in_res[0].'</center></td>
				<td><center>'.$tot_out_res[0].'</center></td>
				<td><center>'.$curr_stock_res[0].'</center></td>
			</tr>';	
			$totalinquant += $tot_in_res[0];
			$totaloutquant += $tot_out_res[0];
			$totalremain += $curr_stock_res[0];
		}
		$table .= '
		</tr>

		<tr>
			
			<td colspan="1"><center>Total Stock</center></td>
			<td><center>'.$totalinquant.'</center></td>
			<td><center>'.$totaloutquant.'</center></td>
			<td><center>'.$totalremain.'</center></td>
		</tr>
	</table>
	';	

	echo "<h3 style='border-style: groove; text-align: center; '>Stock In/Out Report From $startDate To $endDate </h3>".$table;

}
?>