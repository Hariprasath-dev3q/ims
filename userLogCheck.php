<?php

$u_name = $_POST['textBox'];
$u_pass = $_POST['passwordBox'];

$sn = "localhost";
$un = "root";
$pw = "";
$db = "imsdb";

$con = mysqli_connect($sn,$un,$pw,$db);
session_start();
if(!$con){
	die("Connection error".mysqli_connect_error());
}

$sql = "select username, user_pass from reguser";

$result = mysqli_query($con, $sql);

$err="";

if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		if($row['username'] == $u_name && $row['user_pass'] == $u_pass){
			$_SESSION['username']= $u_name;
			header("location:demodash.php");
			break;
		}
		if($row['username'] != $u_name && $row['user_pass'] != $u_pass){
			header("location:login.php");
		}
	}
}

?>
