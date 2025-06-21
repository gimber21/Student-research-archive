<?php
include 'dbconn.php';

// Check if an ID is provided
if (!isset($_GET['id'])) {
    die("No ID provided.");
}

$id = intval($_GET['id']);

// Update the status to 'approved'
$stmt = $conn->prepare("UPDATE researches SET status = 'approved' WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect back to admin dashboard
header("Location: admin_dashboard.php");
exit;
?>
