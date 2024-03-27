<?php
session_start();

// Check if user is already logged in
if(isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}

// Check if form is submitted
if(isset($_POST['loginbtn'])) {
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

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (add additional validation if needed)

    // Prepare and execute SQL statement to check login credentials
    $sql = "SELECT * FROM labor_detail WHERE user_name='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        // Set session variable to store username
        $_SESSION['username'] = $username;
        
        // Redirect to profile.php
        header("Location: profile.php");
        exit(); // Ensure script stops execution after redirect
    } else {
        // Login failed
        $error_message = "Invalid username or password.";
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Labor Cloud</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body id="body_log">
    <nav class="navbar">
        <div class="navbar-left">
            <span>LABOUR CLOUD</span>
        </div>
        <div class="navbar-right">
            <a href="index.php">Home</a>
            <a href="register.php">Signup</a>
        </div>
    </nav>

    <div class="container" id="register">
        <h2>Login</h2>
        <?php if(isset($error_message)): ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="POST"> <!-- Replace action with the PHP file that will handle form submission -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" name="loginbtn" value="Login">
        </form>
    </div>
</body>
</html>
