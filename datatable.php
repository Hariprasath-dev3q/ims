<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Tables</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="d.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<!-- main header -->
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

<!-- navtabs -->
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Customer</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Vendor</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Purchase</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Sale</button>    
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" role="tabpanel" id="nav-home" aria-labelledby="nav-cust-tab" tabindex="0">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Location</th>
      <th scope="col">District</th>
      <th scope="col">State</th>
      <th scope="col">Pincode</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php 
    function cust_view(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);

      $getAllValues = "select * from customer_details";
      $res = mysqli_query($con, $getAllValues);
      
      while($row = mysqli_fetch_array($res)){
        echo "
          <tr>
            <td>".$row['cid']."</td>
            <td>".$row['cname']."</td>
            <td>".$row['location']."</td>
            <td>".$row['district']."</td>
            <td>".$row['state']."</td>
            <td>".$row['pincode']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['email']."</td>
          </tr>
        ";
      } 

      mysqli_close($con);
    }

    cust_view();
  ?>

</tbody>
</table>
  </div>

  <div class="tab-pane fade" role="tabpanel" id="nav-profile" aria-labelledby="nav-vendor-tab" tabindex="0">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">Vendor ID</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">Location</th>
      <th scope="col">Phone No</th>
      <th scope="col">Email ID</th>
      <th scope="col">District</th>
      <th scope="col">State</th>
      <th scope="col">Pincode</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php 
    function ven_view(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);

      $getAllValues = "select * from vendor_details";
      $res = mysqli_query($con, $getAllValues);
      
      while($row = mysqli_fetch_array($res)){
        echo "
          <tr>
            <td>".$row['vid']."</td>
            <td>".$row['vname']."</td>
            <td>".$row['location']."</td>
            <td>".$row['district']."</td>
            <td>".$row['state']."</td>
            <td>".$row['pincode']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['email']."</td>
          </tr>
        ";
      } 

      mysqli_close($con);
    }

    ven_view();
  ?>
  </tbody>
</table>
  </div>

  <div class="tab-pane fade" role="tabpanel" id="nav-contact" aria-labelledby="nav-purchase-tab" tabindex="0"><table class="table">
  <thead>
    <tr>
      <th scope="col">Vendor ID</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">P_Date</th>
      <th scope="col">Item code</th>
      <th scope="col">Item name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Gst</th>
      <th scope="col">Cgst</th>
      <th scope="col">Sgst</th>
      <th scope="col">Net</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php 
    function pur_view(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);

      $getAllValues = "select * from purchase_details";
      $res = mysqli_query($con, $getAllValues);
      
      while($row = mysqli_fetch_array($res)){
        echo "
          <tr>
            <td>".$row['vid']."</td>
            <td>".$row['vname']."</td>
            <td>".$row['pdate']."</td>
            <td>".$row['item_code']."</td>
            <td>".$row['item_name']."</td>
            <td>".$row['qty']."</td>
            <td>".$row['price']."</td>
            <td>".$row['total']."</td>
            <td>".$row['gst']."</td>
            <td>".$row['cgst']."</td>
            <td>".$row['sgst']."</td>
            <td>".$row['net']."</td>
          </tr>
        ";
      } 

      mysqli_close($con);
    }

    pur_view();
  ?>
  </tbody>
</table>
</div>

  <div class="tab-pane fade" role="tabpanel" id="nav-disabled" aria-labelledby="nav-sale-tab" tabindex="0">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Sale Date</th>
      <th scope="col">Item code</th>
      <th scope="col">Item name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Gst</th>
      <th scope="col">Cgst</th>
      <th scope="col">Sgst</th>
      <th scope="col">Net</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php 
    function sal_view(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);

      $getAllValues = "select * from sale_details";
      $res = mysqli_query($con, $getAllValues);
      
      while($row = mysqli_fetch_array($res)){
        echo "
          <tr>
            <td>".$row['cid']."</td>
            <td>".$row['cname']."</td>
            <td>".$row['sdate']."</td>
            <td>".$row['item_code']."</td>
            <td>".$row['item_name']."</td>
            <td>".$row['qty']."</td>
            <td>".$row['price']."</td>
            <td>".$row['total']."</td>
            <td>".$row['gst']."</td>
            <td>".$row['cgst']."</td>
            <td>".$row['sgst']."</td>
            <td>".$row['net']."</td>
          </tr>
        ";
      } 

      mysqli_close($con);
    }

    sal_view();
  ?>
  </tbody>
</table>
  </div>
</div>
<!-- * -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="dash_boardprg.js"></script>
</body>
</html>