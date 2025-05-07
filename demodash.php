<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DashBoard Page</title>
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
    session_start();
    ?>
      <input type="button" name="userLogin" value="<?php echo $_SESSION['username'] ?>" class="userBadge">
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
<br>
<!--  -->

<?php
  $sn = "localhost";
  $un = "root";
  $pw = "";
  $db = "imsdb";

  $con = mysqli_connect($sn, $un, $pw, $db);

  if(!$con){
    die("Connection Error".mysqli_connect_error());
  }

  $cust_count = "SELECT COUNT('cid') from customer_details";
  $vendor_count = "SELECT COUNT('vid') from vendor_details";
  $purchase_count = "SELECT COUNT('item_code') from purchase_details";
  $sale_count = "SELECT COUNT('item_code') from sale_details";

  $res1 = mysqli_query($con, $cust_count);
  $res2 = mysqli_query($con, $vendor_count);
  $res3 = mysqli_query($con, $purchase_count);
  $res4 = mysqli_query($con, $sale_count);
  $r1 = $r2 = $r3 = $r4 = null;
  if($r1 = $res1->fetch_row()){
    $r1 = $r1[0];
  }
  if($r2 = $res2 -> fetch_row()){
    $r2 = $r2[0];
  }
  if($r3 = $res3 -> fetch_row()){
    $r3 = $r3[0];
  }
  if($r4 = $res4 -> fetch_row()){
    $r4 = $r4[0];
  }



  mysqli_close($con);
?>

<div class="row row-cols-1 row-cols-md-2 g-4 custom-dashitems">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa-solid fa-person" style="font-size:36px; color:#34a4eb;"></i>
        <h5 class="card-title">Customers:</h5>   
        <h4><?php echo isset($r1) ? (int)$r1 : 0 ?></h4>  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <i class="fa-solid fa-cart-shopping" style="font-size:36px; color:#0000ff;"></i>
        <h5 class="card-title">Sales:</h5>
        <h4><?php echo isset($r4) ? (int)$r4 : 0 ?></h4>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa-solid fa-store" style="font-size:36px; color: #eba534; "></i>
        <h5 class="card-title">Vendors:</h5>   
        <h4><?php echo isset($r2) ? (int)$r2 : 0 ?></h4>      
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <i class="fa-solid fa-money-check" style="font-size:36px; color: #45de4c;"></i>
        <h5 class="card-title">Purchase:</h5>     
        <h4><?php echo isset($r3) ? (int)$r3 : 0 ?></h4>     
      </div>
    </div>
  </div>
</div>
<!--  -->

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Add</button>
    <p class="nav_tab_heading">Master Details</p>
  </div>
</nav>

<?php

      
    function getItemVal(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);  
      $m_itmc = "";
      if(isset($_POST['m-itemcode'])){
        $m_itmc = $_POST['m-itemcode'];
      }

      $getItmCode = "SELECT item_name,qty,gst,net FROM purchase_details where item_code = '$m_itmc'";
      $getSp = "SELECT net FROM sale_details where item_code = '$m_itmc'";

      $r1 = mysqli_query($con, $getItmCode);
      $r2 = mysqli_query($con, $getSp);

      $res = [
        'itemname' => '',
        'qyt' => '',
        'gst' => '',
        'p_price' => '',
        's_price' => '' 
      ];
      $re_order_qty='';
      if(mysqli_num_rows($r1) > 0){
        $row = mysqli_fetch_assoc($r1);
        $res['itemname'] = $row['item_name'];
        $res['qty'] = $row['qty'];
        $re_order_qty = $res['qty'];
        $res['gst'] = $row['gst'];
        $res['p_price'] = $row['net'];
      }
      if(mysqli_num_rows($r2) > 0){
        $row = mysqli_fetch_assoc($r2);
        $res['s_price'] = $row['net'];
      }

      mysqli_close($con);

      return $res;
    }

    if(isset($_POST['m_click'])){
        $out = getItemVal();
    }

    

    function reOrderUpdate(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";

      $con = mysqli_connect($sn, $un, $pass, $db);  
      if(!$con){
        die("Connection Error".mysqli_connect_error());
      }
      $re_order = $m_itmc = '';
      if(isset($_POST['get_reAddQty'])){
        $re_order=$_POST['get_reAddQty'];
      }
      if(isset($_POST['m-itemcode'])){
        $m_itmc = $_POST['m-itemcode'];
      }
      $getBalQty = "select qty from purchase_details where item_code='$m_itmc'";
      $c1 = mysqli_query($con, $getBalQty);
      if($rows = $c1 -> fetch_row() ){
        $re_order += $rows[0];
      }
      $up_ro = "update purchase_details set qty='$re_order' where item_code='$m_itmc'";
      $op = mysqli_query($con, $up_ro);
        if($op){
          echo "<script> alert('Re Order Success') </script>";
        }
        else{
          echo "<script> alert('Re Order Failed') </script>";
        }
        mysqli_close($con);
      return;
    }

    if(isset($_POST['m_reorder'])){
      reOrderUpdate();
    }
      
?>

<!-- tab1 -->
<div class="tab-content custom-tab-masterfile" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<form class="row g-3 custom-row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" novalidate>
  <div class="col-md-4 cust-src">
    <label for="validationCustom02" class="form-label">Item Code</label>
    <input type="text" class="form-control" id="validationCustom02" name="m-itemcode" value="<?php echo isset($_POST['m-itemcode']) 
    ? $_POST['m-itemcode'] : '' ?>" > 
  </div>
  <div class="d-flex">
    <button class="btn btn-info master-srchbtn" name="m_click" type="submit">Search</button>
  </div>
  <hr>
  <div class="col-md-4">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control" value="<?php echo isset($out['itemname']) ? $out['itemname'] : '' ?>">
  </div>
  <div class="col-md-4">
    <label  class="form-label">Quantity</label>
    <input type="text" class="form-control" name="reOrder_qty" value="<?php echo isset($out['qty']) ? $out['qty'] : '' ?>" >
  </div>
  <div class="col-md-4">
    <label class="form-label">Purchase Price</label>
    <input type="text" class="form-control" value="<?php  echo isset($out['qty']) ? $out['p_price'] : '' ?>">
  </div>
  <div class="col-md-4">
    <label class="form-label">Sales Price</label>
    <input type="text" class="form-control" value="<?php  echo isset($out['s_price']) ? $out['s_price'] : '' ?> " >
  </div>
  <div class="col-md-4">
    <label class="form-label">Gst</label>
    <input type="text" class="form-control" value="<?php  echo isset($out['gst']) ? $out['gst'] : '' ?> " >
  </div>
  <div class="col-md-4">
    <label class="form-label">ReOrder Level</label>
    <input type="number" class="form-control"  value="0" name="get_reAddQty">
  </div>
  
  <div class="d-flex gap-2">
    <button class="btn btn-primary" name="m_reorder" type="submit">Re-order</button>
  </div>
</form>
</div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="dash_boardprg.js"></script>
</body>
</html>