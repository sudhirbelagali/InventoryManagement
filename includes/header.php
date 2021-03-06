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
	  <a class="navbar-brand" href="#" style="padding:0px;">
                    <img src="logo.png" alt="">
                </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

  <li id="navDashboard"><a href="product.php"><i class="glyphicon glyphicon-file"></i>Product</a></li>
  <li id="navDashboard"><a href="productDesciption.php"><i class="glyphicon glyphicon-list-alt"></i>ProductDescription</a></li>
  <li id="navDashboard"><a href="ReceiveProduct.php"><i class="glyphicon glyphicon-log-in"></i>Receive Product</a></li>
  <li id="navDashboard"><a href="department.php"><i class="glyphicon glyphicon-home"></i>Departments</a></li>
	<li id="navDashboard"><a href="transfer.php"><i class="glyphicon glyphicon-transfer"></i>Transfer</a></li> 
  
 
        <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
       
		<?php } ?>
		
  
		<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li class="dropdown" id="navReport">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
        aria-expanded="false"> <i class="glyphicon glyphicon-menu-hamburger"></i> 
        Report</a>
          <ul class="dropdown-menu">
          <li id="topNavSetting"><a href="report.php"> <i class="glyphicon glyphicon-triangle-right"></i> by Date</a></li>
          <li id="topNavSetting"><a href="reportDepartment.php"> <i class="glyphicon glyphicon-triangle-right"></i> by Department</a></li>
          <li id="topNavSetting"><a href="reportProduct.php"> <i class="glyphicon glyphicon-triangle-right"></i> by Product</a></li>
            <!-- <a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a> -->
          </ul>
        </li>
		<?php } ?>   
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">    
			<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
            <li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-user"></i> Add User</a></li>
<?php } ?>              
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
           
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
