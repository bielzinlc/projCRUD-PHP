<?php 
require_once 'ConexaoBD.php';
require_once 'Admin.php';

class AdminDAO {
    private $con;
    private $table = "admin";
    private $id = "id_admin";

    private function getCon() {
        $bd = new ConexaoBD();
        $this->con = $bd->getMysqli();
        return $this->con;
    }
    
    public function login($usuario, $senha)
    {
        $sql = "SELECT * FROM {$this->table} WHERE usuario = '{$usuario}' AND senha = '{$senha}' ";
        $resultado = $this->getCon()->query($sql);
        $this->getCon()->close();

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $admin = new Admin(
                $linha['usuario'],
                $linha['senha']
            );
            return $admin;
        } else {
            return null;
        }
    }

}