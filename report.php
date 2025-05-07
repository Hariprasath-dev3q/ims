<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="d.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h3 class="nav-title">Inventory</h3>
    <div class="userIdbadge">
      <?php 
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";
      $con = mysqli_connect($sn, $un, $pass, $db);
      if (!$con) {
        die("Connection failed: " .mysqli_connect_error());
      }
      $query = "select username from reguser";
      $exe = mysqli_query($con, $query);
      $res = mysqli_fetch_assoc($exe);
      mysqli_close($con);
    ?>
      <input type="button" name="userLogin" value="<?php echo $res['username'] ?>" class="userBadge">
      <i class="fa-solid fa-user" style="color:#fff"></i>
    </div>
    <div class="offcanvas offcanvas-start custom-offcanvas" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <a href="#" class="ims-main"><img src="images/inventory.png"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    <div class="offcanvas-body">
      <div>
        <ul>
          <li class="list-bg-color"><i class="fa-solid fa-gauge"></i><a class="dash-list" href="demodash.php" target="_self">Master file</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-user-plus"></i><a class="dash-list"  href="customer.php" target="_self">Customer</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-money-bill-trend-up"></i><a class="dash-list"  href="sales.php" target="_self">Sales</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-universal-access"></i><a class="dash-list"  href="Vendor.php" target="_self">Vendor</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-cart-shopping"></i><a class="dash-list"  href="purchase.php" target="_self">Purchase</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-table-columns"></i><a class="dash-list"  href="datatable.php" target="_self">DataTable</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-file"></i><a class="dash-list" href="report.php" target="_self">Reports</a></li>
          <li class="list-bg-color"><i class="fa-solid fa-circle-left"></i><a class="dash-list" href="login.php" target="_self">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>
  </div>
</nav>
<!-- *** -->
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Report</button>
    <p class="nav_tab_heading">Generate Invoice</p>
  </div>
</nav>
</div>
<!-- tab1 -->
<div class="tab-content custom-tab-masterfile animate-bottom"  id="nav-tabContent" >
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
		<form class="row g-3 custom-row" method="post" action="generatePDF.php" novalidate>
  			<div class="col-md-4">
    			<label for="validationCustom02" class="form-label">Customer_ID</label>
    			<input type="text" class="form-control" id="validationCustom02" name="cid" required>
  			</div>
  			<div class="col-md-4">
      			<label class="form-label">Choose Date</label>
      			<input type="date" class="form-control" value="" name="choose_date">
    		</div>
    		<hr>
  			<div class="d-flex gap-2">
    			<button class="btn btn-success" type="submit" name="Viewbtn">View</button>
    			<button class="btn btn-warning" type="submit" name="Printbtn">Print</button>
  			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="dash_boardprg.js"></script>
</body>
</html>