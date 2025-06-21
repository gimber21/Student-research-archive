<?php
session_start();
include 'dbconn.php';

if ($_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}

$title = $_POST['title'];
$abstract = $_POST['abstract'];
$user_id = $_SESSION['user']['id'];

$upload_dir = "uploads/";
$filename = basename($_FILES['file']['name']);
$file_path = $upload_dir . $filename;

if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
    $stmt = $conn->prepare("INSERT INTO researches (user_id, title, abstract, file_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $abstract, $file_path);
    $stmt->execute();
    header("Location: student_home.php");
} else {
    echo "Upload failed.";
}
?>
