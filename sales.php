<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sales Page</title>
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
<!-- *** -->
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Add</button>
    <p class="nav_tab_heading">Sales Details</p>
  </div>
</nav>
<!-- tab1 -->

<div class="tab-content custom-tab-masterfile" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<form class="row g-3 custom-row" name="frm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" novalidate>
  <div class="col-md-4">
    <label  class="form-label">Customer_Id</label>
    <input type="text" class="form-control" name="cid" required>
  </div>
  <div class="col-md-4">
    <label  class="form-label">Customer_Name</label>
    <input type="text" class="form-control" name="cname" required>
  </div>
  <div class="col-md-4">
      <label class="form-label">Sale Date</label>
      <input type="date" class="form-control" value="" name="sdate">
    </div>
  <div class="col-md-4">
    <label class="form-label">Item Code</label>
    <input type="text" class="form-control" name="sitemcode" required>
  </div>
  <div class="col-md-4">
    <label  class="form-label">Item Name</label>
    <input type="text" class="form-control" name="sitemname" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Quantity</label>
    <input type="number" class="form-control" name="sqty" required>
  </div>
  <div class="col-md-4">
    <label  class="form-label">Price</label>
    <input type="number" class="form-control" placeholder= &#8377 name="sprice" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Total</label>
    <input type="number" class="form-control" disabled placeholder= &#8377 name="stotal" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">GST</label>
    <input type="number" class="form-control" name="sgst" required>
  </div>
  <div class="col-md-4">
    <label  class="form-label">CGST</label>
    <input type="number" class="form-control" name="scgst" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">SGST</label>
    <input type="number" class="form-control" name="ssgst" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Net</label>
    <input type="number" class="form-control" disabled placeholder= &#8377 name="snet" required>
  </div>
  
  <!-- buttons -->
  <!-- <div class="d-flex gap-2"> -->
    <button class="btn btn-primary" type="button" id="calc-btn" name="calcbtn" onclick="saleCalc();">Calc</button>
    <button class="btn btn-success" type="submit" name="addbtn">Add</button>
    <button class="btn btn-warning" type="submit" name="modbtn">Modify</button>
    <button class="btn btn-danger" type="submit" name="delbtn">Delete</button>
  <!-- </div> -->
</form>
</div>
</div>
  
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="dash_boardprg.js"></script>
</body>
</html>

