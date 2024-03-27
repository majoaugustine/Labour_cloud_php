<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labor Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id="body_reg">
<nav class="navbar">
        <div class="navbar-left">
            <span>LABOUR CLOUD</span>
        </div>
        <div class="navbar-right">
            <a href="login.php">Login</a>
            <a href="index.php">HOME</a>
        </div>
    </nav>
<div class="container" id="register">
    <h2 id="reg">Labor Registration Form</h2>
    <form action="process_registration.php" method="POST"> <!-- Replace 'process_registration.php' with the PHP file that will handle form submission -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="locality">Locality:</label>
        <input type="text" id="locality" name="locality" required><br><br>
        
        <label for="type_of_work">Type of Work:</label>
        <select id="type_of_work" name="type_of_work" required>
        <option value="" disabled selected>Select type of work</option>
            <option value="electric">Electric</option>
            <option value="farming">Farming</option>
            <option value="plumbing">Plumbing</option>
            <option value="cooking">Cooking</option>
            <option value="painting">Painting</option>
            <option value="overall assistance">Overall Assistance</option>
        </select><br><br>

        
        <label for="wage">Wage:</label>
        <input type="text" id="wage" name="wage" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>
        
        <label for="user_name">Username:</label>
        <input type="text" id="user_name" name="user_name" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
