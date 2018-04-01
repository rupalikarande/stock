<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

	echo "<div class='div-request div-hide'>add</div>";
 // /else manage order


?>
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li >Order</li>
  <li class="active">
  	  		Add Order
 </li>
</ol>

<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php
		echo "Add Order";

	?>	
</h4>



<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-plus-sign"></i>	Add Order
		

	</div> <!--/panel-->	
    <div class="panel-body">
			
	<div class="success-messages"></div> <!--/success-messages-->

<!-- <form class="form-horizontal" method="POST" action="php_action/createcustomeinvoice.php" id="printinvoice"> -->
<div class="form-group"> 
					<label for="clientName" class="col-sm-2 control-label">Make Performa Invoice</label>
					<input type="checkbox"  id="pi" name="p_invoice" value="pi_true" >
				</div>
  <div class="row clearfix">
  <div class="form-group">
  <label class="col-sm-12 text-center">Details of Receiver | Billed to :</label><br><br>
			    <label for="name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="on" />
			    </div>
				<label for="contactNO" class="col-sm-2 control-label">contact </label>
				 <div class="col-sm-4">
			      <input type="number" class="form-control" id="contactNo" name="contactNo" placeholder="Contact Number" autocomplete="on" />
			    </div><br><br><br>
 </div>
  <hr>
  <div class="col-md-12">
<table class="table table-bordered table-hover" id="productTable">
			  	<thead>
			  		<tr>	
					  <th class="text-center"> # </th>
						<th class="text-center">Product</th>
					    <th class="text-center">Qantity</th>
                        <th class="text-center"> Price</th>
						<th class="text-center">Total</th>
					</tr>
			  	</thead>
			  	<tbody>
				  <tr id='addr0'>
            <td>1</td>

			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 3; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td >
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(this)(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity > 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>

							<td >
			  				<input type="number" name='qantity[]' placeholder='Enter Qty' class="form-control qty" step="0" min="1"/>
							</td>

							<td >
			  			    <input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min=""/>
			  				</td>

							<td >			  				
						    <input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/>			  					
			  				</td>

			  				<!-- <td>
			  				<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td> -->
			  			<!-- </tr>
						  <tr id='addr1'></tr>	 -->
		  		 
					  <tr id='addr1'></tr>
					  <?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
					 </tbody>			  	
			  </table>
			  <div class="col-md-12">

			   <div class="row clearfix">
    <div class="col-md-12">
     
      <button id='delete_row' class="pull-right btn btn-default">Delete Row <i class="glyphicon glyphicon-trash"></i></button>
	  <button id="add_row" class="pull-right btn btn-default ">Add Row <i class="glyphicon glyphicon-plus-sign"></i> </button>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <!-- <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button> -->

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
</form>
</div> <!--/panel-->	
</div> 
<script src="custom/js/bill.js"></script>