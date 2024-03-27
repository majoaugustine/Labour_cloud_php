<?php
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
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$locality = $_POST['locality'];
$type_of_work = $_POST['type_of_work'];
$wage = $_POST['wage'];
$gender = $_POST['gender'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];

// Prepare and execute SQL statement to insert data into the table
$sql = "INSERT INTO labor_detail (name, phone, email, locality, type_of_work, wage, gender, user_name, password)
VALUES ('$name', '$phone', '$email', '$locality', '$type_of_work', '$wage', '$gender', '$user_name', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
