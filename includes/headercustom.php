<?php 
session_start();
require_once 'Sufal/php_action/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="Sufal/assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="Sufal/assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="Sufal/assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="Sufal/custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="Sufal/assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="Sufal/assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="Sufal/assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="Sufal/assests/jquery-ui/jquery-ui.min.css">
  <script src="Sufal/assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="Sufal/assests/bootstrap/js/bootstrap.min.js"></script>

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
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        
	  <a class="navbar-brand ">Sufal Agricon Pvt. Ltd</a>
	   

        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
       
        </li> 

   

           
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">