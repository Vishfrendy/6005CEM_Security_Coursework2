<?php
// Assume you have a session started after user login
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: Login.php");
    exit();
}

echo "Debug: User is logged in. User ID: " . $_SESSION['user_id'];

// Sample database connection (replace with your actual connection details)
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

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT email, username FROM users WHERE user_id = $user_id"; // Replace with your actual table and column names
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_email = $row['email'];
    $user_username = $row['username'];
} else {
    // Handle the case where user data is not found
    $user_email = 'Not available';
    $user_username = 'Not available';
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        .profile-info {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>User Profile</h2>

    <div class="profile-info">
        <p>Email: <?php echo $user_email; ?></p>
        <p>Username: <?php echo $user_username; ?></p>
    </div>

</body>
</html>
