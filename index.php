<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'brasashop';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

session_start();

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Sendlogin"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha_usuario"];

    $query_usuario = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();

        // Comparação com MD5 não encosta DIGA NÂO A PASSWOR_HAS
        if (md5($senha) === $row['senha']) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: ./pages/home.php");
            exit();
        } else {
            $mensagem = "Senha incorreta!";
        }
    } else {
        $mensagem = "Usuário não encontrado!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Brasa-Shop</title>
  <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
  <div class="login-container">
    <div class="logo">
      <img src="./assets/img/download.jpg" alt="Logo Brasa-Shop">
      <h1>Brasa Shop 🔥</h1>
    </div>

    <?php if (!empty($mensagem)) : ?>
      <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="usuario" placeholder="Digite seu usuário" required>
      <input type="password" name="senha_usuario" placeholder="Digite sua senha" required>
      <input type="submit" name="Sendlogin" value="Acessar">
    </form>
  </div>
</body>
</html>
