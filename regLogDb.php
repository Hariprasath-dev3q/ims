<?php

$sn = "localhost";
$un = "root";
$pwd = "";
$db = "imsdb";

$con = mysqli_connect($sn, $un, $pwd, $db);

$user_name = $_POST['textBox'];
$user_email = $_POST['emailBox'];
$user_pass = $_POST['passwordBox'];

if(!$con){
	die("Connection Error".mysqli_connect_error());
}
else{
	$sql = "insert into reguser values('$user_name', '$user_email', '$user_pass')";

	$s = mysqli_query($con, $sql);

	if($s == true){
		// echo "<script>alert('Inserted Successfully');</script>";
		header("location:register.php");
	}	
	else
		echo $s."<h1>User details is not added...</h1>";
}
?>