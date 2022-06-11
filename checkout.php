<?php
session_start();

$total = 0;
$a = 0;

if (isset($_POST['email'])) {
	
	$firstName = cleanUserInput($_POST['firstName']);
	$lastName = cleanUserInput($_POST['lastName']);
	$address = cleanUserInput($_POST['address']);
	$city = cleanUserInput($_POST['city']);
	$state = cleanUserInput($_POST['state']);
	$zipcode = cleanUserInput($_POST['zipcode']);
	$email = cleanUserInput($_POST['email']);

	if (isset($_SESSION['shopping_cart'])) {
	foreach ($_SESSION['shopping_cart'] as $key => $product){
		
		$shoppingCart[$a] = array(
		'brand' => $product['brand'],
		'name' => $product['name'],
		'size' => $product['size'],
		'price' => $product['price'],
		'id' => $product['id'],
		'color' => $product['color']
		);
		
		$total += $product['price'];
		$a++;
	}
		destroy();
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Floorish</title>
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/checkout.css" type="text/css" rel="stylesheet">
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
			<a href="cart.php"><button id="checkoutB" >View Your Cart</button></a>
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
	if (isset($_SESSION['shopping_cart'])){	
	?>

	<div id="cartItems">	
	<h1>Your Order Details: </h1>	
	<?php
	foreach($_SESSION['shopping_cart'] as $key => $product)	{
	?>
	<div id="items">	
	<img src="images/<?php echo $product['image'];?>" >
	<div id="itemInfo">
	<?php echo $product['brand'];?> <?php echo $product['name'];?> <br>
	Size: <?php echo $product['size'];?>
	</div>
	<div id="itemPrice">
	$<?php echo $product['price']; ?>
	</div>	
	</div>
	

	<?php														 
	}
	?>
	<div id="finalPrice">	
	<h2 id="subtotal">Subtotal: </h2>
	<p id="total">$<?php echo $total;?></p><br>
	</div>	
	<a href="cart.php"><button id="editB">Edit</button></a>	
	</div>
	
	<div id="orderInfo">

	<h1> Order Information: </h1>
	<form id="form" method="post" action="checkout.php">
	
		<input id="fname" type="text" name="firstName" placeholder="FIRST NAME" autocomplete="off" required>
		<input id="lname" type="text" name="lastName" placeholder="LAST NAME" autocomplete="off" required>
		<input id="address" type="text" name="address" placeholder="SHIPPING ADDRESS" autocomplete="off" required>
		<input id="city" type="text" name="city" placeholder="CITY" autocomplete="off" required>
		<input id="state" type="text" name="state" placeholder="STATE" autocomplete="off" required>
		<input id="zip" type="text" name="zipcode" placeholder="ZIPCODE" autocomplete="off" required>
		<input id="email" type="text" name="email" placeholder="E-MAIL" autocomplete="off" required>
  		<input id="submit" type="submit" value="SUBMIT">
		
	</form>
	
	</div>
	<?php
	}
	else {	
	?>
	<div id="orderConfirmation">
		
	Thank you for your order, <?php echo $firstName;?> <?php echo $lastName;?>. Your order information is below:<br>
	<h3>Shipping Address:</h3>
	<?php echo $address;?><br>
	<?php echo $city;?>, <?php echo $state;?> <?php echo $zipcode;?><br>
	<h3>Email: </h3>
	<?php echo $email;?><br>
	<h3>Items Ordered: </h3>
	<?php 
	  $i = 1;
	  foreach ($shoppingCart as $key => $product){
	?>
	
	<div id="itemsOrdered">
	<?php echo $i;?>. <?php echo $product['brand'];?> <?php echo $product['name'];?> - Size <?php echo $product['size'];?> - $<?php echo $product['price'];?>
	</div>	
	
	<?php
		  $i++;
	  }
	?>	
	<br>	
	Total Price: $<?php echo $total;?>
	</div>
	<?php
	}
	?>	  
<script type="text/javascript" src="js/practice.js"></script>
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