<?php
session_start();
include 'dbconn.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f6fb;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .site-header {
            background: #fff;
            color: #222;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-bottom: 3px solid #2d6cdf;
            padding: 0;
        }
        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        }
        .logo-area {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .logo-circle {
            width: 48px;
            height: 48px;
            background: #2d6cdf;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.7rem;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 2px 8px rgba(45,108,223,0.10);
        }
        .site-title {
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: #2d6cdf;
            margin: 0;
        }
        .main-nav {
            display: flex;
            gap: 0.5rem;
            padding: 0;
        }
        .main-nav a {
            color: #2d6cdf;
            background: transparent;
            border: 2px solid transparent;
            text-decoration: none;
            font-size: 1.08rem;
            padding: 0.5rem 1.2rem;
            border-radius: 22px;
            font-weight: 500;
            transition: background 0.2s, color 0.2s, border-color 0.2s;
            margin: 0 0.1rem;
            letter-spacing: 0.5px;
            position: relative;
        }
        .main-nav a.active, .main-nav a:hover {
            background: #2d6cdf;
            color: #fff;
            border-color: #2d6cdf;
            text-decoration: none;
        }
        header.page-header {
            background: #2d6cdf;
            color: #fff;
            padding: 2rem 0 1.5rem 0;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        header.page-header h2 {
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: 1px;
        }
        header.page-header p {
            margin: 0.5rem 0 0 0;
            font-size: 1.1rem;
            font-weight: 400;
        }
        .container {
            max-width: 1100px;
            margin: 48px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(45,108,223,0.10);
            padding: 38px 32px 32px 32px;
        }
        .container h2 {
            margin-bottom: 18px;
            color: #2d6cdf;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
        }
        .admin-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .admin-bar .welcome {
            color: #2d3a4b;
            font-size: 1.08rem;
        }
        .admin-bar .logout-link {
            color: #e53e3e;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .admin-bar .logout-link:hover {
            text-decoration: underline;
            color: #b91c1c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #f8fafc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(45,108,223,0.04);
        }
        th, td {
            border: 1px solid #e3eafc;
            padding: 10px 8px;
            text-align: center;
            font-size: 1.05rem;
        }
        th {
            background-color: #e8f0fe;
            color: #2d6cdf;
            font-weight: 700;
        }
        tr:nth-child(even) {
            background: #f4f8ff;
        }
        tr:hover {
            background: #e3eafc;
        }
        a.button {
            padding: 6px 14px;
            background: #4f8cff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            font-size: 1rem;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(45,108,223,0.07);
            border: none;
            display: inline-block;
        }
        a.button:hover {
            background: #2563eb;
        }
        .approved-badge {
            color: #22c55e;
            font-weight: bold;
            font-size: 1.1rem;
        }
        @media (max-width: 900px) {
            .container {
                padding: 18px 4px 18px 4px;
            }
            table, th, td {
                font-size: 0.98rem;
            }
        }
        @media (max-width: 700px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            .logo-area {
                margin-bottom: 0.5rem;
            }
            .container {
                margin: 32px 8px 0 8px;
                padding: 12px 2px 12px 2px;
            }
            table, th, td {
                font-size: 0.93rem;
            }
        }
    </style>
</head>
<body>
    <div class="site-header">
        <div class="nav-container">
            <div class="logo-area">
                <div class="logo-circle">SRA</div>
                <span class="site-title">Student Research Archive</span>
            </div>
            <nav class="main-nav">
                <a href="logout.php">Logout</a>
            </nav>
        </div>
    </div>
    <header class="page-header">
        <h2>Admin Dashboard</h2>
        <p>Manage all research submissions and approvals</p>
    </header>
    <div class="container">
        <div class="admin-bar">
            <span class="welcome">Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
        </div>
        <h2>Research Submissions</h2>
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
                    <td>
                        <?php if ($row['status'] === 'pending'): ?>
                            <span style="color:#f59e42;font-weight:500;">Pending</span>
                        <?php else: ?>
                            <span class="approved-badge">✅ Approved</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($row['status'] === 'pending'): ?>
                            <a class="button" href="approve.php?id=<?= $row['id'] ?>" onclick="return confirm('Approve this research?')">Approve</a>
                        <?php else: ?>
                            <span style="color:#aaa;">—</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <footer style="background:#2d6cdf; color:#fff; text-align:center; padding:1.2rem 0; margin-top:2rem; font-size:1rem;">
        &copy; 2025 Student Research Archive. All rights reserved.<br>
        <br>
        <span style="font-size:0.95em; color:#e0e7ef;">
            Designed by the HexaTech Developers Team
        </span>
    </footer>
</body>
</html>
