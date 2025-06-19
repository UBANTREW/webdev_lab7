<?php
session_start();

// Connect to database
$conn = new mysqli("localhost", "root", "", "lab_7");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$matric = $_POST['matric'];
$password = $_POST['password'];

// Look for the user
$sql = "SELECT * FROM users WHERE matric='$matric'";
$result = $conn->query($sql);

// Check credentials
if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        // Success: create session and redirect
        $_SESSION['loggedin'] = true;
        $_SESSION['matric'] = $matric;
        $_SESSION['name'] = $row['name'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        header("Location: dashboard.php");
        exit;
    }
}

// Failed login
echo "❌ Login failed. <a href='login.html'>Try again</a>";
$conn->close();
?>
