<?php
session_start();
$conn = new mysqli("localhost", "root", "", "student_portal");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$code = $_POST['student_code'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM students WHERE student_code = ?");
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  if (password_verify($password, $user['password'])) {
    $_SESSION['student_code'] = $code;
    $_SESSION['student_name'] = $user['student_name'];
    header("Location: dashboard.php");
    exit();
  } else {
    echo "<script>alert('Invalid password'); window.location.href='index.html';</script>";
  }
} else {
  echo "<script>alert('Student not found'); window.location.href='index.html';</script>";
}

$stmt->close();
$conn->close();
?>
