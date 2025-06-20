<?php
session_start();
include 'dbconn.php';

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT * FROM users WHERE email = ? AND role = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: " . ($role === 'student' ? "student_home.php" : "admin_dashboard.php"));
    } else {
        $_SESSION['login_error'] = 'Incorrect email or password.';
        header("Location: index.php");
    }
} else {
    $_SESSION['login_error'] = 'Incorrect email or password.';
    header("Location: index.php");
}
?>