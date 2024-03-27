<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost"; // Change this if your database server is different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "labor"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user information from the database using $_SESSION['username']
$username = $_SESSION['username'];
$sql = "SELECT * FROM labor_detail WHERE user_name='$username'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Labor Cloud</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <span>LABOUR CLOUD</span>
        </div>
        <div class="navbar-right">
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

        <h1>Welcome, <?php echo $user['name']; ?>!</h1>
        <p>Phone: <?php echo $user['phone']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Locality: <?php echo $user['locality']; ?></p>
        <p>Type of Work: <?php echo $user['type_of_work']; ?></p>
        <p>Wage: <?php echo $user['wage']; ?></p>
        <p>Gender: <?php echo $user['gender']; ?></p>
</body>
</html>
