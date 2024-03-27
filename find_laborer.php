<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Laborer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <span>LABOUR CLOUD</span>
        </div>
        <div class="navbar-center">
            <span>Have Confusions? <br> Contact Us</span>
            <a href="about.php"><img src="\images\phone.png"></a>
        </div>
        <div class="navbar-right">
            <a href="index.php">HOME</a>
        </div>
    </nav>
    <div class="container">
    <h2>Find Laborer</h2>
    <form action="" method="POST"> 
        <label for="choose_work">Choose Work:</label>
        <select id="choose_work" name="choose_work" required>
            <option value="" disabled selected>Select type of work</option>
            <option value="electric">Electric</option>
            <option value="farming">Farming</option>
            <option value="plumbing">Plumbing</option>
            <option value="cooking">Cooking</option>
            <option value="painting">Painting</option>
            <option value="overall assistance">Overall Assistance</option>
        </select>
        <button type="submit" name="find">Find</button>
    </form>
    </div>
    <?php
    if(isset($_POST['find'])) {
        // Connect to your database (replace placeholders with your actual database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "labor";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve selected work from form submission
        $selected_work = $_POST['choose_work'];

        // Prepare SQL statement to fetch laborers based on selected work
        $sql = "SELECT * FROM labor_detail WHERE type_of_work = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selected_work);

        // Execute the prepared statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Display each laborer's information
                echo "<h2>Name: " . $row["name"] . "</h2>";
                echo "<h2>Phone: " . $row["phone"] . "</h2>";
                echo "<h2>Email: " . $row["email"] . "</h2>";
                echo "<h2>Locality: " . $row["locality"] . "</h2>";
                // Display other relevant information as needed
                echo "<hr>";
                echo "<hr>"; // Add a horizontal line between each laborer's information
            }
        } else {
            echo "No laborers found for $selected_work";
        }

        // Close prepared statement and database connection
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
