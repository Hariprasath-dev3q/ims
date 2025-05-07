<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Page</title>
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
    <p class="nav_tab_heading">Customer Details</p>
  </div>
</nav>
</div>
<!-- tab1 -->
<div class="tab-content custom-tab-masterfile animate-bottom"  id="nav-tabContent" >
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<form class="row g-3 custom-row" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Customer_ID</label>
    <input type="text" class="form-control" id="validationCustom02" name="cid" required>
    <div class="invalid-feedback">
      Please enter valid customer id.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Customer Name</label>
    <input type="text" class="form-control" id="validationCustom02" name="cname" required>
    <div class="invalid-feedback">
      Please enter valid customer name.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Location</label>
    <input type="text" class="form-control" id="validationCustom02" name="clocation" required>
    <div class="invalid-feedback">
      Please enter valid location.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Phone</label>
    <input type="text" class="form-control" id="validationCustom02" name="cphoneno" required>
    <div class="invalid-feedback">
      Please enter valid phone no.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Email ID</label>
    <input type="text" class="form-control email_ipbox" id="validationCustom02" aria-describedby="inputGroupPrepend" name="cemail"  required>
    <div class="invalid-feedback">
      Please enter valid Email id.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">District</label>
    <input type="text" class="form-control" id="validationCustom03" name="cdistrict"  required>
    <div class="invalid-feedback">
      Please provide a valid district.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" name="cstate"  required>
      <option selected disabled value="">Choose...</option>
      <option>Andhra Pradesh</option>
      <option>Arunachal Pradesh</option>
      <option>Assam</option>
      <option>Bihar</option>
      <option>Chhattisgarh</option>
      <option>Goa</option>
      <option>Gujarat</option>
      <option>Haryana</option>
      <option>Himachal Pradesh</option>
      <option>Jharkhand,Jharkhand</option>
      <option>Karnataka</option>
      <option>Kerala</option>
      <option>Madhya Pradesh</option>
      <option>Maharashtra</option>
      <option>Manipur</option>
      <option>Meghalaya</option>
      <option>Mizoram</option>
      <option>Odisha</option>
      <option>Punjab</option>
      <option>Rajasthan</option>
      <option>Sikkim</option>
      <option>Tamil Nadu</option>
      <option>Telangana</option>
      <option>Tripura</option>
      <option>Uttar Pradesh</option>
      <option>Uttarakhand</option>
      <option>West Bengal</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Pincode</label>
    <input type="text" class="form-control" id="validationCustom05" name="cpincode"  required>
    <div class="invalid-feedback">
      Please provide a valid pincode.
    </div>
  </div>
  <!-- <div class="col-12 c_btn"> -->
    <button class="btn btn-primary" type="submit" name="subbtn">Add</button>
  <!-- </div> -->
  <!-- <div class="col-12 c_btn"> -->
    <button class="btn btn-warning" type="submit" name="modbtn">Modify</button>
  <!-- </div> -->
  <!-- <div class="col-12 c_btn"> -->
    <button class="btn btn-danger" type="submit" name="delbtn">Delete</button>
    <button class="btn btn-info" type="reset" name="clrbtn">Clear</button>

  <!-- </div> -->
</form>
</div>

  
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="dash_boardprg.js"></script>
</body>
</html>

<?php 
  if(isset($_POST['subbtn'])){
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
        die("Connection failed: " . mysqli_connect_error());
      }

    if (isset($_POST['cid'])) {
     $c_id = $_POST['cid'];
    }
    if(isset($_POST['cname'])){
       $c_name = $_POST['cname'];
    }
    if(isset($_POST['clocation'])){
      $c_location = $_POST['clocation'];
    }
    if(isset($_POST['cphoneno'])){
      $c_phone = $_POST['cphoneno'];
    }
    if(isset($_POST['cemail'])){
      $c_email = $_POST['cemail'];
    }
    if(isset($_POST['cdistrict'])){
      $c_district = $_POST['cdistrict'];
    }
    if(isset($_POST['cstate'])){
      $c_state = $_POST['cstate'];
    }
    if(isset($_POST['cpincode'])){
      $c_pincode = $_POST['cpincode'];
    } 

      $insertAllValues = "insert into customer_details values('$c_id','$c_name','$c_location','$c_district','$c_state','$c_pincode','$c_phone','$c_email')";

      $res = mysqli_query($con, $insertAllValues);

      if($res == true){
            echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Record Added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            // header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Record not Added.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
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
    if(isset($_POST['clocation'])){
      $c_location = $_POST['clocation'];
    }
    if(isset($_POST['cphoneno'])){
      $c_phone = $_POST['cphoneno'];
    }
    if(isset($_POST['cemail'])){
      $c_email = $_POST['cemail'];
    }
    if(isset($_POST['cdistrict'])){
      $c_district = $_POST['cdistrict'];
    }
    if(isset($_POST['cstate'])){
      $c_state = $_POST['cstate'];
    }
    if(isset($_POST['cpincode'])){
      $c_pincode = $_POST['cpincode'];
    }

      $updateOneValue = "update customer_details set cname = '$c_name', location='$c_location', district='$c_district',
      state='$c_state', pincode='$c_pincode', phone='$c_phone', email='$c_email' where cid = $c_id";

      

      $s = mysqli_query($con, $updateOneValue);

        if($s == true){
            echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Record Updated.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
            echo mysqli_connect_error();
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

    if(isset($_POST['cid'])){
      $c_id = mysqli_real_escape_string($con, $_POST['cid']);

      $del = "delete from customer_details where cid=".$c_id;

      $s = mysqli_query($con, $del);

      if($s){
        echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Record Deleted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }
      else{
        echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Record not Deleted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }
    }
    else {
         echo '<div class="alert alert-warning alert-dismissible fade show custom-alert" role="alert">
                  Customer ID not provided!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    mysqli_close($con);

      return;
    }
    /* ### */  

    function cls(){
      if(isset($_POST['cid']))
        $c_id = '';
        $c_name = '';
        $c_location = '';
        $c_phone = '';
        $c_email = '';
        $c_district = '';
        $c_state = '';
        $c_pincode = '';

      return;
    }  
?>  