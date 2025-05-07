<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		body{
/*			background-image: url('bg.jpg');*/
		}
	</style>
</head>
<body>
	<form method="post" action="regLogDb.php" class="frm" onsubmit="return validate()">
		<h1 class="rh1">Create an Account</h1>
		<p>Welcome to IMS Enter your details</p>
		<input type="text" name="textBox" placeholder="Username" id="un-box"><span id="er1" class="er"></span>
		<input type="email" name="emailBox" placeholder="Enter your email" id="email-box"><span id="er2" class="er"></span>
		<input type="password" name="passwordBox" placeholder="Enter your password" class="ipbox" id="ip-box">
		<i class="fa-solid fa-eye " id="eye-btn"></i><span id="er3" class="er"></span>
		<input type="submit" name="sub" value="Create account" class="subbtn">
		<p>Alread have an account?<a href="login.php">Log in</a></p>
	</form>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>