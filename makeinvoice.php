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



<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-plus-sign"></i>	Add Order
		

	</div> <!--/panel-->	
	<div class="panel-body">
			
	<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createprintinvoice.php" id="printinvoice">
				<div class="form-group"> 
					<label for="clientName" class="col-sm-2 control-label">Make Performa Invoice</label>
					<input type="checkbox"  id="pi" name="p_invoice" value="pi_true" >
				</div>
				<div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Reverse Charge</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="revcharge" name="revcharge" placeholder="Reverse Charge" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">State</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="state" name="state" placeholder="state" autocomplete="on" />
			    </div>
			  </div> <!--/form-group-->
			  	  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Invoice No</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="invonum" name="invonum" placeholder="Invoice No" autocomplete="off" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">State Code</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="statecode" name="statecode" placeholder="state code" autocomplete="on" />
			    </div>
				
			  </div> <!--/form-group-->	
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Invoice Date</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  <hr><!--tansport mode-->
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Transportation Mode</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="transmode" name="transmode" placeholder="Transportation mode" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">Vehicale Number</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="vehicalnum" name="vehicalnum" placeholder="vehical number" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Date of Supply</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="dateos" name="dateos" placeholder="Date of Supply" autocomplete="off" required/>
			    </div>
				<label for="clientName" class="col-sm-2 control-label">Place of Supply</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="placeos" name="placeos" placeholder="Place of Supply" autocomplete="on" />
			    </div>
			  </div> <!--/form-group-->
			<hr><!--biiled to-->  
			<div class="form-group">
				<label class="col-sm-12 text-center">Details of Receiver | Billed to :</label>
			    <label for="clientName" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">address</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="address" name="address" placeholder="address" autocomplete="on" />
			    </div>
				
			  </div> <!--/form-group-->
			  <div class="form-group">
			  <label for="clientName" class="col-sm-2 control-label">country</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="country" name="country" placeholder="country" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">Contact</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="contact" name="contact" placeholder="contact no" autocomplete="on" />
			    </div>
				</div>
				<div class="form-group">
				  <label for="clientName" class="col-sm-2 control-label">GSTIN</label>
					 <div class="col-sm-4">
					  <input type="text" class="form-control" id="gstin_bill" name="gstin_bill" placeholder="GSTIN" autocomplete="on" />
					</div>
				
				</div>
				<hr><!--reciver address-->  
				<div class="form-group">
				<label class="col-sm-12 text-center">Details of Consignee | Shipped to:</label>
			    <label for="clientName" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="ship_name" name="ship_name" placeholder="Name" autocomplete="on" />
			    </div>
				<label for="clientName" class="col-sm-2 control-label">address</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="ship_address" name="ship_address" placeholder="address" autocomplete="on" />
			    </div>
				
			  </div> <!--/form-group-->
			  <div class="form-group">
			  <label for="clientName" class="col-sm-2 control-label">country</label>
				 <div class="col-sm-4">
			      <input type="text" class="form-control" id="ship_country" name="ship_country" placeholder="country" autocomplete="on" />
			    </div>
				</div>
				<div class="form-group">
				  <label for="clientName" class="col-sm-2 control-label">GSTIN</label>
					 <div class="col-sm-4">
					  <input type="text" class="form-control" id="gstin_ship" name="gstin_ship" placeholder="GSTIN" autocomplete="on" />
					</div>
				
				</div>
				<hr><!--reciver address-->  
			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
						<th style="width:20%; ">Product</th>
						<th style="width:10%; padding-left:10px;">HSN/ACS </th>
						<th style="width:5%; padding-left:10px;">UOM</th>
						<th style="width:5%; padding-left:50px;">Qty</th>
						<th style="width:5%; padding-left:30px;">typ</th>
			  			<th style="width:5%; padding-left:50px;">Rate</th>
						<th style="width:5%; padding-left:30px;">Amount</th>
						<th style="width:5%; padding-left:10px;">less</th>
						<th style="width:10%; padding-left:10px;">Taxable</th>
			  			
						<th style="width:6%; padding-left:30px;">CGST <input type="checkbox"  id="gsttrue" value="cgsttrue" ></th>
						
						<th style="width:6%; padding-left:30px;">SGST  <input type="checkbox" id="sgsttrue" value="sgsttrue"></th>
						<th style="width:6%; padding-left:30px;">IGST  <input type="checkbox" id="igsttrue" value="igsttrue"></th>			  			
			  			<th style="width:9%; padding-left:80px;">Total</th>
			  			
			  			<th style="width:3%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 4; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
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
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="number" name="hsnacs[]" id="hsnacs<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="uom[]" id="uom<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">

			  					<select class="form-control" name="rates[]" id="rates<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="r">R</option>
									<option value="d">D</option>
									<option value="s">S</option>
			  						
		  						</select>
			  					</div>
			  				</td>
													
			  				<td style="padding-left:18px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
							<td style="padding-left:18px;">
			  					<div class="form-group">
			  					<input type="text" name="amount[]" id="amount<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="less[]" id="less<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:25px;">
			  					<div class="form-group">
			  					<input type="text" name="taxable[]" id="taxable<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" disabled="true" autocomplete="off" class="form-control" min="1" />
								<input type="hidden" name="taxablevalue[]" id="taxablevalue<?php echo $x; ?>" autocomplete="off" class="form-control" />
								</div>
			  				</td>
							
			  				
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="cgst[]" id="cgst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="sgst[]" id="sgst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
							<td style="padding-left:28px;">
			  					<div class="form-group">
			  					<input type="text" name="igst[]" id="igst<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label">Sub Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">CGST </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="cgst" name="cgst" disabled="true" />
				      <input type="hidden" class="form-control" id="cgstValue" name="cgstValue" />
				    </div>
				  </div> <!--/form-group-->		
				<div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">SGST </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="sgst" name="sgst" disabled="true" />
				      <input type="hidden" class="form-control" id="sgstValue" name="sgstValue" />
				    </div>
				  </div> <!--/form-group-->	
				<div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">IGST </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="igst" name="igst" disabled="true" />
				      <input type="hidden" class="form-control" id="igstValue" name="igstValue" />
				    </div>
				  </div> <!--/form-group-->		
				<div class="form-group">
				    <label for="vat" class="col-sm-3 control-label"> Total GST </label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalgst" name="totalgst" disabled="true" />
				      <input type="hidden" class="form-control" id="totalgstvalue" name="totalgstvalue" />
				    </div>
				  </div> <!--/form-group-->						  
				  <div class="form-group">
				    <label for="totalAmount" class="col-sm-3 control-label">Total Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="discount" class="col-sm-3 control-label">Discount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="discount" name="discount"  autocomplete="off"  required/>
				    </div>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				    <label for="grandTotal" class="col-sm-3 control-label">Grand Total</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true"  />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
				    </div>
				  </div> <!--/form-group-->	
				<div class="form-group">
				    <label for="grandTotal" class="col-sm-3 control-label">Amount In Words</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="inwords" name="inwords"  />
				      <input type="hidden" class="form-control" id="inwordsvalue" name="inwordsvalue" />
				    </div>
				  </div> <!--/form-group-->			  		  
			  </div> <!--/col-md-6-->

			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="paid" class="col-sm-3 control-label">Paid Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" required/>
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="due" class="col-sm-3 control-label">Due Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="due" name="due" disabled="true" />
				      <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
				    </div>
				  </div> <!--/form-group-->		
				  <div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentType" id="paymentType" required>
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">Cheque</option>
				      	<option value="2">Cash</option>
				      	<option value="3">Credit Card</option>
				      </select><br>
					 </div>
					
				  </div> <!--/form-group-->							  
				  <div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentStatus" id="paymentStatus" required>
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">Full Payment</option>
				      	<option value="2">Advance Payment</option>
				      	<option value="3">No Payment</option>
				      </select>
				    </div>
					
				  </div> <!--/form-group-->							  
			  </div> <!--/col-md-6-->


			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
			</form>

	</div> <!--/panel-->	
</div> <!--/panel-->	

<script>
	
</script>


<script src="custom/js/printinvoice.js"></script>
<script src="custom/js/invoice.js"></script>

<?php require_once 'includes/footer.php'; ?>


	