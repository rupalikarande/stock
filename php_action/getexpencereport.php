<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM expence_record WHERE exp_date >= '$start_date' AND exp_date <= '$end_date'";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Expence Reason</th>
			<th>Date </th>
			<th>Note</th>
			<th>Amount</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['exp_reason'].'</center></td>
				<td><center>'.$result['exp_date'].'</center></td>
				<td><center>'.$result['exp_note'].'</center></td>
				<td><center>'.$result['exp_amount'].'</center></td>
			</tr>';	
			$totalAmount += $result['exp_amount'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo  "<h3 style='border-style: groove; text-align: center; '>Expence Report From $startDate To $endDate </h3>".$table;

}

?>