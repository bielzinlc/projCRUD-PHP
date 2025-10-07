<?php


require_once "../src/Cliente.php";
require_once "../src/ClienteDAO.php";

$bd = new ClienteDAO();

session_start();

if (isset($_SESSION["agenda"])) {
    $_SESSION["agenda"] = null;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    $usuario = $bd->buscarPorNome($nome, $telefone);

    if ($usuario != null) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["agenda"] = "Olá, {$usuario->getNome()} ! Seu agendamento está marcado para o dia {$usuario->getDataAgendada()}.";
        
        echo "<script>
        window.location.href = ('cliente.php')
        </script>";
    } else {
        $_SESSION["agenda"] = "Usuário não encontrado. Verifique os dados e tente novamente.";
        
        echo "<script>
        alert('{$_SESSION["agenda"]}');
        window.location.replace = ('cliente_login.php')
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
<body class="cliente_login">
    <form action="#" method="post" id="form">
        <div id="moldura">
    <label for="nome" class="rotulo">Nome:</label>
            <input type="text" class="campos" name="nome" placeholder="Nome..." required>
            <br>
            <label for="telefone" class="rotulo">Telefone:</label>
            <input type="number" class="campos" name="telefone" placeholder="Telefone..." required>
            <input type="submit" value="Entrar" class="botao">

            Não tem um cadastro? Clique <a href="cadastro.php">aqui</a>
</div>
        </form>
</body>
</html>