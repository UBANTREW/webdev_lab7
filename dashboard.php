<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}

$conn = new mysqli("localhost", "root", "", "lab_7");
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Faculty of Computer Science and Information Technology<br>
  BIC21203 Web Development</h2>

  <table>
    <tr>
      <th>Matric</th>
      <th>Name</th>
      <th>Level</th>
      <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['matric'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['accessLevel'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">Update</a> |
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>

  <br><a href='logout.php'>Logout</a>
</body>
</html>
