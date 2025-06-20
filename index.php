<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form method="POST" action="login_process.php">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Login</button>
        <p>No account? <a href="register.php">Register here</a></p>
    </form>
</div>
</body>
</html>
