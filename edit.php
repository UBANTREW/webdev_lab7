<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "lab_7");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Update User</h2>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Matric: <input type="text" name="matric" value="<?= $row['matric'] ?>" readonly><br>
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Access Level:
    <select name="accessLevel">
      <option value="user" <?= $row['accessLevel'] == 'user' ? 'selected' : '' ?>>user</option>
      <option value="admin" <?= $row['accessLevel'] == 'admin' ? 'selected' : '' ?>>admin</option>
    </select><br><br>
    <input type="submit" value="Update">
    <a href="dashboard.php">Cancel</a>
  </form>
</body>
</html>
