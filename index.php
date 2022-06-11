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

		require_once 'login.php';
		
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);

		$query = "SELECT * FROM products";
		$result = $conn->query($query);
		if (!$result) die($conn->error);

		$rows = $result->num_rows;

		for ($j = 0; $j < $rows; ++$j){
	
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		
		?>	

	
	
		
	<div class="shoes">
			
		<img src="images/<?php echo $row['image']; ?>">
				
		<p class="caption"><?php echo $row['brand'];?> <?php echo $row['name']; ?> - $<?php echo $row['price']; ?></p>
	
	
	<form method="post" action="product.php">
	<input type="hidden" name="brand" value="<?php echo $row['brand']; ?>">
	<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
	<input type="hidden" name="price" value="<?php echo $row['price']; ?>">	
	<input type="hidden" name="size" value="<?php echo $row['size']; ?>">
	<input type="hidden" name="color" value="<?php echo $row['color']; ?>">	
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<input type="hidden" name="image" value="<?php echo $row['image']; ?>">	
	<input type="hidden" name="image2" value="<?php echo $row['image2']; ?>">
	<input type="hidden" name="image3" value="<?php echo $row['image3']; ?>">
	<input type="hidden" name="image4" value="<?php echo $row['image4']; ?>">
	<input type="hidden" name="image5" value="<?php echo $row['image5']; ?>">
	<input type="hidden" name="image6" value="<?php echo $row['image6']; ?>">
	<input id="viewProduct" type="submit" value="View Product">	
	
	</form>
	
	</div>	
	
	<?php
		
	}
	
	?>
		
	
	
<script type="text/javascript" src="js/practice.js"></script>	
</body>
</html>