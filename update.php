<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "lab_7");

$id = $_POST['id'];
$name = $_POST['name'];
$accessLevel = $_POST['accessLevel'];

$sql = "UPDATE users SET name='$name', accessLevel='$accessLevel' WHERE id=$id";
$conn->query($sql);

header("Location: dashboard.php");
?>
