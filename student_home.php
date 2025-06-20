<?php session_start(); if ($_SESSION['user']['role'] !== 'student') header("Location: index.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Welcome, <?= $_SESSION['user']['name'] ?></h2>
    <a href="upload.php">Upload Research</a><br>
    <a href="search.php">Search Research</a><br>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
