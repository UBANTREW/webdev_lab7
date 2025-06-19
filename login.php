<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lab_7");

$matric = $_POST['matric'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE matric='$matric'";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['matric'] = $matric;
        $_SESSION['name'] = $row['name'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login Failed</title></head>
<body>
  <p style="color: red;">❌ Invalid username or password, try <a href="login.html">login</a> again.</p>
</body>
</html>
