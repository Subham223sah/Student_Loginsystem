<?php
session_start();
if (!isset($_SESSION['student_code'])) {
  header("Location: index.html");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo $_SESSION['student_name']; ?>!</h2>
  <p>You are logged in with Student Code: <?php echo $_SESSION['student_code']; ?></p>
  <a href="logout.php">Logout</a>
</body>
</html>
