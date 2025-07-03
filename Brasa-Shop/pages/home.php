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
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
  <header>
    <div class="container">
    <div class="logo">
      <img src="../assets/img/download.jpg" alt="Logo Brasa-Store" />
      <h1>Brasa-Store</h1>
    </div>

      <nav>
        <a href="#">Início</a>
        <a href="#">Produtos</a>
        <a href="carrinho.php">Carrinho</a>
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
        <img src="../assets/img/carolina.jpg" alt="Molho carolina" />
        <h3>Molho Carolina Reaper</h3>
        <p>Molho feito com a primenta mais ardida do mundo! Pronto para queimar com seu sabor único.</p>
        <button>Comprar!</button>
      </div>
      <div class="card">
        <img src="../assets/img/black-fire.jpg" alt="Pimenta Vermelha" />
        <h3>Black-fire</h3>
        <p>Molho vindo das mais profundezad da terra, pronto para te surpreender com sabor e ardencia que não se encontra em outros lugares</p>
        <button>Comprar!</button>
      </div>
      <div class="card">
        <img src="../assets/img/carolina pura.jpg" alt="Molho de Pimenta" />
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
