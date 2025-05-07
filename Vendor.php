<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vendor Page</title>
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
    <p class="nav_tab_heading">Vendor Details</p>
  </div>
</nav>
<!-- tab1 -->

<div class="tab-content " id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
<form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Vendor_ID</label>
    <input type="text" class="form-control" id="validationCustom02" name="vid" required>
    <div class="invalid-feedback">
      Please enter valid vendor id.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Vendor Name</label>
    <input type="text" class="form-control" id="validationCustom02" name="vname" required>
    <div class="invalid-feedback">
      Please enter valid vendor name.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Location</label>
    <input type="text" class="form-control" id="validationCustom02" name="vlocation" required>
    <div class="invalid-feedback">
      Please enter valid location.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Phone</label>
    <input type="text" class="form-control" id="validationCustom02" name="vphoneno" required>
    <div class="invalid-feedback">
      Please enter valid phone no.
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Email ID</label>
    <input type="text" class="form-control email_ipbox" id="validationCustom02" aria-describedby="inputGroupPrepend" name="vemail" required>
    <div class="invalid-feedback">
      Please enter valid Email id.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">District</label>
    <input type="text" class="form-control" id="validationCustom03" name="vdistrict" required>
    <div class="invalid-feedback">
      Please provide a valid district.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" name="vstate" required>
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
    <input type="text" class="form-control" id="validationCustom05" name="vpincode" required>
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
        die("Connection failed: " .mysqli_connect_error());
      }

    if (isset($_POST['vid'])) {
     $v_id = $_POST['vid'];
    }
    if(isset($_POST['vname'])){
       $v_name = $_POST['vname'];
    }
    if(isset($_POST['vlocation'])){
      $v_location = $_POST['vlocation'];
    }
    if(isset($_POST['vphoneno'])){
      $v_phone = $_POST['vphoneno'];
    }
    if(isset($_POST['vemail'])){
      $v_email = $_POST['vemail'];
    }
    if(isset($_POST['vdistrict'])){
      $v_district = $_POST['vdistrict'];
    }
    if(isset($_POST['vstate'])){
      $v_state = $_POST['vstate'];
    }
    if(isset($_POST['vpincode'])){
      $v_pincode = $_POST['vpincode'];
    }

      $insertAllValues = "insert into vendor_details values('$v_id','$v_name','$v_location','$v_district','$v_state','$v_pincode','$v_phone','$v_email')";

      $res = mysqli_query($con, $insertAllValues);

      if($res == true){
            echo '<script> alert("Record added") </script>';
            // header("Location:payrollcalc.php");
            // if($res){
            //   cls();
            // }
        }
        else{
            echo "Record Not Inserted";
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
    if(isset($_POST['vlocation'])){
      $v_location = $_POST['vlocation'];
    }
    if(isset($_POST['vphoneno'])){
      $v_phone = $_POST['vphoneno'];
    }
    if(isset($_POST['vemail'])){
      $v_email = $_POST['vemail'];
    }
    if(isset($_POST['vdistrict'])){
      $v_district = $_POST['vdistrict'];
    }
    if(isset($_POST['vstate'])){
      $v_state = $_POST['vstate'];
    }
    if(isset($_POST['vpincode'])){
      $v_pincode = $_POST['vpincode'];
    }

      $updateOneValue = "update vendor_details set cname = '$v_name', location='$v_location', district='$v_district',
      state='$v_state', pincode='$v_pincode', phone='$v_phone', email='$v_email' where cid = $v_id";

      

      $s = mysqli_query($con, $updateOneValue);

        if($s == true){
            echo '<script> alert("Record updated") </script>';
            if($s){
              cls();
            }
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

      $del = "delete from vendor_details where cid=".$v_id;

      $s = mysqli_query($con, $del);

      if($s){
        echo '<script> alert("Record deleted") </script>';
        if($s){
          cls();
        }
      }
      else{
        echo '<script> alert("Record not deleted!!!") </script>';
      }
    }
    else {
        echo '<script>alert("Customer ID not provided!")</script>';
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