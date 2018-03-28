<?php 

require_once 'core.php';

if($_POST) {
    $name = $_POST['name'];
	$contactNo = $_POST['contactNo'];
	$product = $_POST['product'];
	$qantity = $_POST['qantity'];
	$price = $_POST['price'];
    $total = $_POST['total'];
    // $customStatus = $_POST['custom_status'];


    if (!isset($_POST['p_invoice'])) {
        $sql = "INSERT INTO custom (name,contactNo,product,qantity,price,total,custom_status)
         VALUES ('$name', '$contactNo', '$product', '$qantity', '$price', '$total',  1)";
        
         $custom_id;
         $customStatus = false;
         if($connect->query($sql) === true) {
            $custom_id = $connect->insert_id;
             $valid['$custom_id'] = $custom_id;	
 
             $customStatus = true;
             mysql_query($sql, $connect);
         }
         echo $_POST['name'];
    //  $orderItemStatus = false;
 
     for($x = 0; $x < count($_POST['productName']); $x++) {			
         $updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
         $updateProductQuantityData = $connect->query($updateProductQuantitySql);
         
         
         while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
             $updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
                 // update product table
             
                 $updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
                 $connect->query($updateProductTable);
 
                 // add into order_item
                //  $orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
                //  VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";
 
                //  $connect->query($orderItemSql);		
 
                //  if($x == count($_POST['productName'])) {
                //      $orderItemStatus = true;
                 }		
         } // while	
     } // /for quantity
     
     }			
 












//      table = '
//      <table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
//       <tr>
//         <th class="tg-031e" colspan="18"><span style="font-size:24px;">Indiam Technologies</span>
//         <center><span class="tg-031e" colspan="16">880/358, Saneguruji-Salokhenagar road, Shivganga co. Kolhapur 417012</span></center>
//         <center><span class="tg-031e" colspan="16">GSTIN - 27ELFPK5077K1ZL</span></center>
//         </th>
        
//       </tr>';
//      if (isset($_POST['p_invoice'])) {
//      $table .= ' <tr>
//         <td class="tg-yw4l" colspan="13" rowspan="3"><center><b>Proforma Invoice</b></center></td>
//         <td class="tg-yw4l"></td>
//         <td class="tg-yw4l" colspan="5">Original for Receipient</td>
//      </tr>';}else{
//          $table .= '
//      <tr>
//         <td class="tg-yw4l" colspan="13" rowspan="3"><center><b>BILL OF SALE</b></center></td>
//         <td class="tg-yw4l"></td>
//         <td class="tg-yw4l" colspan="5">Original for Receipient</td>
//      </tr>';}
//       $table .= '
//       <tr>
//         <td class="tg-yw4l"></td>
//         <td class="tg-yw4l" colspan="5">Duplicate for Supplier/Transporter</td>
//       </tr>
//       <tr>
//         <td class="tg-yw4l"></td>
//         <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>Triplicate for Supplier</b></td>
//       </tr>
//       <tr>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State:</b>'. $name.'</td>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State Code:</b>'. $contactNo.'</td>
//   </tr>
//   <tr>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State:</b>'.$product.'</td>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State Code:</b>'.$qantity.'</td>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State:</b>'.$price.'</td>
//     <td class="tg-yw4l" colspan="5" style="padding-left:5px;"><b>State Code:</b>'. $total.'</td>
//   </tr>

//   for($x = 0; $x < count($_POST['productName']); $x++) {		
// 	$id =$_POST['productName'][$x];
// 	$srno=$x+1;
// 	$get_name = "SELECT product_name FROM product WHERE product_id = '$id';";
// 	$name = $connect->query($get_name);
// 	$name_res = $name->fetch_row();			
// 	$table .= ' <tr>
//     <td class="tg-yw4l">'.$srno.'</td>
//     <td class="tg-yw4l"colspan="4">'.$name_res[0].'</td>
//     <td class="tg-yw4l">'.$_POST['hsnacs'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['uom'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['quantity'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['rateValue'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['amount'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['amount'][$x].'</td>
//     <td class="tg-yw4l">9%</td>
  
//     <td class="tg-yw4l">'.$_POST['cgst'][$x].'</td>
//     <td class="tg-yw4l">9%</td>
//     <td class="tg-yw4l">'.$_POST['sgst'][$x].'</td>
//     <td class="tg-yw4l">18%</td>
// 	<td class="tg-yw4l">'.$_POST['igst'][$x].'</td>
//     <td class="tg-yw4l">'.$_POST['totalValue'][$x].'</td>
//   </tr>
// 			';
	
// 	} // /while