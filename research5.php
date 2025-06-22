<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>AI-Powered Language Learning</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Roboto', Arial, sans-serif;
      margin: 0;
      background: #f7f9fb;
      color: #222;
    }
    .site-header {
      background: #fff;
      border-bottom: 3px solid #2d6cdf;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
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
    }
    .site-title {
      font-size: 1.45rem;
      font-weight: 700;
      color: #2d6cdf;
    }
    .main-nav {
      display: flex;
      gap: 0.5rem;
    }
    .main-nav a {
      color: #2d6cdf;
      background: transparent;
      text-decoration: none;
      font-size: 1.08rem;
      padding: 0.5rem 1.2rem;
      border-radius: 22px;
      font-weight: 500;
      transition: background 0.2s, color 0.2s;
    }
    .main-nav a.active, .main-nav a:hover {
      background: #2d6cdf;
      color: #fff;
    }
    header.page-header {
      background: #2d6cdf;
      color: #fff;
      padding: 2rem 0 1.5rem 0;
      text-align: center;
    }
    header.page-header h1 {
      margin: 0;
      font-size: 2.5rem;
    }
    header.page-header p {
      margin: 0.5rem 0 0;
      font-size: 1.1rem;
    }
    main {
      max-width: 900px;
      margin: 2rem auto;
      padding: 0 1rem;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    }
    .back-btn {
      display: inline-block;
      margin: 1.5rem 0 1rem 2rem;
      padding: 8px 18px;
      background: #2d6cdf;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      font-size: 16px;
      transition: background 0.2s;
    }
    .back-btn:hover {
      background: #1b4fa0;
    }
    article {
      padding: 1rem 2rem 2rem 2rem;
    }
    article h2 {
      color: #2d6cdf;
      margin-top: 0;
    }
    article p {
      line-height: 1.7;
      font-size: 1.05rem;
      margin-bottom: 1.2rem;
    }
    footer {
      background: #2d6cdf;
      color: #fff;
      text-align: center;
      padding: 1.2rem 0;
      margin-top: 2rem;
      font-size: 1rem;
    }
    footer a {
      color: #fff;
      text-decoration: underline;
      margin: 0 8px;
    }
    footer span {
      font-size: 0.95em;
      color: #e0e7ef;
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
        <a href="index.php">Login</a>
        <a href="about.php">About</a>
      </nav>
    </div>
  </div>

  <header class="page-header">
    <h1>AI-Powered Language Learning</h1>
    <p>Katherine Lumayas · 2025</p>
  </header>

  <main>
    <a href="homepage.php" class="back-btn">← Back</a>
    <article>
      <h2>Abstract</h2>
      <p>
        This study explores the development and effectiveness of AI-powered tutoring systems designed to personalize learning experiences for students. It evaluates natural language processing, real-time feedback, and adaptive difficulty levels as key features.
      </p>

      <h2>Introduction</h2>
      <p>
        Online learning platforms have seen a surge in adoption, especially post-pandemic. However, generic lessons fail to address individual learning curves. AI tutoring offers potential for real-time assessment and content customization.
      </p>

      <h2>Methodology</h2>
      <p>
        We designed an AI-driven tutoring prototype using Python and OpenAI’s GPT-3 model for language understanding. Data from 50 students was analyzed to assess progress based on interaction frequency and quiz performance.
      </p>

      <h2>Results</h2>
      <p>
        84% of participants showed improved retention and engagement. The AI tutor adapted to learner needs, providing hints, rephrased questions, and motivational feedback in real-time, leading to higher test scores.
      </p>

      <h2>Conclusion</h2>
      <p>
        AI-powered tutoring systems are promising tools for education. With further refinement and ethical considerations, they can play a critical role in making learning accessible and personalized for all students.
      </p>
    </article>
  </main>

  <footer>
    &copy; 2025 Student Research Archive. All rights reserved.<br>
    <a href="about.php">About</a> |
    <a href="contact.php">Contact Us</a> |
    <a href="policy.php">Privacy Policy</a><br>
    <span>Designed by the HexaTech Developers Team</span>
  </footer>
</body>
</html>