<?php 
  if(isset($_POST['addbtn'])){
      add();
  }
  if(isset($_POST['modbtn'])){
      mod();
  }
  if(isset($_POST['delbtn'])){
      del();
  }
    
  /* for adding */

    function add(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";
      $con = mysqli_connect($sn, $un, $pass, $db);
      if (!$con) {
        die("Connection failed: " .mysqli_connect_error());
      }

    if (isset($_POST['cid'])) {
     $c_id = $_POST['cid'];
    }
    if(isset($_POST['cname'])){
       $c_name = $_POST['cname'];
    }
    if(isset($_POST['sdate'])){
      $s_date = $_POST['sdate'];
    }
    if(isset($_POST['sitemcode'])){
      $s_itemcode = $_POST['sitemcode'];
    }
    if(isset($_POST['sitemname'])){
      $s_itemname = $_POST['sitemname'];
    }
    if(isset($_POST['sqty'])){
      $s_qty = $_POST['sqty'];
      
    }
    if(isset($_POST['sprice'])){
      $s_price = $_POST['sprice'];
    }
    if(isset($_POST['sgst'])){
      $s_gst = $_POST['sgst'];
    }
    if(isset($_POST['scgst'])){
      $s_cgst = $_POST['scgst'];
    }
    if(isset($_POST['ssgst'])){
      $s_sgst = $_POST['ssgst'];
    }

    $purchaseQtyGet = "select qty from purchase_details where  item_code='$s_itemcode'";
    $r1 = mysqli_query($con, $purchaseQtyGet);
    if($row = $r1->fetch_row()){
      $spec_item_qty = $row[0];
      if($spec_item_qty > 0){
      $spec_item_qty = $spec_item_qty - (int)$s_qty;
      $purchaseQtyUpdate = "update purchase_details set qty='$spec_item_qty' where  item_code='$s_itemcode'";
      $r2 = mysqli_query($con, $purchaseQtyUpdate);
      }
      else{
        echo '<script> alert("Insufficient Quantity!")</script>';
      }
    }
    else{
      echo '<script> alert("Item code not founc!")</script>';
    }
    

    $s_total = $s_price*$s_qty;
    $s_gst = $s_price*$s_gst/100;
    $s_net = $s_total+$s_gst;
   
      $insertAllValues = "insert into sale_details values('$c_id','$c_name','$s_date','$s_itemcode','$s_itemname',
      '$s_qty', '$s_price','$s_total','$s_gst','$s_cgst','$s_sgst','$s_net')";

      $res = mysqli_query($con, $insertAllValues);

      if($res == true){
            echo '<script> alert("Record added") </script>';
        }
        else{
            echo '<script> alert("Record not added") </script>';
        }
        mysqli_close($con);
      return;
    }

    /* ### */

    /* for modify*/
    function mod(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";
      $con = mysqli_connect($sn, $un, $pass, $db);
      if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }

    if (isset($_POST['cid'])) {
     $c_id = $_POST['cid'];
    }
    if(isset($_POST['cname'])){
       $c_name = $_POST['cname'];
    }
    if(isset($_POST['sdate'])){
      $s_date = $_POST['sdate'];
    }
    if(isset($_POST['sitemcode'])){
      $s_itemcode = $_POST['sitemcode'];
    }
    if(isset($_POST['sitemname'])){
      $s_itemname = $_POST['sitemname'];
    }
    if(isset($_POST['squantity'])){
      $s_qyt = $_POST['squantity'];
    }
    if(isset($_POST['sprice'])){
      $s_price = $_POST['sprice'];
    }
    if(isset($_POST['stotal'])){
      $s_total = $_POST['stotal'];
    }
    if(isset($_POST['sgst'])){
      $s_gst = $_POST['sgst'];
    } 
    if(isset($_POST['scgst'])){
      $s_cgst = $_POST['scgst'];
    }
    if(isset($_POST['ssgst'])){
      $s_sgst = $_POST['ssgst'];
    }
    if(isset($_POST['snet'])){
      $s_net = $_POST['snet'];
    }

      $updateOneValue = "update sale_details set cname = '$c_name', sdate='$s_date', item_code='$s_itemcode',
      item_name='$s_itemname', qty='$s_qty', price='$s_price', total='$s_total', gst='$s_gst', cgst='$s_cgst',
      sgst='$p_sgst', net='$net' where cid = $v_id";

      $s = mysqli_query($con, $updateOneValue);

        if($s == true){
            echo '<script> alert("Record updated") </script>';
        }
        else{
            echo '<script> alert("Record not updated") </script>';
        }

       mysqli_close($con);

      return;
    }
    /* ### */

    /* for delete*/
    function del(){
      $sn = "localhost";
      $un = "root";
      $pass = "";
      $db = "imsdb";
      $con = mysqli_connect($sn, $un, $pass, $db);
      if (!$con) {
        die("Connection failed: ".mysqli_connect_error());
      }

    if(isset($_POST['sitemcode'])){
      $s_itemcode = $_POST['sitemcode'];

      $del = "delete from sale_details where item_code= '$s_itemcode'";

      $s = mysqli_query($con, $del);

      if($s){
        echo '<script> alert("Record deleted") </script>';
      }
      else{
        echo '<script> alert("Record not deleted!!!") </script>';
      }
    }

    mysqli_close($con);

      return;
    }
    /* ### */  

    function cls(){
      if(isset($_POST['cid']))
        $v_id = '';
        $v_name = '';
        $v_location = '';
        $v_phone = '';
        $v_email = '';
        $v_district = '';
        $v_state = '';
        $v_pincode = '';

      return;
    }  
?> 