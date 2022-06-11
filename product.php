<?php
session_start();

$brand = $_POST["brand"];
$name = $_POST["name"];
$size = $_POST["size"];
$color = $_POST["color"];
$price = $_POST["price"];
$id = $_POST["id"];
$image = $_POST["image"];
$image2 = $_POST["image2"];
$image3 = $_POST["image3"];
$image4 = $_POST["image4"];
$image5 = $_POST["image5"];
$image6 = $_POST["image6"];
$total = 0;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Floorish</title>
<link href="css/menu.css" type="text/css" rel="stylesheet">	
<link href="css/product.css" type="text/css" rel="stylesheet">
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

<div class="container">


  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
      <img src="images/<?php echo $image; ?>">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
      <img src="images/<?php echo $image2; ?>">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
      <img src="images/<?php echo $image3; ?>">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
      <img src="images/<?php echo $image4; ?>">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
      <img src="images/<?php echo $image5; ?>">
  </div>

  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
      <img src="images/<?php echo $image6; ?>">
  </div>

  
  <a id="prev">&#10094;</a>
  <a id="next">&#10095;</a>

 
  <div class="row">
    <div class="column">
      <img id="slide1" class="demo" src="images/<?php echo $image; ?>" alt="image1">
    </div>
    <div class="column">
      <img id="slide2" class="demo" src="images/<?php echo $image2; ?>" alt="image2">
    </div>
    <div class="column">
      <img id="slide3" class="demo" src="images/<?php echo $image3; ?>"alt="image3">
    </div>
    <div class="column">
      <img id="slide4" class="demo" src="images/<?php echo $image4; ?>" alt="image4">
    </div>
    <div class="column">
      <img id="slide5" class="demo" src="images/<?php echo $image5; ?>" alt="image5">
    </div>
    <div class="column">
      <img id="slide6" class="demo" src="images/<?php echo $image6; ?>" alt="image6">
    </div>
  </div>
</div>
	
	<div id="productDetails">

	<div id="descr1">
	<p id="productName"><?php echo $brand; ?> <?php echo $name; ?></p>
	<p id="price">$<?php echo $price; ?></p>	
	<p id="productColor"><?php echo $color; ?></p>
	</div>
	<div id="descr2">	
	<p id="productSize">Size: <?php echo $size; ?></p> <br>
	<p class="bullets">- 100% Authentic</p>
	<p class="bullets">- Never Worn</p>
	<p class="bullets">- Original Boxing</p><br>	
	</div>
	<div id="addToCart">	
	<form method="post" action="cart.php">
	<input type="hidden" name="brand" value="<?php echo $brand; ?>">
	<input type="hidden" name="name" value="<?php echo $name; ?>">
	<input type="hidden" name="price" value="<?php echo $price; ?>">	
	<input type="hidden" name="size" value="<?php echo $size; ?>">
	<input type="hidden" name="color" value="<?php echo $color; ?>">	
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="hidden" name="image" value="<?php echo $image; ?>">	
	<input type="hidden" name="add" value="yes">	
	<input id="submit" type="submit" value="Add to Cart"/>
	</form>
	</div>
		
	</div>
	
	
<script type="text/javascript" src="js/practice.js"></script>
<script type="text/javascript" src="js/products.js"></script>	
</body>
</html>