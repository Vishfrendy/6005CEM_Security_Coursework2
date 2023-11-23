<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
      position: relative;
    }
    .message {
      text-align: center;
      color: green;
      margin-bottom: 10px;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #dff0d8;
      border-radius: 5px;
    }
    h2 {
      color: #333;
    }
    label {
      display: block;
      text-align: left;
      margin: 10px 0 5px;
      color: #555;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    button {
      background-color: #0096c7;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
    }
    button:hover {
      opacity: 0.8;
    }
    p {
      color: #888;
      margin-top: 15px;
      font-size: 12px;
    }
    a {
      color: dodgerblue;
      text-decoration: none;
    }
    img {
      max-width: 100%;
      height: auto;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
	<?php
	// Initialize an empty message variable
	$message = "";

	// Check if the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get form data
		$username = $_POST["username"];
		$password = $_POST["psw"];

		// Database connection parameters
		$servername = "localhost";
		$db_username = "root";
		$password_db = "";
		$dbname = "security";

		// Create connection
		$conn = new mysqli($servername, $db_username, $password_db, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve user data based on the provided username
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			// Verify the entered password against the stored hash
			if (password_verify($password, $row["password"])) {
				$message = "Login successful. Welcome, $username!";
				// Redirect to index.php
				header("Location: index.php");
				exit();
			} else {
				$message = "Invalid password. Please try again.";
			}
		} else {
			$message = "User not found. Please check your username.";
		}

		// Close connection
		$conn->close();
	}
	?>

	<div class="message">
		<?php
		// Display the message
		echo $message;
		?>
	</div>

	<form action="Login.php" method="post">
		<img src="Logo.png" alt="Your Image" style="width: 75%;">
		<h2>Login</h2>
		<div class="container">
		  <label for="username"><b>Username</b></label>
		  <input type="text" placeholder="Enter Username" name="username" required />

		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="psw" required />

		  <button type="submit" class="loginbtn">Login</button>
		</div>
		<p>Don't have an account? <a href="Signup.php">Sign up here</a>.</p>
	</form>
</body>
</html>
