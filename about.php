<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>About — Gamersway</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <a href="index.php">Home</a>
                <a href="chat.php">Chat</a>
                <a href="about.php">About</a>
                <a href="login.php">Login</a>
            </nav>
            <p class="tag">Best games of the week &amp; year — curated picks</p>
        </div>
    </header>

    <main class="container">
        <section class="about-section">
            <h2>About Gamersway</h2>
            <div class="about-content">
                <p>Welcome to <strong>Gamersway</strong>, a passion project built by a single developer who shares a love for gaming and wants to create a space for gamers like you.</p>
                
                <h3>Our Mission</h3>
                <p>Gamersway exists to help gamers discover the best games of the week and year. We curate picks based on quality, innovation, and community feedback — all in one easy-to-navigate platform.</p>
                
                <h3>Creator</h3>
                <p><strong>Tiago Pereira</strong> is the sole developer and curator behind Gamersway. With a passion for gaming and web development, Tiago built this website to combine both interests and provide a valuable resource for the gaming community.</p>
                
                <h3>Why Gamersway?</h3>
                <ul>
                    <li><strong>Curated Selections:</strong> Hand-picked games that stand out each week and throughout the year</li>
                    <li><strong>Community Focused:</strong> A chat feature to connect with other gamers and share recommendations</li>
                    <li><strong>Simple & Fast:</strong> A clean, responsive design that works on any device</li>
                    <li><strong>Passion Driven:</strong> Built by someone who genuinely loves gaming</li>
                </ul>
                
                <h3>Get Involved</h3>
                <p>Have feedback or want to chat about games? Head over to our <a href="chat.html">chat page</a> to connect with the community!</p>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway — curated picks</div>
    </footer>

    <style>
        .about-section {
            max-width: 800px;
            margin: 40px auto;
        }
        
        .about-section h2 {
            font-size: 32px;
            margin: 0 0 24px;
            color: var(--accent);
        }
        
        .about-section h3 {
            font-size: 20px;
            margin: 28px 0 12px;
            color: #e6eef6;
        }
        
        .about-content p {
            line-height: 1.6;
            color: #cfe6dd;
            margin: 0 0 16px;
        }
        
        .about-content ul {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }
        
        .about-content li {
            padding: 10px 0;
            padding-left: 24px;
            position: relative;
            color: #cfe6dd;
            line-height: 1.6;
        }
        
        .about-content li:before {
            content: "▸";
            position: absolute;
            left: 0;
            color: var(--accent);
        }
        
        .about-content a {
            color: var(--accent);
            text-decoration: none;
        }
        
        .about-content a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
