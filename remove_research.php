<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}

$id = intval($_GET['id']);

// Get research details first
$stmt = $conn->prepare("SELECT * FROM researches WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    $file_path = $row['file_path'];
    $title = $row['title'];
    $filename = $row['filename'];
    $removed_by = $_SESSION['user']['name'];
    $research_id = $row['id'];

    // Insert into removed_researches table
    $archive = $conn->prepare("INSERT INTO removed_researches (research_id, title, filename, file_path, removed_by) VALUES (?, ?, ?, ?, ?)");
    $archive->bind_param("issss", $research_id, $title, $filename, $file_path, $removed_by);
    $archive->execute();

    // Delete file from server
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Delete from researches table
    $deleteStmt = $conn->prepare("DELETE FROM researches WHERE id = ?");
    $deleteStmt->bind_param("i", $id);
    $deleteStmt->execute();
}

header("Location: admin_dashboard.php");
exit;
?>