<?php 



if($_POST) {
	
	
	

	$orderDate = date('Y-m-d', strtotime($_POST['orderDate']));

	
	
	$revcharge = $_POST['revcharge'];
	$invonum = $_POST['invonum'];
	$state = $_POST['state'];
	$statecode = $_POST['statecode'];
	$state = $_POST['state'];
	
	$transmode = $_POST['transmode'];
	$vehicalnum = $_POST['vehicalnum'];
	$dateos = $_POST['dateos'];
	$placeos = $_POST['placeos'];
	
	$clientName = $_POST['name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	
	$ship_name = $_POST['ship_name'];
	$ship_address = $_POST['ship_address'];
	$ship_country = $_POST['ship_country'];

	$subTotalValue = $_POST['subTotalValue'];
	$cgstValue = $_POST['cgstValue'];
	$sgstValue = $_POST['sgstValue'];
	$igstValue = $_POST['igstValue'];
	$totalAmountValue = $_POST['totalAmountValue'];
	$grandTotalValue = $_POST['grandTotalValue'];
	$totalgstvalue = $_POST['totalgstvalue'];
	$inwords = $_POST['inwords'];
	$gstin_ship = $_POST['gstin_ship'];
	$gstin_bill = $_POST['gstin_bill'];
	$discount = $_POST['discount'];		
 
  $clientContact 				= $_POST['contact'];
  $discount 						= $_POST['discount'];
  $paid 								= $_POST['paid'];
  $dueValue 						= $_POST['dueValue'];
  $paymentType 					= $_POST['paymentType'];
  $paymentStatus 				= $_POST['paymentStatus'];

	if (!isset($_POST['p_invoice'])) {
	   $sql = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status)
		VALUES ('$orderDate', '$clientName', '$clientContact', '$subTotalValue', '$totalgstvalue', '$totalAmountValue', '$discount', '$grandTotalValue', '$paid', '$dueValue', $paymentType, $paymentStatus, 1)";
		
		$order_id;
		$orderStatus = false;
		if($connect->query($sql) === true) {
			$order_id = $connect->insert_id;
			$valid['order_id'] = $order_id;	

			$orderStatus = true;
		}
		// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
			
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
				VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

				$connect->query($orderItemSql);		

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity
	
	}			

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$table = '
 <table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
  <tr>
    <th class="tg-031e" colspan="18"><span style="font-size:24px;">Indiam Technologies</span>
	<center><span class="tg-031e" colspan="16">880/358, Saneguruji-Salokhenagar road, Shivganga co. Kolhapur 417012</span></center>
	<center><span class="tg-031e" colspan="16">GSTIN - 27ELFPK5077K1ZL</span></center>
	</th>
	
  </tr>';
 if (isset($_POST['p_invoice'])) {
 $table .= ' <tr>
    <td class="tg-yw4l" colspan="13" rowspan="3"><center><b>Proforma Invoice</b></center></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="5">Original for Receipient</td>
 </tr>';}else{
	 $table .= '
 <tr>
    <td class="tg-yw4l" colspan="13" rowspan="3"><center><b>BILL OF SALE</b></center></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="5">Original for Receipient</td>
 </tr>';}
  $table .= '
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="5">Duplicate for Supplier/Transporter</td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>Triplicate for Supplier</b></td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="10" style="padding-left:5px;"><b>Reverse Charge :</b>'.$revcharge.'<br><b>Invoice No.:</b>'.$invonum.'<br><b>Invoice Date:</b>'.$orderDate.'</td>
    <td class="tg-yw4l" colspan="10" rowspan="2" style="padding-left:5px;"><b>Transportation Mode:</b>'.$transmode.'<br><b>Vehicle Number:</b>'.$vehicalnum.' <br><b>Date of Supply:</b>'.$dateos.'<br><b>Place of Supply:</b>'.$placeos.'</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State:</b>'.$state.'</td>
    <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State Code:</b>'.$statecode.'</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="10" style="padding-left:5px;"><b>Details of Receiver | Billed to:</b></td>
    <td class="tg-yw4l" colspan="8" style="padding-left:5px;"><b>Details of Consignee | Shipped to:</b></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="10" style="padding-left:5px;"><b>Name:</b>'.$clientName.'<br><b>Address: </b>'.$address.'<br><b>Country</b>'.$country.'<br><b>GSTIN :</b>'.$gstin_bill.'</td>
    <td class="tg-yw4l" colspan="8" style="padding-left:5px;"><b>Name: </b>'.$ship_name.'<br><b>Address: </b>'.$ship_address.'<br><b>Country:</b> '.$ship_country.'<br><b>GSTIN :</b>'.$gstin_ship.'</td>
  </tr>
  
  
  <tr>
    <td class="tg-yw4l" rowspan="2"><b>Sr.<br>No</b></td>
    <td class="tg-yw4l" rowspan="2" colspan="4"><b>Product</b> </td>
    <td class="tg-yw4l" rowspan="2"><b>HSN<br>ACS</b></td>
    <td class="tg-yw4l" rowspan="2"><b>UOM</b></td>
    <td class="tg-yw4l" rowspan="2"><b>Qty</b></td>
    <td class="tg-yw4l" rowspan="2"><b>Rate</b></td>
    <td class="tg-yw4l" rowspan="2"><b>Amnt</b></td>
    <td class="tg-yw4l" rowspan="2"><b>Taxable<br>Value</b></td>
    <td class="tg-yw4l" colspan="2"><b>CGST</b></td>
    <td class="tg-yw4l" colspan="2"><b>SGST</b></td>
    <td class="tg-yw4l" colspan="2"><b>IGST</b></td>
    <td class="tg-yw4l" rowspan="2"><b>Total</b></td>
  </tr>
  <tr>
    <td class="tg-yw4l">Rate</td>
    <td class="tg-yw4l">Amnt</td>
    <td class="tg-yw4l">Rate</td>
    <td class="tg-yw4l">Amnt</td>
    <td class="tg-yw4l">Rate</td>
    <td class="tg-yw4l">Amnt</td>
  </tr>';
  
  
  	for($x = 0; $x < count($_POST['productName']); $x++) {		
	$id =$_POST['productName'][$x];
	$srno=$x+1;
	$get_name = "SELECT product_name FROM product WHERE product_id = '$id';";
	$name = $connect->query($get_name);
	$name_res = $name->fetch_row();			
	$table .= ' <tr>
    <td class="tg-yw4l">'.$srno.'</td>
    <td class="tg-yw4l"colspan="4">'.$name_res[0].'</td>
    <td class="tg-yw4l">'.$_POST['hsnacs'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['uom'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['quantity'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['rateValue'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['amount'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['amount'][$x].'</td>
    <td class="tg-yw4l">9%</td>
  
    <td class="tg-yw4l">'.$_POST['cgst'][$x].'</td>
    <td class="tg-yw4l">9%</td>
    <td class="tg-yw4l">'.$_POST['sgst'][$x].'</td>
    <td class="tg-yw4l">18%</td>
	<td class="tg-yw4l">'.$_POST['igst'][$x].'</td>
    <td class="tg-yw4l">'.$_POST['totalValue'][$x].'</td>
  </tr>
			';
	
	} // /while
 
  $table .= '
  <tr>
    <td class="tg-yw4l"><b>Total</b></td>
    <td class="tg-yw4l" colspan="3"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"><b>'.$subTotalValue.'</b></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l" colspan="2"><b>'.$cgstValue.'</b></td>
    <td class="tg-yw4l" colspan="2"><b>'.$sgstValue.'</b></td>
    <td class="tg-yw4l" colspan="2"><b>'.$igstValue.'</b></td>
    <td class="tg-yw4l"><b>'.$totalAmountValue.'</b></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="12" rowspan="6"><b>Total Invoice Amount in Words:</b><br>'.$inwords.'Ruppes Only<br><br><br><br></td>
    <td class="tg-yw4l" colspan="3"><b>Total Amount Before Tax</b></td>
    <td class="tg-yw4l" colspan="3"><center>'.$subTotalValue.'</center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="3"><b>Add : CGST</b></td>
    <td class="tg-yw4l" colspan="3"><center>'.$cgstValue.'</center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="3"><b>Add : SGST</b></td>
    <td class="tg-yw4l" colspan="3"><center>'.$sgstValue.'</center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="3"><b>Add : IGST</b></td>
    <td class="tg-yw4l" colspan="3"><center>'.$igstValue.'</center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="3"><b>Tax Amount : GST</b></td>
    <td class="tg-yw4l" colspan="3"><center><center>'.$totalgstvalue.'</center></center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="3"><b>Discount :</b></td>
    <td class="tg-yw4l" colspan="3"><center><center>'.$discount.'</center></center></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6" rowspan="2" style="padding-left:5px;"><b>Bank Details :</b><br>Indiam Technologies<br> Shree Veershaiv CO-OP Bank Ltd,<br> Saneguruji Branch, Kolhapur<br>• <b>Account Number:</b><br>027010600000138<br>• <b>Branch IFSC</b>:<br>HDFC0CVCB27</td>
    <td class="tg-yw4l" colspan="5" rowspan="4"><center>(Common Seal)</center><br><br><br><br><br><br><br><br><br><br></td>
    <td class="tg-yw4l" colspan="4"><b>Total Amount After Tax</b></td>
    <td class="tg-yw4l" colspan="3"><b><center>'.$grandTotalValue.'</center></b></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="4"></td>
    <td class="tg-yw4l" colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="6" rowspan="2">: Terms and Conditions : <br><br><br><br></td>
    <td class="tg-yw4l" colspan="4">GST Payable on Reverse Charge :</td>
    <td class="tg-yw4l" colspan="4"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="7" style="padding-left:5px;">Certified thatthe particulars given above are true and correct.<br><b>For, Indiam Technologies</b><br><br><br><br>Authorised Signatory</td>
  </tr>
</table>';

	echo $table;

}

?>