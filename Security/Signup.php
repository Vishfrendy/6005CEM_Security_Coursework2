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
	  user-select: none;
	  -moz-user-select: none;
	  -webkit-user-select: none;
	  -ms-user-select: none;
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
  
  <script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
  </script>

</head>

<body>
	<?php
	// Initialize an empty message variable
	$message = "";

	// Check if the form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get form data
		$username = $_POST["username"];
		$email = $_POST["email"];
		$rawSkey = $_POST["skey"]; // Use the original input
		$skey = password_hash($rawSkey, PASSWORD_BCRYPT); // Hash the security key
		$password = password_hash($_POST["psw"], PASSWORD_BCRYPT);

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

		// Check if the username already exists
		$checkUsernameQuery = "SELECT username FROM users WHERE username = '$username'";
		$resultUsername = $conn->query($checkUsernameQuery);

		// Check if the email already exists
		$checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
		$resultEmail = $conn->query($checkEmailQuery);

		// Validate the security key
		if (!password_verify($rawSkey, $skey)) {
			$message = "Invalid security key format.";
		} else {
			// Continue with the rest of your logic
			if ($resultUsername->num_rows > 0) {
				$message = "Username is already taken. Please choose another username.";
			} elseif ($resultEmail->num_rows > 0) {
				$message = "Email is already taken. Please choose another email address.";
			} else {
				// Insert data into the database
				$sql = "INSERT INTO users (username, email, skey, password) VALUES ('$username', '$email', '$skey', '$password')";

				if ($conn->query($sql) === TRUE) {
					$message = "New user created successfully. You can now login.";
				} else {
					$message = "Error: " . $sql . "<br>" . $conn->error;
				}
			}
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

	<form action="Signup.php" method="post">
		<img src="Logo.png" alt="Your Image" style="width: 75%;">
		<h2>Signup</h2>
		<div class="container">
		  <label for="username"><b>Username</b></label>
		  <input type="text" placeholder="Enter Username" name="username" required />

		  <label for="email"><b>Email</b></label>
		  <input type="text" placeholder="Enter Email" name="email" required />
		  
		  <label for="skey"><b>Security Key</b></label>
		  <input type="text" placeholder="Enter A 12-Digit Security Key" name="skey" required />

		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="psw" required />

		  <label for="psw-repeat"><b>Repeat Password</b></label>
		  <input type="password" placeholder="Enter Password Again" name="psw-repeat" required />

		  <button type="submit" class="signupbtn">Sign Up</button>
		</div>
		<p>Already have an account? <a href="Login.php">Login here</a>.</p>
	</form>
</body>
</html>
