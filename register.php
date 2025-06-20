<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form method="POST" action="register_process.php">
        <h2>User Registration</h2>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
