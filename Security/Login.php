<?php
    // PHP code for database connection and handling form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Get user input
        $email = $_POST['email'];
        $userInputPassword = $_POST['password'];

        // Use prepared statement to perform database operations (validate login credentials)
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($userInputPassword, $user['password'])) {
            // User is authenticated, redirect to index.php
            header("Location: index.php");
            exit(); // Stop further script execution
        } else {
            // Invalid credentials, display an error message
            echo "<p>Invalid email or password</p>";
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    }
?>

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
    </style>
</head>

<body>
    <form action="Login.php" method="post">
		<img src="Logo.png" alt="Your Image" style="width: 75%;">
        <h2>Login</h2>
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required />

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required />

            <button type="submit" class="loginbtn">Login</button>
        </div>
        <p>Don't have an account? <a href="Signup.php">Sign up</a>.</p>
    </form>
</body>
</html>
