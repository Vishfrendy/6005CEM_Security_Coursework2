<?php
	// Database configuration
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

	// Handle form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Retrieve form data
		$name = $_POST["name"];
		$email = $_POST["email"];
		$message = $_POST["message"];

		// Insert data into the database
		$sql = "INSERT INTO customer_support (name, email, message) VALUES ('$name', '$email', '$message')";

		if ($conn->query($sql) === TRUE) {
			echo '<div class="success-message">Message sent successfully!</div>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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
		<title>Customer Support</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #f4f4f4;
				margin: 20px;
				background-color: #F2F3F4;
				overflow-x: hidden;
				user-select: none;
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
				height: 880px;
			}

			.container {
				width: 50%;
				margin: auto;
				overflow: hidden;
			}

			form {
				background: white;
				padding: 20px;
				margin-top: 50px;
				border-radius: 5px;
				box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
			}

			label {
				display: block;
				margin: 10px 0 5px;
			}

			input,
			textarea {
				width: 100%;
				padding: 8px;
				margin-bottom: 10px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type="submit"] {
				background-color: #0096c7;
				color: white;
				cursor: pointer;
			}

			input[type="submit"]:hover {
				background-color: #0096c7;
				opacity: 75%;
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
			
			h1 {
				text-align: center;
				padding-bottom: 15px;
			}
			
			.success-message {
				color: #4caf50;
				font-size: 18px;
				font-weight: bold;
				text-align: center;
				margin-top: 20px;
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

		<div class="container">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<h1>Hi, how can we help you?</h1>
				<label for="name">Name:</label>
				<input type="text" name="name" required autocomplete="off" >

				<label for="email">Email:</label>
				<input type="email" name="email" required autocomplete="off" >

				<label for="message">Message:</label>
				<textarea name="message" rows="4" required autocomplete="off" ></textarea>

				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
