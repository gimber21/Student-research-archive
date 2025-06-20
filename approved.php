// approve.php
<?php
include 'dbconn.php';
$id = $_GET['id'];
$conn->query("UPDATE researches SET status='approved' WHERE id=$id");
header("Location: admin_dashboard.php");
?>
