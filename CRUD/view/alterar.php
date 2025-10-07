<?php
require_once "../src/ClienteDAO.php";
require_once "../src/Cliente.php";
session_start();

$bd = new ClienteDAO();
$usuario = null;

// Carrega os dados do cliente para edição
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $usuario = $bd->listarPorId(intval($_GET["id"]));
}

// Processa o formulário de edição
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $data_agendada = $_POST["data_agendada"] ?? null;

    $usuario = new Usuario($id, $nome, $telefone, $data_agendada);

    try {
        if ($id != null && $id != "") {
            $bd->atualizar($usuario);
            $_SESSION["agenda"] = "Cadastro editado!";
        } else {
            $bd->salvar($usuario);
            $_SESSION["agenda"] = "Cadastro registrado!";
        }
        header("Location: admin.php");
        exit();
    } catch(Exception $erro) {
        $_SESSION["agenda"] = "Ocorreu algum erro.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro</title>
</head>
<body class="admin">
    <form action="#" method="post" id="form">
        <div id="moldura">
            <input type="hidden" name="id" value="<?php echo $usuario ? $usuario->getId() : ''; ?>">
            <label for="nome" class="rotulo">Nome:</label>
            <input type="text" class="campos" name="nome" placeholder="Nome..." required value="<?php echo $usuario ? $usuario->getNome() : ''; ?>">
            <br>
            <label for="telefone" class="rotulo">Telefone:</label>
            <input type="number" class="campos" name="telefone" placeholder="Telefone..." required value="<?php echo $usuario ? $usuario->getTelefone() : ''; ?>">
            <br>
            <label for="data_agendada" class="rotulo">Data Agendada:</label>
            <input type="date" class="campos" name="data_agendada" required value="<?php echo $usuario ? $usuario->getDataAgendada() : ''; ?>">
            <br>
            <input type="submit" value="Salvar" class="botao">
            <br>
        </div>
    </form>
</body>
</html>