<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		<title>Product Details</title>
		<style>
			body {
				font-family: 'Arial', sans-serif;
				margin: 20px;
				background-color: #f4f4f4;
				text-align: center;
				user-select: none;
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
				height: 880px;
			}

			h1 {
				color: #333;
			}

			p {
				margin-bottom: 10px;
			}

			.product img {
				max-width: auto;
				height: 500px;
				border: 1px solid #ddd;
				border-radius: 25px;
				margin-top: 10px;
				padding: 25px;
				background-color: white;
			}

			form {
				margin-top: 15px;
			}

			label {
				font-weight: bold;
				margin-right: 10px;
			}

			input {
				padding: 5px;
				width: 50px;
			}

			button {
				padding: 7px 12px;
				background-color: #4caf50;
				color: white;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}

			button:hover {
				background-color: #45a049;
			}

			/* Add to Cart button */
			.add-to-cart {
				margin-top: 15px;
			}

			/* Error message */
			.error-message {
				color: #ff0000;
				margin-top: 15px;
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
	
		<?php
			// Assuming you have a database connection
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "security";

			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$productId = isset($_GET['id']) ? $_GET['id'] : null;

			// Check if the product ID is valid
			if ($productId !== null) {
				$sql = "SELECT id, name, brand, price, image FROM products WHERE id = ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("i", $productId);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {
					$product = $result->fetch_assoc();

					// Initialize the quantity in the session or use default value
					session_start();
					$quantity = isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId] : 1;

					// Handle quantity updates
					if (isset($_POST['quantity'])) {
						$quantity = max(1, $_POST['quantity']); // Ensure quantity is at least 1
						$_SESSION['cart'][$productId] = $quantity;
					}

					// Display product details and quantity input
					?>
					<div class="product">
					<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
					<h1><?php echo $product['name']; ?></h1>
					<p><strong>Brand:</strong> <?php echo $product['brand']; ?></p>
					<p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
					<form method="post" action="">
						<label for="quantity">Quantity:</label>
						<input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1" onchange="this.form.submit()">
					</form>

					<form method="post" action="cart.php">
						<input type="hidden" name="product_id" value="<?php echo $productId; ?>">
						<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
						<button type="submit" name="add_to_cart">Add to Cart</button>
					</form>
					</div>
					<?php
				} else {
					// Invalid product ID, display an error message
					echo '<p>Invalid product ID</p>';
				}
			} else {
				// No product ID provided, display an error message
				echo '<p>No product ID provided</p>';
			}

			$conn->close(); // Close the database connection
		?>
	</body>
</html>

