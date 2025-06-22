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
        echo "<script>
            alert('Login successful!');
            window.location.href = '" . ($role === 'student' ? "student_home.php" : "admin_dashboard.php") . "';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Incorrect credentials. Please try again.');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('No user found. Please register first.');
        window.location.href = 'index.php';
    </script>";
    exit;
}
?>
