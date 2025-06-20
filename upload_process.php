<?php
session_start();
include 'dbconn.php';

$title = $_POST['title'];
$filename = $_FILES['file']['name'];
$path = "uploads/" . basename($filename);
$uploaded_by = $_SESSION['user']['id'];

if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    $sql = "INSERT INTO researches (title, filename, uploaded_by) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $filename, $uploaded_by);
    $stmt->execute();
    header("Location: student_home.php");
} else {
    echo "Upload failed.";
}
?>
