<?php
session_start();

$total = 0;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Floorish</title>
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/about.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Damion|Girassol|Bowlby+One+SC|Rajdhani|Bebas+Neue&display=swap" rel="stylesheet">	
</head>

<body>
	
	<div id="topnav">
  		
		<div id="MenuB"><a href="#" id="navMenu"><img src="images/MenuButton.jpg"></a></div>

		<div id="logo"><a href="index.php"><img src="images/Alternate_Logo.jpg"></a></div>
		
    	<div id="CartB"><a href="#" id="shoppingCart"><img src="images/ShoppingCart.jpg"></a></div>
		
	</div>
	
	<div id="sidenav">
		
		<a href="#" id="menuClosebtn">&times;</a>
		<a href="index.php">Home</a>
		<a href="about.php">About</a>
		<a href="contact.php">Contact</a>

	</div>
	
	<div id="cart">
		
		<a href="#" id="cartClosebtn">&times;</a>
		<h1>Your Cart</h1>
		<?php
		if (isset($_SESSION['shopping_cart'])){
			foreach($_SESSION['shopping_cart'] as $cart => $item){
		?>
				<div id="miniCartItems">
				<img src="images/<?php echo $item['image'];?>" >
				<div id="miniItemInfo">
				<?php echo $item['brand'];?> <?php echo $item['name'];?> <br>
				Size: <?php echo $item['size'];?>
				</div>
				<div id="miniItemPrice">
				$<?php echo $item['price']; ?>
				</div>	
				</div>
		<?php
			$total += $item['price'];
			}
		}
		if ($total > 0){
		?>	
			<a href="cart.php"><button id="checkoutB" >View Cart</button></a>
		<?php
		}
		else {
		?>
		<p>Your cart is empty</p>
		<?php
		}
		?>

	</div>
	
	<div id="about">
	
		<h1 id="aboutUs"> ABOUT US </h1>
		<p> This store is a personal collection of my shoes that I have decided to part ways
			with. You will find products from the leading footwear brands, including Nike,
			Adidas, New Balance, and Jordan. The items on this site are not for sale. 
			The main purpose of this store is to serve as a platform to showcase my ability as a Web Designer.
			I used HTML and CSS to display the contents of my site. Javscript was used to build 
			the side navigation menu, shopping cart modal, and lighthouse gallery on the product page. 
			On the back end I utilized PHP for form processing, order processing, and session tracking. 
			I used MySQL tables to store product data.  <br>
			<br>
			<br>
			-Vincent Salter
		
		</p>
		
	</div>	
	


<script src="js/practice.js" type="text/javascript"></script>
</body>
</html>