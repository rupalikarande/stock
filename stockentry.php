<?php require_once 'includes/header.php';
	require_once 'php_action/core.php';
 ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Stock Entry</li>
		  <li class="active">All Stock Entry</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Entry</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body" >

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Entry </button>
				</div> <!-- /div-action -->				
				
				<table  class="table" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th>Product Name</th>
							<th>Date</th>
							<th>Entry</th>
							<th>Remaining</th>
							<th>Total Stock</th>
							<th >Invoice/Challan</th>
						</tr></thead>
				</table>
				
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal"  action="php_action/createStockEntry.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Entry</h4>
	      </div>
	      <div class="modal-body">

	      	 <div class="form-group">
				<label for="categoriesStatus" class="col-sm-4 control-label">Product</label>
	        	<label class="col-sm-1 control-label">: </label>
					<div class="col-sm-7">
					<select class="form-control" name="productName" id="productName" >
						<option value="">~~SELECT~~</option>
						<?php
							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1";
							$productData = $connect->query($productSql);

							while($row = $productData->fetch_array()) {									 		
								echo "<option value='".$row['product_name']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
								} // /while 

						?>
					</select>
				 </div>
				</div>
	        <div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Quantity</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="number" name="quantity" id="quantity"  autocomplete="off" class="form-control" min="1" />
			  					
				    </div>
	        </div> <!-- /form-group-->	 
			<div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Date</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="text" class="form-control" id="entryDate" name="entryDate" autocomplete="off" />
			  					
				    </div>
	        </div>
			<div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Invoice/Challan</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="number" name="inchal" id="inchal"  autocomplete="off" class="form-control" min="1" />
			  					
				    </div>
	        </div> <!-- /form-group-->	 		 
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->

<script src="custom/js/stockentry.js"></script>
<script>
$("#entryDate").datepicker();
</script>

<?php require_once 'includes/footer.php'; ?>