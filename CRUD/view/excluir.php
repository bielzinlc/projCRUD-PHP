<?php

if( isset($_GET["id"]) ) {
    require_once "../src/ClienteDAO.php";
    $bd = new ClienteDAO();
    $id = intval( $_GET["id"] );
    
    try {
        $bd->excluir($id);
        echo "<script>
                alert('✅ Cadastro excluído!');
                window.location.replace('admin.php');
            </script>";
    } catch(Exception $erro) {
        echo "<script>
                alert('❌ Ocorreu algum erro...');
                window.location.replace('index.php');
            </script>";
    }

} else {
    header("location: index.php");
}