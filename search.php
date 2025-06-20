<?php session_start(); include 'dbconn.php'; if ($_SESSION['user']['role'] !== 'student') header("Location: index.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Search Research</h2>
    <form method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
    <?php
    if (isset($_GET['query'])) {
        $q = "%{$_GET['query']}%";
        $stmt = $conn->prepare("SELECT * FROM researches WHERE title LIKE ? AND status='approved'");
        $stmt->bind_param("s", $q);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()) {
            echo "<div class='result-box'><strong>{$row['title']}</strong><br><a href='uploads/{$row['filename']}'>Download</a></div>";
        }
    }
    ?>
</div>
</body>
</html>
