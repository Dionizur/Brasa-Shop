<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Carrinho simulado (substitua pelo seu sistema de adição real)
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [
        ["nome" => "Molho Carolina Reaper", "preco" => 29.90, "quantidade" => 1],
        ["nome" => "Molho Infernal", "preco" => 24.50, "quantidade" => 2],
    ];
}

$carrinho = $_SESSION['carrinho'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carrinho | Brasa-Store</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="./assets/img/download.jpg" alt="Logo Brasa-Store" />
        <h1>Brasa-Store</h1>
      </div>
      <nav>
        <a href="index.php">Início</a>
        <a href="#">Produtos</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="#">Contato</a>
        <span class="usuario">Olá, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Sair</a></span>
      </nav>
    </div>
  </header>

  <section class="produtos">
    <h2>Seu Carrinho</h2>
    <?php if (empty($carrinho)) : ?>
      <p>Seu carrinho está vazio.</p>
    <?php else : ?>
      <table class="tabela-carrinho">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($carrinho as $item): 
            $subtotal = $item['preco'] * $item['quantidade'];
            $total += $subtotal;
          ?>
          <tr>
            <td><?php echo $item['nome']; ?></td>
            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
            <td><?php echo $item['quantidade']; ?></td>
            <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="total-carrinho">
        <h3>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>
        <button class="btn">Finalizar Compra</button>
      </div>
    <?php endif; ?>
  </section>

  <footer>
    <p>&copy; 2025 Brasa-Store. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
