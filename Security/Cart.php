<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
session_start();

// Initialize the cart in the session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding product to the cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Add product and quantity to the cart in the session
    $_SESSION['cart'][$productId] = $quantity;
}

// Check if a product ID is sent through POST (for removing items from the cart)
if (isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id'];

    // Remove the product from the cart
    unset($_SESSION['cart'][$remove_product_id]);
}

// Fetch product data from the database
$sql = "SELECT id, name, brand, price, image FROM products";
$result = $conn->query($sql);

// Store product data in an associative array for easy access
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[$row['id']] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<title>Shopping Cart</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin-top: 20px;
			background-color: #F2F3F4;
			user-select: none;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		
		h2 {
			text-align: center;
			padding-top: 50px;
		}
		
		.cart-container {
			text-align: center;
			height: 1075px;
		}

		.cart-item {
			display: inline-block;
			padding: 10px;
			margin: 10px;
			text-align: center;
			background-color: white;
			border-radius: 25px;
		}
		
		img {
			width: 250px;
			height: 250px;
			object-fit: cover;
		}
		
		.remove-button {
			background-color: #ff0000;
			color: #ffffff;
			padding: 5px;
			cursor: pointer;
			border: none;
			border-radius: 25px;
			padding: 5px 15px;
		}
		
		a.continue-shopping {
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			text-align: center;
			text-decoration: none;
			font-size: 16px;
			border-radius: 5px;
			position: relative;
			left: 1650px;
		}

		a.continue-shopping:hover {
			background-color: #45a049;
		}
		
		.summary {
			background-color: white;
			border: 1px solid #000;
			position: fixed;
			bottom: 0px;
			text-align: center;
			right: -2px;
			width: 100%;
			padding-bottom: 40px;
		}

		.checkout-button {
			background-color: #0096c7;
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			font-size: 16px;
			border-radius: 25px;
			cursor: pointer;
			position: relative;
			top: 8px;
		}

		.checkout-button:hover {
			background-color: #0056b3;
		}
		
		header {
			background-color: #F2F3F4;
			text-align: center;
		}

		nav {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		nav a {
			color: black;
			text-decoration: none;
			padding: 10px 20px;
			margin: 0 10px;
			font-size: 16px;
		}

		nav a:hover {
			border-bottom: 2px solid #fff;
		}

		.logo {
			max-width: 52px;
			height: auto;
			margin: 0 10px;
		}
		
		nav i {
			color: black;
			text-decoration: none;
			padding: 0px 1px;
			margin: 0 10px;
			font-size: 16px;
		}
	</style>
	
	<script>
		document.addEventListener('contextmenu', function (e) {
			e.preventDefault();
		});
	</script>
</head>

<body>
    <header>
		<nav>
			<img src="Logo.png" alt="Logo" class="logo" style="cursor: pointer;" onclick="redirectToIndex()">
			<a href="Index.php">Smartphones</a>
			<a href="Accessories.php">Accessories</a>
			<a href="Support.php">Support</a>
			<a href="Cart.php"><i class="fas fa-shopping-cart" style="color: #000000;"></i></a>
			<a href="Signup.php"><i class="fa-solid fa-user" style="color: #000000;"></i></a>
		</nav>
	</header>

	<h2>Shopping Cart</h2>

    <div class="cart-container">
        <?php
        $totalPrice = 0;
        $selectedProducts = [];

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $product = $products[$productId];
                $totalPrice += $product['price'] * $quantity;

                echo '<div class="cart-item">';
                echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p>Price: $' . $product['price'] . '</p>';
                echo '<p>Quantity: ' . $quantity . '</p>';
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="remove_product_id" value="' . $productId . '">';
                echo '<input type="submit" class="remove-button" value="Remove">';
                echo '</form>';
                echo '</div>';

                // Store selected product names
                $selectedProducts[] = ($quantity > 1) ? $product['name'] . ' x ' . $quantity : $product['name'];
            }
        } else {
            echo '<p>Your shopping cart is empty.</p>';
        }
        ?>
    </div>

    <div class="summary">
        <h3>Total Price: $<?php echo number_format($totalPrice, 2); ?></h3>
        <h3>Selected Products: <?php echo implode(', ', $selectedProducts); ?></h3>
        <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
    </div>
</body>
</html>

