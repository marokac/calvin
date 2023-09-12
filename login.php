<?php
// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to database (assuming XAMPP default settings)
$mysqli = new mysqli('localhost', 'root', '', 'user_db');

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Retrieve user data from database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
        // Redirect to profile page or perform other actions
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

$mysqli->close();
?>
