<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IMS Home</title>
	<link rel="stylesheet" type="text/css" href="imsHome.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
	<nav class="nav-bar">
		<img src="./images/inventory.png" class="ims-logo" style="width: 80px; height: 80px;">
		<ul id="menu_links">
			<li><a href="#homePage">Home</a></li>
			<li><a href="#aboutPage">About</a></li>
			<li><a href="#pricePage">Pricing</a></li>
		</ul>
		<a href="login.php" class="login-btn">SIGN UP NOW</a>
		<i class="fa-solid fa-bars-staggered menu-close" onclick="toggleMenu();"></i>
	</nav>
	<section class="bg-container" id="homePage">
		<div class="bg-aboveText">
			<h1 class="gra-text">Inventory Management System Software for Small Scale Business.</h1>
			<p class="gra-text">Managing your Business trouble-less with IMS software.</p>
		</div>
	</section>
	<p id="aboutPage"></p>
	<div class="about-con" id="">
		<div class="about-card">
			<div class="about-text">
				<h5>This IMS as Inventory Management System Billing software designed to help track, manage and organize 
				inventory levels, orders, sales,It ensures that the right amount of stock is maintained to meet customer demands without overstocking or understocking</h5>
			</div>
			<div class="about-img">
				<img src="images\imsScrsht.png" >
			</div>
		</div>
	</div>
	<div class="price-con" id="pricePage">
		<div class="price-container">
			<h1 class="price-centerText">Affroadable Pricing.</h1>
		</div>
		<div class="price-card">
			<div class="price_stand"><h1>Standard</h1></div>
			<hr>
			<div class="price-cost"><h1>&#x20B9 9,999</h1><br>
				<h4>per organization/year</h4>
			</div>
			<div class="price-feature">
				<p>1000 orders/month</p>
				<p>5 users</p>
			</div>
			<div class="pricing-btn">
				<input class="priceUpgrade-btn" type="button" name="p-upgrade-btn" value="Purchase Your Plan">
			</div>
		</div>
	</div>
	<hr>
	<footer class="footer">
		<div class="social-media-links">
			<i class="fa-brands fa-facebook"></i>
			<i class="fa-brands fa-instagram"></i>
			<i class="fa-brands fa-youtube"></i>
		</div>
		<div class="copyrights">
			<p><i class="fa-solid fa-copyright"></i> 2025 IMS Software. All Rights Reserved.</p>
		</div>
	</footer>

<script>
	let menulinks = document.getElementById('menu_links');
	function toggleMenu(){
		menulinks.classList.toggle('showMenu');
	}
</script>

</body>
</html>