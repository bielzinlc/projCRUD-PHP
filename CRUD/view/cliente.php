<?php
require_once "../src/Cliente.php";
session_start();

$usuario = $_SESSION["usuario"] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body class="cliente">
    <div id="cabecario">
        <img src="../img/ec_logo.png" alt="logoEC" id="logo">
    </div>
    <main id="corpo">
    <div id="moldura">
        <h3>Seu cadastro</h3>
        <ul>
            <?php if ($usuario) : ?>
            <li>Nome: <?php echo htmlspecialchars($usuario->getNome()); ?></li>
            <li>Telefone: <?php echo htmlspecialchars($usuario->getTelefone()); ?></li>
            <li>Data agendada: <?php echo htmlspecialchars($usuario->getDataAgendada()); ?></li>
            <?php endif; ?>
        </ul>
    </div>
    </main>
    <div id="rodape">
        <p>Desenvolvido por Equipe Elephant Contact&copy;</p>
    </div>
    
</body>
</html>