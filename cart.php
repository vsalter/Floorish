<?php
session_start();

$count = 0;
$add = "true";

if(isset($_SESSION['shopping_cart'])){
	if (isset($_POST['add'])){
	$count = count($_SESSION['shopping_cart']);
	
	for($i = 0; $i < $count; $i++){
		if($_SESSION['shopping_cart'][$i]['id'] == $_POST['id']){
			$add = "false";
		}
	}
	
	
	if ($add === "true"){
	$_SESSION['shopping_cart'][$count] = array (
	
		'brand' => $_POST['brand'],
		'name' => $_POST['name'],
		'size' => $_POST['size'],
		'color' => $_POST['color'],
		'price' => $_POST['price'],
		'id' => $_POST['id'],
		'image' => $_POST['image'],
	);
	
	}
	}
}
else {
	if (isset($_POST['add'])){
	$_SESSION['shopping_cart'][0] = array(
	
		'brand' => $_POST['brand'],
		'name' => $_POST['name'],
		'size' => $_POST['size'],
		'color' => $_POST['color'],
		'price' => $_POST['price'],
		'id' => $_POST['id'],
		'image' => $_POST['image'],
	);
	}
}
if (isset($_POST['delete'])){
	foreach ($_SESSION['shopping_cart'] as $a => $b){
		if($b['id'] === $_POST['id']){
			unset($_SESSION['shopping_cart'][$a]);
		}
	}
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

$total = 0;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Floorish</title>
<link href="css/menu.css" type="text/css" rel="stylesheet">
<link href="css/cart.css" type="text/css" rel="stylesheet">
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
	
	<div id="added">
	<?php

	if (isset($_POST['add'])){	
	if ($add === 'false'){
	?>
		<p class="cartCheck">Item is already in your cart!</p>
	<?php	
	}	
	else {
	?>	
		<p class="cartCheck">Item has been added to your cart!</p>
	<?php	
	}
	}
	?>
	
	<h1>Items in your Cart: </h1><br>
	</div>	
	<?php
	if (isset($_SESSION['shopping_cart'])){	
		foreach($_SESSION['shopping_cart'] as $key => $product)	{
	?>
	
	<div id="cartItems">
	<img src="images/<?php echo $product['image'];?>" >
	
	<div id="itemInfo">
	
		<?php echo $product['brand'];?> <?php echo $product['name'];?> <br>
		Size: <?php echo $product['size'];?>
	</div>
	<div id="itemPrice">
	$<?php echo $product['price']; ?>
	<div id="delete">
	<form method="post" action="cart.php">
	<input type="hidden" name="id" value="<?php echo $product['id'];?>">
	<input type="hidden" name="delete" value="yes">
	<input id="remove" type="submit" value="Remove">
	</form>
	</div>
	</div>	
	</div>

	<?php														 
	}
	}
	if ($total < 1){
	?>		
	<p id="noItemsInCart">There are no items in your cart. </p>
	
	<?php	
	}	
	?>

	<div id="subtotal">
	<h2>Subtotal: </h2> <p id="totalPrice">$<?php echo $total;?></p><br>
	</div>
	<div id="cartButtons">
	<a href="index.php"><button>Continue Shopping</button></a>
	<?php
	if ($total > 0){
	?>
	<a href="checkout.php"><button>Checkout</button></a>
	<?php
	}
	?>
	</div>
	
<script type="text/javascript" src="js/practice.js"></script>
</body>
</html>