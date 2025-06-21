<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}

$title = $_POST['title'];
$abstract = $_POST['abstract'];
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
    $stmt = $conn->prepare("INSERT INTO researches (user_id, title, abstract, file_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $abstract, $file_path);
    $stmt->execute();
    header("Location: student_home.php");
} else {
    echo "Upload failed. Please check folder permissions.";
}
?>
