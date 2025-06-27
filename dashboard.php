<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Brasa-Store | Pimentas Ardentes</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src=./assets/img/logo_brasa-removebg-preview.png alt="Logo Brasa-Store" />
        <h1>🔥 Brasa-Store 🔥</h1>
      </div>
      <nav>
        <a href="#">Início</a>
        <a href="#">Produtos</a>
        <a href="#">Sobre</a>
        <a href="#">Contato</a>
        <span class="usuario">Bem-vindo, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Sair</a></span>
      </nav>
    </div>
  </header>

  <section class="hero">
    <h2>Garantimos que arde para entrar... se arde para sair você descobre!</h2>
    <p>Pimentas selecionadas para quem gosta de fogo na boca e em outros lugares. 🌶️</p>
    <a href="#" class="btn">Ver Produtos</a>
  </section>

  <section class="produtos">
    <h2>Pimentas em destaque</h2>
    <div class="cards">
      <div class="card">
        <img src="https://cdn.pixabay.com/photo/2017/01/20/15/06/chili-1991186_960_720.jpg" alt="Pimenta Vermelha" />
        <h3>Pimenta Carolina Reaper</h3>
        <p>A mais ardida do mundo. Para os fortes!</p>
        <button>Comprar</button>
      </div>
      <div class="card">
        <img src="https://cdn.pixabay.com/photo/2017/01/20/15/06/chili-1991190_960_720.jpg" alt="Molho de Pimenta" />
        <h3>Molho Infernal</h3>
        <p>Explosão de sabor e calor em cada gota.</p>
        <button>Comprar</button>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Brasa-Store. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
