<?php
// Retrieve form data
$name = $_POST['name'];
$surname = $_POST['surname'];
$student_no = $_POST['student_no'];
$contact = $_POST['contact'];
$module_code = $_POST['module_code'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Connect to database (assuming XAMPP default settings)
$mysqli = new mysqli('localhost', 'root', '', 'user_db');

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Insert data into database
$sql = "INSERT INTO users (name, surname, student_no, contact, module_code, email, password) 
        VALUES ('$name', '$surname', '$student_no', '$contact', '$module_code', '$email', '$password')";

if ($mysqli->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
