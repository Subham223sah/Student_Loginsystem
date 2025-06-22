<?php
$conn = new mysqli("localhost", "root", "", "student_portal");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['student_name'];
$code = $_POST['student_code'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO students (student_name, student_code, email, phone, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $code, $email, $phone, $password);

if ($stmt->execute()) {
  echo "<script>alert('Registration successful'); window.location.href='index.html';</script>";
} else {
  echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='register.html';</script>";
}

$stmt->close();
$conn->close();
?>
