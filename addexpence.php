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
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Expence</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body" >

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Expence </button>
				</div> <!-- /div-action -->				
				
				<table  class="table" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th>Expence Reason</th>
							<th>Amount </th>
							<th>Date</th>
							<th>Note</th>
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

    	<form class="form-horizontal"  action="php_action/createExpenceEntry.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Expence</h4>
	      </div>
	      <div class="modal-body">

	      	 <div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Expence Reason</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="text" name="exprea" id="exprea"  autocomplete="on" class="form-control" min="1" />
			  					
				    </div>
	        </div> <!-- /form-group-->	 
	        <div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Amount</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="number" name="amount" id="amount"  autocomplete="off" class="form-control" min="1" />
			  					
				    </div>
	        </div> <!-- /form-group-->	 
			<div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Date</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="text" class="form-control" id="expdate" name="expdate" autocomplete="off" />
			  					
				    </div>
	        </div>
			<div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Note</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      			  					
			  		<input type="text" name="note" id="note"  autocomplete="off" class="form-control" min="1" />
			  					
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

<script src="custom/js/addexpence.js"></script>
<script>
$("#expdate").datepicker();
</script>

<?php require_once 'includes/footer.php'; ?>