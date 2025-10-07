<?php
require_once "../src/Cliente.php";
require_once "../src/ClienteDAO.php";

$bd = new ClienteDAO();

session_start();
if (isset($_SESSION["agenda"])) {
    $_SESSION["agenda"] = null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $data_agendada = $_POST["agenda"];

    $usuario = new Usuario(
        null,
        nome: $nome,
        telefone: $telefone,
        data_agendada: $data_agendada
    );

    $bd->salvar($usuario);
    $_SESSION["agenda"] = "Agendamento realizado com sucesso!";

    echo "<script>
        alert('{$_SESSION["agenda"]}');
        window.location.href = ('cliente_login.php')
        </script>";
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body class="cadastro">
    <div id="cabecario">
        <img src="../img/ec_logo.png" alt="logoEC" id="logo">
    </div>
    <main id="corpo">
        <form action="#" method="post" id="form-cadastro">
            <div id="moldura">
        
            <label for="nome" class="rotulo">Nome:</label>
            <input type="text" class="campos" name="nome" placeholder="Nome..." required>
            <br>
            <label for="telefone" class="rotulo">Telefone:</label>
            <input type="text" class="campos" name="telefone" placeholder="Telefone..." required>
            <br>
            <label for="data" class="rotulo">Data de agendamento:</label>
            <input type="date" class="campos" name="agenda" placeholder="Data de agendamento..." required>
            <br>
            <input type="submit" value="Cadastrar" class="botao">
        
            </div>
        </form>
    </main>
    <div id="rodape">
        <p>Desenvolvido por Equipe Elephant Contact&copy;</p>
    </div>
    
</body>
</html>