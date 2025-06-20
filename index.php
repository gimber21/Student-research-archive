<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="login_process.php">
            <h2>Login</h2>

            <input type="email" name="email" placeholder="Email"
                class="<?php echo isset($_SESSION['login_error']) ? 'error' : ''; ?>" required>

            <input type="password" name="password" placeholder="Password"
                class="<?php echo isset($_SESSION['login_error']) ? 'error' : ''; ?>" required>

            <select name="role"
                class="<?php echo isset($_SESSION['login_error']) ? 'error' : ''; ?>">
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>

            <?php if (isset($_SESSION['login_error'])): ?>
                <span class="error-message"><?php 
                    echo $_SESSION['login_error']; 
                    unset($_SESSION['login_error']); 
                ?></span>
            <?php endif; ?>

            <button type="submit">Login</button>

            <a href="register.php">No account? Register</a>
        </form>
    </div>
</body>
</html>
