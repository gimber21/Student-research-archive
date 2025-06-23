<?php
session_start();
include 'dbconn.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Fetch the user based only on email (not role)
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        // Redirect based on the user's role
        if ($user['role'] === 'admin') {
            echo "<script>
                alert('Login successful! Welcome Admin');
                window.location.href = 'admin_dashboard.php';
            </script>";
        } else {
            echo "<script>
                alert('Login successful! Welcome Student');
                window.location.href = 'student_home.php';
            </script>";
        }
        exit;
    } else {
        echo "<script>
            alert('Incorrect password. Please try again.');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('No user found with that email.');
        window.location.href = 'index.php';
    </script>";
    exit;
}
?>
