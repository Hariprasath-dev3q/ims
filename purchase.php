<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Purchase Page</title>
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
  <div class="nav nav-tabs " id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Add</button>
    <p class="nav_tab_heading">Purchase Details</p>
  </div>
</nav>
<!-- tab1 -->

<div class="tab-content custom-tab-masterfile" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<form class="row g-3" method="post" name="frm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" novalidate>
    <div class="col-md-4">
        <label class="form-label">Vendor ID</label>
        <input type="text" class="form-control" value="" name="vid" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Vendor Name</label>
        <input type="text" class="form-control" value="" name="vname" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Purchase Date</label>
        <input type="date" class="form-control" value="" name="vdate">
    </div>
  <div class="col-md-4">
    <label class="form-label">Item Code</label>
    <input type="text" class="form-control" name="itemcode" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control" name="itemname" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Quantity</label>
    <input type="number" class="form-control" name="quantity" id="purchase_qty" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Price</label>
    <input type="number" class="form-control" name="price" id="purchase_price" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Total</label>
    <input type="number" class="form-control" name="total" placeholder= &#8377 disabled>
  </div>

  <div class="col-md-4">
    <label class="form-label">GST</label>
    <input type="number" class="form-control" name="gst" id="purchase_gst" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">CGST</label>
    <input type="number" class="form-control" name="cgst" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">SGST</label>
    <input type="number" class="form-control" name="sgst" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Net</label>
    <input type="number" class="form-control" name="net" placeholder= &#8377; disabled>
  </div>

  <!-- buttons -->
  <!-- <div class="d-flex gap-2"> -->
    <button class="btn btn-primary" type="button" id="calc-btn" name="calcbtn" onclick="purchaseCalc();">Calc</button>
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

    if (isset($_POST['vid'])) {
     $v_id = $_POST['vid'];
    }
    if(isset($_POST['vname'])){
       $v_name = $_POST['vname'];
    }
    if(isset($_POST['vdate'])){
      $p_date = $_POST['vdate'];
    }
    if(isset($_POST['itemcode'])){
      $p_itemcode = $_POST['itemcode'];
    }
    if(isset($_POST['itemname'])){
      $p_itemname = $_POST['itemname'];
    }
    if(isset($_POST['quantity'])){
      $p_qty = $_POST['quantity'];
    }
    if(isset($_POST['price'])){
      $p_price = $_POST['price'];
    }
    if(isset($_POST['gst'])){
      $p_gst = $_POST['gst'];
    }
    if(isset($_POST['cgst'])){
      $p_cgst = $_POST['cgst'];
    }
    if(isset($_POST['sgst'])){
      $p_sgst = $_POST['sgst'];
    }
    $p_total = $p_price/$p_qty;
    $p_gst = $p_price*$p_gst/100;
    $p_net = $p_price+$p_gst;
    // if(isset($_POST['net'])){
    //   $p_net = 
    // }

      $insertAllValues = "insert into purchase_details values('$v_id','$v_name','$p_date','$p_itemcode','$p_itemname',
      '$p_qty', '$p_price','$p_total','$p_gst','$p_cgst','$p_sgst','$p_net')";

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

    if (isset($_POST['vid'])) {
     $v_id = $_POST['vid'];
    }
    if(isset($_POST['vname'])){
       $v_name = $_POST['vname'];
    }
    if(isset($_POST['vdate'])){
      $p_date = $_POST['vdate'];
    }
    if(isset($_POST['itemcode'])){
      $p_itemcode = $_POST['itemcode'];
    }
    if(isset($_POST['itemname'])){
      $p_itemname = $_POST['itemname'];
    }
    if(isset($_POST['quantity'])){
      $p_qyt = $_POST['quantity'];
    }
    if(isset($_POST['price'])){
      $p_price = $_POST['price'];
    }
    if(isset($_POST['total'])){
      $p_total = $_POST['total'];
    }
    if(isset($_POST['gst'])){
      $p_gst = $_POST['gst'];
    }
    if(isset($_POST['cgst'])){
      $p_cgst = $_POST['cgst'];
    }
    if(isset($_POST['sgst'])){
      $p_sgst = $_POST['sgst'];
    }
    if(isset($_POST['net'])){
      $p_net = $_POST['net'];
    }

      $updateOneValue = "update purchase_details set vname = '$v_name', pdate='$p_date', item_code='$p_itemcode',
      item_name='$p_itemname', qty='$p_qty', price='$p_price', total='$p_total', gst='$p_gst', cgst='$p_cgst',
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

    if(isset($_POST['itemcode'])){
      $p_itemcode = mysqli_real_escape_string($con, $_POST['itemcode']);

      $del = "delete from purchase_details where item_code= '$p_itemcode'";

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