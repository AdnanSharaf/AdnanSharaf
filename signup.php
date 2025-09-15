<?php
$servername = "localhost:3307";
$username = "root"; // update if needed
$password = ""; // update with your MySQL password
$dbname = "college_db";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form values
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check password match
if ($password !== $confirm_password) {
  die("Passwords do not match!");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert into DB
$sql = "INSERT INTO users (name, email, number, gender, password) 
        VALUES ('$name', '$email', '$number', '$gender', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
  echo "Signup successful!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
