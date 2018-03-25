<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Stock Report By Product
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getstockreportbyproduct.php" method="post" id="getOrderReportForm">
					 <div class="form-group">
				    <label for="productname" class="col-sm-2 control-label">Product Name</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="productName" id="productName" >
						<option value="">~~SELECT~~</option>
						<?php
							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1";
							$productData = $connect->query($productSql);

							while($row = $productData->fetch_array()) {									 		
								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
								} // /while 

						?>
					</select>
				    </div>
				  </div>
				
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/stockreportbyproduct.js"></script>

<?php require_once 'includes/footer.php'; ?>