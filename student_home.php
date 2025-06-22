<?php
session_start();
if ($_SESSION['user']['role'] !== 'student') header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Home</title>
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
            transition: 
                background 0.2s,
                color 0.2s,
                border-color 0.2s;
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
        header.page-header h1 {
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
        .welcome-msg {
            color: #2d3a4b;
            margin-bottom: 28px;
            font-size: 1.08rem;
        }
        .menu-btn {
            display: block;
            width: 100%;
            margin: 14px 0;
            padding: 13px 0;
            background: #4f8cff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.08rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(45,108,223,0.07);
        }
        .menu-btn:hover {
            background: #2563eb;
            box-shadow: 0 4px 16px rgba(45,108,223,0.13);
        }
        .logout-link {
            display: inline-block;
            margin-top: 28px;
            color: #e53e3e;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .logout-link:hover {
            text-decoration: underline;
            color: #b91c1c;
        }
        @media (max-width: 700px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            .main-nav {
                width: 100%;
                justify-content: flex-start;
                gap: 0.2rem;
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
            <nav class="main-nav">
                <a href="index.php">Logout</a>
            </nav>
        </div>
    </div>
    <header class="page-header">
        <h2>Welcome, <?= $_SESSION['user']['name'] ?></h2>
        <p>This is your student dashboard</p>
    </header>
    <div class="container">
        <h2>Student Menu</h2>
        <div class="welcome-msg">
            Access your research tools and manage your submissions.
        </div>
        <a href="upload.php" class="menu-btn">Upload Research</a>
        <a href="search.php" class="menu-btn">Search Research</a>
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