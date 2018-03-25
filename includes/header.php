<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        
	  <a class="navbar-brand">Wathare Inventory</a>
	
      	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>        
        
		<li class="dropdown" id="navStockEntry">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Stock Records <span class="caret"></span></a>
			<ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="stockentry.php"> <i class="glyphicon glyphicon-plus"></i> Add Stock Entry</a></li>            
            <li id="topNavManageOrder"><a href="stock_in_out.php"> <i class="glyphicon glyphicon-edit"></i> Total IN/OUT</a></li>            
          </ul>
			
		</li>
		<li id="navExpence"><a href="addexpence.php"><i class="glyphicon glyphicon-pencil"></i>  Add Expence</a></li>  
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>  Brand</a></li>        

        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        

        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>  

        <li id="navSupplier"><a href="supplier.php"> <i class="glyphicon glyphicon-briefcase"></i> Supplier </a></li> 

        <li id="navCustomer"><a href="customer.php"> <i class="glyphicon glyphicon-pawn"></i> Customer </a></li>   

        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
     <li id="topNavAddOrder"><a href="makeinvoice.php"> <i class="glyphicon glyphicon-plus"></i> invoice</a></li>   		  
                  
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 

        <li class="dropdown" id="navStockEntry">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Reports <span class="caret"></span></a>
			<ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="report.php"> <i class="glyphicon glyphicon-edit"></i>Sells By Invoice</a></li>            
            <li id="sellsbyproduct"><a href="by_product_report.php"> <i class="glyphicon glyphicon-edit"></i>Sells By Product</a></li>
			<li id="stockreport"><a href="stock_report.php"> <i class="glyphicon glyphicon-edit"></i>Stock Report</a></li>
			<li id="stockreportbyproduct"><a href="stockreportbyproduct.php"> <i class="glyphicon glyphicon-edit"></i>Stock Report By Product</a></li> 
			<li id="stcokinout"><a href="stocktotalinoutreport.php"> <i class="glyphicon glyphicon-edit"></i>Stock Total In/Out Report</a></li> 
			<li id="expence"><a href="expencereport.php"> <i class="glyphicon glyphicon-edit"></i>Expence Report</a></li> 			
          </ul>
			
		</li>

        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>            
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">