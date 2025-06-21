<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Research</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <h2>Upload Research</h2>
        <input type="text" name="title" placeholder="Research Title" required>
        <textarea name="abstract" placeholder="Abstract" rows="5" required></textarea>
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
        <a href="student_home.php">Back</a>
    </form>
</div>
</body>
</html>
