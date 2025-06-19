<?php
$conn = new mysqli("localhost", "root", "", "lab_7");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed for security
$accessLevel = $_POST['accessLevel'];

// Insert into users table
$sql = "INSERT INTO users (matric, name, password, accessLevel)
        VALUES ('$matric', '$name', '$password', '$accessLevel')";

if ($conn->query($sql) === TRUE) {
  echo "✅ Registration successful! <a href='login.html'>Click here to login</a>";
} else {
  echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
