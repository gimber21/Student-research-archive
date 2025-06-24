<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$result = $conn->query("SELECT * FROM removed_researches ORDER BY removed_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Removed Research</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fb; padding: 20px; }
        h2 { color: #2d6cdf; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #2d6cdf; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        a.back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2d6cdf;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Removed Research Archive</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Filename</th>
            <th>Removed By</th>
            <th>Removed At</th>
            
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['research_id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['filename']) ?></td>
            <td><?= htmlspecialchars($row['removed_by']) ?></td>
            <td><?= $row['removed_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a class="back-link" href="admin_dashboard.php">&larr; Back</a>
</body>
</html>