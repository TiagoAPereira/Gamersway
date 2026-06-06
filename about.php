<?php
include_once 'config.php';
?>
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
                <?php nav_bar(); ?>
            <p class="tag">Melhores jogos da semana e do ano — seleções curadas</p>
        </div>
    </header>

    <main class="container">
        <section class="about-section">
            <h2>Sobre o Gamersway</h2>
            <div class="about-content">
                <p>Bem-vindo ao website <strong>Gamersway</strong>, um projeto criado por um único desenvolvedor que compartilha o amor pelos jogos e quer criar um espaço para jogadores como você.</p>
                
                <h3>Missão</h3>
                <p>Gamersway existe para ajudar jogadores a descobrir os melhores jogos da semana e do ano. Selecionamos recomendações com base na qualidade, inovação e no feedback da comunidade — tudo em uma plataforma fácil de navegar.</p>
                
                <h3>Criador</h3>
                <p><strong>Tiago Pereira</strong> é o único desenvolvedor por trás deste website. Com paixão por jogos e desenvolvimento web, Tiago construiu este site para unir ambas as paixões e oferecer um recurso valioso para a comunidade gamer.</p>
                
                <h3>Por que Gamersway?</h3>
                <ul>
                    <li><strong>Melhores jogos:</strong> Jogos que se destacam a cada semana e ao longo do ano</li>
                    <li><strong>Focado na Comunidade:</strong> Um recurso de chat para se conectar com outros jogadores e compartilhar recomendações</li>
                    <li><strong>Simples & Rápido:</strong> Design limpo e responsivo que funciona em qualquer dispositivo</li>
                    <li><strong>Movido pela Paixão:</strong> Construído por alguém que realmente ama jogos</li>
                </ul>
                
                <h3>Participe</h3>
                <p>Tem feedback ou quer conversar sobre jogos? Vá para nossa <a href="chat.html">página de chat</a> para se conectar com a comunidade!</p>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway</div>
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
