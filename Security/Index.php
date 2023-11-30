<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		<title>Smartphone Sales</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 20px;
				background-color: #F2F3F4;
				overflow-x: hidden;
				user-select: none;
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
			}
			
			h2 {
				text-align: left;
				position: relative;
				padding-top: 50px;
				left: 80px;
			}

			.product {
				padding: 10px;
				margin: 10px;
				float: left;
				position: relative;
				left: 75px;
				width: 300px;
				background-color: white;
				border-radius: 15px;
				height: 435px;
			}
			
			.product h3 {
				text-align: left;
				position: relative;
				left: 20px;
			}

			.product img {
				width: 300px;
				height: 300px;
				object-fit: cover;
				margin-bottom: 10px;
			}
			
			.product p {
				font-size: 16px;
				text-align: left;
				position: relative;
				left: 20px;
			}
			
			.product button {
				background-color: #0096c7;
				border-radius: 25px;
				border: none;
				padding: 10px 15px;
				color: white;
				float: right;
				font-size: 16px;
				position: relative;
				bottom: 45px;
				right: 20px;
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

		<h2>The Latest Smartphones In The Market!</h2>

		<?php
		if ($_SERVER['HTTPS'] != 'on') {
			header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			exit;
		}

		// Database connection details
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

		// Query to retrieve the first 10 rows from the database
		$sql = "SELECT id, name, brand, price, image FROM products LIMIT 10";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Output data from each row
			while ($row = $result->fetch_assoc()) {
				echo '<div class="product">';
				echo '<h3>' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</h3>';
				echo '<img src="' . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '">';
				echo '<p>From RM' . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . '</p>';
				echo '<button class="button" onclick="redirectToProductDetails(\'' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '\')">Buy</button>';
				echo '</div>';
			}
		} else {
			echo "0 results";
		}

		// Close the database connection
		$conn->close();
		?>
	</body>

	<script>
		function redirectToIndex() {
			window.location.href = "Index.php";
		}
	</script>

	<script>
		function redirectToProductDetails(productId) {
			// You can modify this line to include additional parameters or customize the redirection logic.
			window.location.href = 'Product_Details.php?id=' + productId;
		}
	</script>
</html>

