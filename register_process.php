<?php
include 'dbconn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $password, $role);

if ($stmt->execute()) {
    echo "<script>
        alert('Registration successful!');
        window.location.href = 'index.php';
    </script>";
    exit;
} else {
    echo "<script>
        alert('Registration failed. Please try again.');
        window.location.href = 'register.html';
    </script>";
    exit;
}
?>
