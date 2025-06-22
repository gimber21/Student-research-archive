<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
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
        .login-container {
            max-width: 370px;
            margin: 70px auto 0 auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 36px 28px 28px 28px;
        }
        .login-container h2 {
            text-align: center;
            color: #2d6cdf;
            margin-bottom: 28px;
            font-size: 1.7rem;
        }
        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #2d3a4b;
            font-weight: 500;
        }
        input, select {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border: 1px solid #bfc9d9;
            border-radius: 5px;
            font-size: 1rem;
            background: #f7f9fb;
            margin-bottom: 2px;
            display: block;
        }
        input:focus, select:focus {
            border-color: #2d6cdf;
            outline: none;
        }
        .login-btn {
            width: 100%;
            background: #2d6cdf;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 0;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .login-btn:hover {
            background: #1b4fa0;
        }
        .login-footer {
            text-align: center;
            margin-top: 18px;
            font-size: 0.97rem;
        }
        .login-footer a {
            color: #2d6cdf;
            text-decoration: underline;
        }
        .error-message {
            color: #e53e3e;
            background: #fff0f0;
            border: 1px solid #ffc2c2;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 18px;
            text-align: center;
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
            .login-container {
                margin: 40px 8px 0 8px;
                padding: 24px 10px 18px 10px;
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
                <a href="homepage.php">Home</a>
                <a href="index.php" class="active">Login</a>
                <a href="about.php">About</a>
            </nav>
        </div>
    </div>
    <div class="login-container">
        <h2>Login</h2>
            <form method="POST" action="login_process.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Login as</label>
                <select id="role" name="role" required>
                    <option value="">Select role</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="login-btn">Sign In</button>
            <div class="login-footer">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
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
