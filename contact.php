<?php
session_start();

$total = 0;

if (isset($_POST['message'])){
	
	$name = cleanUserInput($_POST['name']);
	$email = cleanUserInput($_POST['email']);
	$message = cleanUserInput($_POST['message']);
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Floorish</title>
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/Form.css" type="text/css" rel="stylesheet">
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
	
	<?php
	if (isset($_POST['message'])){	
	?>	
	<div id="emailSent">
	Thank you for contacting us, <?php echo $name;?>. <br><br>
	A reply will be sent to <?php echo $email;?>. Please allow 2-3 business days.	
	</div>
	<?php	
	}
	else {
	?>
	<form id="form" method="post" action="contact.php">
	
		<input id="name" type="text" name="name" placeholder="NAME" required>
		<input id="email" type="text" name="email" placeholder="E-MAIL" required>
		
		<textarea id="message" type="text" name="message" placeholder="Talk to us..." required></textarea>
  		<input id="submit" type="submit" value="S U B M I T">
		
	</form>
	<?php
	}
	?>
	
	
<script src="js/practice.js" type="text/javascript"></script>	
</body>
</html>


<?php 

function cleanUserInput($a) {
	
	$a = stripslashes($a);
	$a = strip_tags($a);
	$a = htmlentities($a);
	
	return $a;
	
}

function destroy() {
	
	$_SESSION = array();
	session_destroy();
	
}

?>