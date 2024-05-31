<?php
// Connect to your database
$servername = "localhost";
$password = "password";
$dbname = "honestore";

$conn = new mysqli($servername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    
    // Query to check if password exist in the database
    $sql = "SELECT * FROM admin_password WHERE password='$password'";
    $result = $conn->query($sql);
    
    // If result matched $password, table row must be 1 row
    if($result->num_rows == 1) {
        // Redirect to inventory.php upon successful login
        header("location: inventory.php");
    } else {
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HONESTORE</title>
        <link rel="stylesheet" href="loginStyle.css">
    </head>
    <body>
        <div class="header-buttons">
            <button onclick="location.href='home.html'">Home</button>
            <button onclick="location.href='about.html'">About</button>
        </div>
        <div class="form-container">
            <img src="logo.png" alt="Logo">
            <form action="inventoryPage.php" method="post">
                <a>Log in as <strong>ADMIN</strong>
                <input type="password" id="password" name="password" placeholder="Enter Password" maxlength="8" required>
                <button type="submit">Log in</button>
            </form>
        </div>
    </body>
</html>
