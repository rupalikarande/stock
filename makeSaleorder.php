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

		
  		<i class="glyphicon glyphicon-plus-sign"></i>	Sale Order
		

	</div> <!--/panel-->	
	<div class="panel-body">
			
	<div class="success-messages"></div> <!--/success-messages-->