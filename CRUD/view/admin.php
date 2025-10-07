<?php
require_once '../src/ClienteDAO.php';
$dao = new ClienteDAO();
$clientes = $dao->listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body class="admin">
    <header id="cabecario">
        <h1>Sistema de Agendamento - Admin</h1>
        <div id="cabecario-conteudo">
       <a href="cadastro.php">Novo</a>
        <a href="index.php">Voltar</a>
        </div>
    </header>
    <main id="corpo">
    <div id="moldura">
        <table id="tabela">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Data Agendada</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clientes as $cliente): ?>
    <tr>
        <td><?php echo htmlspecialchars($cliente->getId()); ?></td>
        <td><?php echo htmlspecialchars($cliente->getNome()); ?></td>
        <td><?php echo htmlspecialchars($cliente->getTelefone()); ?></td>
        <td><?php echo htmlspecialchars($cliente->getDataAgendada()); ?></td>
        <td>
            <div class="acoes">
            <a href="alterar.php?id=<?php echo $cliente->getId(); ?>">Editar</a>
            <a href="excluir.php?id=<?php echo $cliente->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    </div>
    </main>
    <div id="rodape">
        <p>Desenvolvido por Equipe Elephant Contact&copy;</p>
    </div>
    
</body>
</html>