<?php session_start(); if ($_SESSION['user']['role'] !== 'student') header("Location: index.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <h2>Upload Research</h2>
        <input type="text" name="title" placeholder="Research Title" required>
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>
