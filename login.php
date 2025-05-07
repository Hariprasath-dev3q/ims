
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<form method="post" action="userLogCheck.php" class="frm">
		<h1>Log In</h1>
		<p>Hi Welcome back!</p>
		<input type="text" name="textBox" placeholder="Username" required>
		<input type="password" name="passwordBox" placeholder="Enter your password" class="ipbox" id="ip-box" required>
		<i class="fa-solid fa-eye " id="eye-btn"></i>
		<input type="submit" name="sub" value="Submit" class="subbtn">
		<p>Don't have an account?<a href="register.php">Signup</a></p>
	</form>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>