// delete.php
<?php
include 'dbconn.php';
$id = $_GET['id'];
$conn->query("DELETE FROM researches WHERE id=$id");
header("Location: admin_dashboard.php");
?>
