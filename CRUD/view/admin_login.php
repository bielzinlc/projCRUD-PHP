<?php 

require_once "../src/AdminDAO.php";
require_once "../src/Admin.php";



$bd = new AdminDAO();

session_start();

if (isset($_SESSION["agenda"])) {
    $_SESSION["agenda"] = null;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $admin = $bd->login($usuario, $senha);

    if ($admin != null && $admin->getSenha() === $senha) {
        $_SESSION["admin"] = $admin;
        $_SESSION["agenda"] = "Olá, Admin {$admin->getUsuario()} ! Bem vindo ao sistema.";
        
        echo "<script>
        window.location.href = 'admin.php'
        </script>";
    } else {
        $_SESSION["agenda"] = "Usuário não encontrado. Verifique os dados e tente novamente.";
        
        echo "<script>
        alert('{$_SESSION["agenda"]}');
        window.location.replace = 'admin_login.php'
        </script>";
    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body class="admin_login">
    <form action="#" method="post" id="form">
        <div id="moldura">
            <label for="usuario" class="rotulo">Usuário:</label>
            <input type="text" class="campos" name="usuario" placeholder="Usuário..." required>
            <br>
            <label for="senha" class="rotulo">Senha:</label>
            <input type="password" class="campos" name="senha" placeholder="Senha..." required>
            <input type="submit" value="Entrar" class="botao">
</div>
        </form>
</body>
</html>