<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f9f9f9; }
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        h1 { text-align: center; color: #333; }
        form { display: flex; flex-direction: column; gap: 0; }
        label { margin-top: 15px; margin-bottom: 5px; }
        input, textarea, button { width: 100%; box-sizing: border-box; }
        input, textarea { padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; padding: 12px; background: #0078d7; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; }
        button:hover { background: #005fa3; }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 8px 18px;
            background: #2a6ebb;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: #1d4f8b;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="back-btn">&larr; Back</a>
        <h1>Contact Us</h1>
        <form>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>