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
  <title>Brasa-Store | Produtos</title>
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
        <a href="home.php">Início</a>
        <a href="produtos.php">Produtos</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="https://github.com/Dionizur" target="_blank">Contato</a>
        <span class="usuario">Bem-vindo, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Sair</a></span>
      </nav>
    </div>
  </header>

  <main class="conteudo">
    <section class="produtos">
      <h2>Todos os nossos produtos 🔥</h2>
      <div class="cards">
        <?php
          $json = file_get_contents('../packt/prod.json');
          $produtos = json_decode($json, true);

          if ($produtos && is_array($produtos)) {
            foreach ($produtos as $produto) {
              echo '<div class="card">';
              echo '<img src="' . htmlspecialchars($produto['imagem']) . '" alt="' . htmlspecialchars($produto['nome']) . '" />';
              echo '<h3>' . htmlspecialchars($produto['nome']) . '</h3>';
              echo '<p>' . htmlspecialchars($produto['descricao']) . '</p>';
              echo '<button>Comprar!</button>';
              echo '</div>';
            }
          } else {
            echo '<p>Nenhum produto disponível no momento.</p>';
          }
        ?>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Brasa-Store. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
