<?php require_once 'includes/header.php';
	require_once 'php_action/core.php';
 ?>
<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$totalin = "SELECT SUM(quantity) FROM stock_record;";
$tot_in_qry = $connect->query($totalin);
$tot_in_res = $tot_in_qry->fetch_row();
if($tot_in_res[0]==null)
	$tot_in_res[0] = 0;

$totalsell = "SELECT SUM(quantity) FROM order_item;";
$tot_sell_qry = $connect->query($totalsell);
$tot_sell_res = $tot_sell_qry->fetch_row();
if($tot_sell_res[0]==null)
	$tot_sell_res[0] = 0;



?>
<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock Entry</li>
		  <li class="active">Total In Out</li>
		</ol>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			  <div class="cardHeader" style="background-color:#245580;">
				<h1><?php echo$tot_in_res[0]; ?></h1>
			  </div>

			  <div class="cardContainer">
				<p><h4> <i class="glyphicon glyphicon-download" style="font-size:20px"></i> Total In</h4></p>
			  </div>
		</div>  
	</div>
	<div class="col-md-6">
		<div class="card">
			  <div class="cardHeader" >
				<h1><?php echo$tot_sell_res[0]; ?></h1>
			  </div>

			  <div class="cardContainer">
				<p><h4> <i class="glyphicon glyphicon-upload" style="font-size:20px"></i> Total Out</h4></p>
			  </div>
		</div>  
	</div>
	
	<div class="col-md-12">
<br>
		

		
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Entry</div>
			</div> <!-- /panel-heading -->
				
		
			
			<div class="panel-body">

				<div class="remove-messages"></div>

				<table class="table" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th>Product Name</th>
							<th>IN</th>
							<th>OUT</th>
							<th>Available</th>
						</tr></thead>
						<tbody>	
						
					</body>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src="custom/js/stock_in_out.js"></script>
<script>
$("#entryDate").datepicker();
</script>


<?php require_once 'includes/footer.php'; ?>