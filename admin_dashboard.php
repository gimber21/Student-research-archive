<?php
session_start();
include 'dbconn.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Optional if you have a style file -->
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: 20px auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        a.button { padding: 5px 10px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        a.button:hover { background: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Admin Dashboard</h2>
    <p>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?> | <a href="logout.php">Logout</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Filename</th>
            <th>Uploaded By</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "SELECT r.*, u.name AS uploader_name FROM researches r LEFT JOIN users u ON r.uploaded_by = u.id";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><a href="uploads/<?= urlencode($row['filename']) ?>" target="_blank">View File</a></td>
                <td><?= htmlspecialchars($row['uploader_name']) ?></td>
                <td><?= ucfirst($row['status']) ?></td>
                <td>
                    <?php if ($row['status'] === 'pending'): ?>
                        <a class="button" href="approve.php?id=<?= $row['id'] ?>" onclick="return confirm('Approve this research?')">Approve</a>
                    <?php else: ?>
                        ✅ Approved
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
