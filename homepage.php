<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            background: #f7f9fb;
            color: #222;
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
        .main-nav {
            display: flex;
            gap: 0.5rem;
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
            font-size: 2.5rem;
            letter-spacing: 1px;
        }
        header.page-header p {
            margin: 0.5rem 0 0 0;
            font-size: 1.2rem;
            font-weight: 400;
        }
        main {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }
        .search-bar input {
            width: 100%;
            max-width: 400px;
            padding: 0.7rem 1rem;
            border: 1px solid #cfd8dc;
            border-radius: 4px 0 0 4px;
            font-size: 1rem;
            outline: none;
        }
        .search-bar button {
            padding: 0.7rem 1.2rem;
            border: none;
            background: #2d6cdf;
            color: #fff;
            font-size: 1rem;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background 0.2s;
        }
        .search-bar button:hover {
            background: #1b4fa0;
        }
        .archive-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        .archive-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 1.5rem;
            transition: box-shadow 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .archive-card:hover {
            box-shadow: 0 4px 16px rgba(45,108,223,0.12);
        }
        .archive-card h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.25rem;
            color: #2d6cdf;
        }
        .archive-card p {
            margin: 0 0 1rem 0;
            color: #444;
            font-size: 1rem;
        }
        .archive-card .meta {
            font-size: 0.95rem;
            color: #888;
            margin-bottom: 0.5rem;
        }
        .archive-card a {
            align-self: flex-start;
            text-decoration: none;
            color: #fff;
            background: #2d6cdf;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.98rem;
            transition: background 0.2s;
        }
        .archive-card a:hover {
            background: #1b4fa0;
        }
        footer {
            background:#2d6cdf;
            color:#fff;
            text-align:center;
            padding:1.2rem 0;
            margin-top:2rem;
            font-size:1rem;
        }
        @media (max-width: 600px) {
            .archive-card {
                padding: 1rem;
            }
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
                <a href="homepage.php" class="active">Home</a>
                <a href="index.php">Login</a>
                <a href="about.php">About</a>
            </nav>
        </div>
    </div>
    <header class="page-header">
        <h1>Student Research Archive</h1>
        <p>Explore, search, and discover outstanding student research projects</p>
    </header>
    <main>
        <form class="search-bar" onsubmit="event.preventDefault(); filterArchive();">
            <input type="text" id="searchInput" placeholder="Search by title, author, or keyword...">
            <button type="submit">Search</button>
        </form>
        <section class="archive-list" id="archiveList">
            <div class="archive-card">
                <h2>Machine Learning for Healthcare</h2>
                <div class="meta">Khimmy Razel · 2023</div>
                <p>An exploration of machine learning algorithms to predict patient outcomes and improve diagnostics.</p>
                <a href="research1.php">Read More</a>
            </div>
            <div class="archive-card">
                <h2>Renewable Energy Solutions</h2>
                <div class="meta">Jeremiah Kase · 2022</div>
                <p>Investigating the efficiency of solar panels and wind turbines in urban environments.</p>
                <a href="research2.php">Read More</a>
            </div>
            <div class="archive-card">
                <h2>Social Media and Mental Health</h2>
                <div class="meta">Moiraine Kagandahan · 2024</div>
                <p>A study on the impact of social media usage on the mental health of teenagers.</p>
                <a href="research3.php">Read More</a>
            </div>
            <div class="archive-card">
                <h2>Blockchain in Education</h2>
                <div class="meta">Shaliyah Babes · 2023</div>
                <p>Exploring blockchain technology for secure and transparent academic records.</p>
                <a href="research4.php">Read More</a>
            </div>
            <div class="archive-card">
                <h2>AI-Powered Language Learning</h2>
                <div class="meta">Katherine Lumayas · 2025</div>
                <p>Developing intelligent systems to support personalized and adaptive language learning platforms.</p>
                <a href="research5.php">Read More</a>
            </div>
            <div class="archive-card">
                <h2>Climate Change and Agriculture</h2>
                <div class="meta">Rose Marie · 2023</div>
                <p>A detailed study of how rising temperatures impact crop yields and farming practices globally.</p>
                <a href="research6.php">Read More</a>
            </div>
        </section>
    </main>
    <footer>
        &copy; 2025 Student Research Archive. All rights reserved.<br>
        <span>
            <a href="about.php" style="color:#fff; text-decoration:underline; margin:0 8px;">About</a> |
            <a href="contact.php" style="color:#fff; text-decoration:underline; margin:0 8px;">Contact Us</a> |
            <a href="policy.php" style="color:#fff; text-decoration:underline; margin:0 8px;">Privacy Policy</a>
        </span>
        <br>
        <span style="font-size:0.95em; color:#e0e7ef;">
            Designed by the HexaTech Developers Team
        </span>
    </footer>
    <script>
        function filterArchive() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.archive-card');
            cards.forEach(card => {
                const text = card.innerText.toLowerCase();
                card.style.display = text.includes(input) ? '' : 'none';
            });
        }
        document.getElementById('searchInput').addEventListener('input', filterArchive);
    </script>
</body>
</html>
