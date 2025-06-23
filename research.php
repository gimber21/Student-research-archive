<?php
include 'dbconn.php';

// Get research ID from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid research ID.";
    exit;
}

$id = intval($_GET['id']);

// Query the database
$stmt = $conn->prepare("SELECT r.title, r.abstract, r.filename, r.file_path, u.name AS author, YEAR(r.created_at) AS year
                        FROM researches r
                        JOIN users u ON r.user_id = u.id
                        WHERE r.id = ? AND r.status = 'approved'");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Research not found or not approved yet.";
    exit;
}

$research = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($research['title']) ?> - Research Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2d6cdf;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .meta {
            color: #777;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        p.abstract {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        a.download-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.7rem 1.5rem;
            background: #2d6cdf;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.2s;
        }
        a.download-btn:hover {
            background: #1b4fa0;
        }
        a.back-link {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            color: #2d6cdf;
            font-size: 0.95rem;
        }
        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($research['title']) ?></h1>
        <div class="meta">By <?= htmlspecialchars($research['author']) ?> · <?= $research['year'] ?></div>
        <p class="abstract"><?= nl2br(htmlspecialchars($research['abstract'])) ?></p>

        <a class="download-btn" href="<?= htmlspecialchars($research['file_path']) ?>" target="_blank">Download Full Research</a><br>
        <a class="back-link" href="homepage.php">&larr; Back to Homepage</a>
    </div>
</body>
</html>
