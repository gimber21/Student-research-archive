<?php
session_start();
include 'dbconn.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Research</title>
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
            padding: 0.5rem 1.5rem;
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
        }
        .container {
            max-width: 520px;
            margin: 48px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(45,108,223,0.10);
            padding: 38px 32px 32px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 18px;
            color: #2d6cdf;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .search-form {
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            margin-bottom: 24px;
        }
        .search-form input[type="text"],
        .search-form select {
            padding: 0.7rem 1rem;
            border: 1.5px solid #bcd0f7;
            border-radius: 6px;
            font-size: 1.08rem;
            outline: none;
            transition: border 0.2s;
        }
        .search-form input[type="text"]:focus,
        .search-form select:focus {
            border-color: #2d6cdf;
        }
        .search-form button {
            padding: 0.7rem 1.5rem;
            background: #2d6cdf;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.08rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(45,108,223,0.07);
        }
        .search-form button:hover {
            background: #2563eb;
        }
        .results-list {
            margin-top: 18px;
            text-align: left;
        }
        .result-box {
            background: #f4f8ff;
            border: 1.5px solid #e3eafc;
            border-radius: 8px;
            padding: 1.1rem 1.2rem;
            margin-bottom: 1.1rem;
            box-shadow: 0 2px 8px rgba(45,108,223,0.04);
        }
        .result-box strong {
            color: #2d6cdf;
            font-size: 1.13rem;
        }
        .result-box a {
            display: inline-block;
            margin-top: 0.5rem;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.01rem;
        }
        .result-box a:hover {
            color: #1e40af;
            text-decoration: underline;
        }
        .no-results {
            color: #b91c1c;
            background: #fff6f6;
            border: 1.5px solid #ffeaea;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.2rem;
            text-align: center;
            font-size: 1.08rem;
        }
        .back-link {
            display: inline-block;
            margin-top: 18px;
            color: #2d6cdf;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
        }
        .back-link:hover {
            color: #2563eb;
            text-decoration: underline;
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
        </div>
    </div>
    <header class="page-header">
        <h2>Search Research</h2>
        <p>Find approved research papers in the archive</p>
    </header>
    <div class="container">
        <h2>Search Research</h2>
        <form method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search by title..." value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '' ?>">
            <select name="college">
                <option value="">All Colleges</option>
                <option value="College of Computing Studies" <?= (isset($_GET['college']) && $_GET['college'] == "College of Computing Studies") ? 'selected' : '' ?>>College of Computing Studies</option>
                <option value="College of Industrial Technology" <?= (isset($_GET['college']) && $_GET['college'] == "College of Industrial Technology") ? 'selected' : '' ?>>College of Industrial Technology</option>
                <option value="College of Criminal Justice" <?= (isset($_GET['college']) && $_GET['college'] == "College of Criminal Justice") ? 'selected' : '' ?>>College of Criminal Justice</option>
                <option value="College of Engineering" <?= (isset($_GET['college']) && $_GET['college'] == "College of Engineering") ? 'selected' : '' ?>>College of Engineering</option>
                <option value="College of Arts and Sciences" <?= (isset($_GET['college']) && $_GET['college'] == "College of Arts and Sciences") ? 'selected' : '' ?>>College of Arts and Sciences</option>
                <option value="College of Architecture and Fine Arts" <?= (isset($_GET['college']) && $_GET['college'] == "College of Architecture and Fine Arts") ? 'selected' : '' ?>>College of Architecture and Fine Arts</option>
                <option value="College of Hospitality and Tourism Management" <?= (isset($_GET['college']) && $_GET['college'] == "College of Hospitality and Tourism Management") ? 'selected' : '' ?>>College of Hospitality and Tourism Management</option>
                <option value="College of Education" <?= (isset($_GET['college']) && $_GET['college'] == "College of Education") ? 'selected' : '' ?>>College of Education</option>
                <option value="College of Business and Public Administration" <?= (isset($_GET['college']) && $_GET['college'] == "College of Business and Public Administration") ? 'selected' : '' ?>>College of Business and Public Administration</option>
            </select>
            <input type="text" name="course" placeholder="Search by course" value="<?= isset($_GET['course']) ? htmlspecialchars($_GET['course']) : '' ?>">
            <button type="submit">Search</button>
        </form>

        <div class="results-list">
        <?php
        if (isset($_GET['query']) || isset($_GET['college']) || isset($_GET['course'])) {
            $conditions = ["status='approved'"];
            $params = [];
            $types = "";

            if (!empty($_GET['query'])) {
                $conditions[] = "title LIKE ?";
                $params[] = '%' . $_GET['query'] . '%';
                $types .= "s";
            }
            if (!empty($_GET['college'])) {
                $conditions[] = "college = ?";
                $params[] = $_GET['college'];
                $types .= "s";
            }
            if (!empty($_GET['course'])) {
                $conditions[] = "course LIKE ?";
                $params[] = '%' . $_GET['course'] . '%';
                $types .= "s";
            }

            $sql = "SELECT * FROM researches WHERE " . implode(" AND ", $conditions);
            $stmt = $conn->prepare($sql);

            if ($types) {
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();
            $res = $stmt->get_result();
            $found = false;

            while ($row = $res->fetch_assoc()) {
                $found = true;
                $title = htmlspecialchars($row['title']);
                $file = htmlspecialchars($row['filename']);
                $college = htmlspecialchars($row['college']);
                $course = htmlspecialchars($row['course']);

                echo "<div class='result-box'>";
                echo "<strong>$title</strong><br>";
                echo "College: $college<br>";
                echo "Course: $course<br>";
                echo "<a href='uploads/$file' target='_blank'>Download</a>";
                echo "</div>";
            }

            if (!$found) {
                echo "<div class='no-results'>No research found matching your search.</div>";
            }
        }
        ?>
        </div>
        <a href="student_home.php" class="back-link">&larr; Back</a>
    </div>
    <footer style="background:#2d6cdf; color:#fff; text-align:center; padding:1.2rem 0; margin-top:2rem; font-size:1rem;">
        &copy; 2025 Student Research Archive. All rights reserved.<br>
        <span style="font-size:0.95em; color:#e0e7ef;">
            Designed by the HexaTech Developers Team
        </span>
    </footer>
</body>
</html>
