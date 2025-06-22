<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}

$title = $_POST['title'];
$user_id = $_SESSION['user']['id'];

$upload_dir = "uploads/";

// Auto-create folder if missing
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$filename = basename($_FILES['file']['name']);
$file_path = $upload_dir . $filename;

// Upload the file and insert into DB
if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
    $sql = "INSERT INTO researches (user_id, title, filename, file_path) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>
            alert('Database error: " . addslashes($conn->error) . "');
            window.location.href = 'student_home.php';
        </script>";
        exit;
    }

    $stmt->bind_param("isss", $user_id, $title, $filename, $file_path);
    if ($stmt->execute()) {
        echo "<script>
            alert('Upload successful!');
            window.location.href = 'student_home.php';
        </script>";
    } else {
        echo "<script>
            alert('Upload failed. Please try again.');
            window.location.href = 'student_home.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Upload failed. Please check folder permissions or file size.');
        window.location.href = 'student_home.php';
    </script>";
}
?>