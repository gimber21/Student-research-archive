<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Research</title>
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
            font-weight: 400;
        }
        .container {
            max-width: 420px;
            margin: 48px auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(45,108,223,0.10);
            padding: 38px 32px 32px 32px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 18px;
            color: #2d6cdf;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        .upload-form input[type="text"],
        .upload-form textarea,
        .upload-form input[type="file"],
        .upload-form button {
            width: 100%;
            box-sizing: border-box;
        }
        .upload-form input[type="text"],
        .upload-form textarea {
            padding: 0.7rem 1rem;
            border: 1.5px solid #bcd0f7;
            border-radius: 6px;
            font-size: 1.08rem;
            outline: none;
            transition: border 0.2s;
            resize: none;
        }
        .upload-form input[type="text"]:focus,
        .upload-form textarea:focus {
            border-color: #2d6cdf;
        }
        .upload-form input[type="file"] {
            border: none;
            background: none;
            font-size: 1.05rem;
            padding-left: 0;
        }
        .upload-form button {
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
            margin-top: 0.5rem;
        }
        .upload-form button:hover {
            background: #2563eb;
        }
        .back-link {
            display: inline-block;
            margin-top: 18px;
            color: #2d6cdf;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .back-link:hover {
            text-decoration: underline;
            color: #2563eb;
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
                padding: 22px 8px 18px 8px;
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
        </div>
    </div>
    <header class="page-header">
        <h2>Upload Research</h2>
        <p>Submit your research for review and archiving</p>
    </header>
    <div class="container">
        <h2>Upload Research</h2>
        <form action="upload_process.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="text" name="uploaded_by" value="<?php echo htmlspecialchars($_SESSION['user']['name']); ?>" readonly>
            <input type="text" name="title" placeholder="Research Title" required>
            <textarea name="abstract" placeholder="Abstract" rows="5" required></textarea>
            <input type="file" name="file" required>
            <button type="submit">Upload</button>
            <a href="student_home.php" class="back-link">&larr; Back to Dashboard</a>
        </form>
    </div>
    <footer style="background:#2d6cdf; color:#fff; text-align:center; padding:1.2rem 0; margin-top:2rem; font-size:1rem;">
        &copy; 2025 Student Research Archive. All rights reserved.<br><br>
        <span style="font-size:0.95em; color:#e0e7ef;">
            Designed by the HexaTech Developers Team
        </span>
    </footer>
</body>
</html>