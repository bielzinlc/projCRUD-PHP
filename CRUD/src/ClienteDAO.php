<?php 
require_once 'ConexaoBD.php';
require_once 'Cliente.php';
require_once 'Admin.php';

class ClienteDAO {
    private $con;
    private $table = "cliente";
    private $id = "id_cliente";

    private function getCon() {
        $bd = new ConexaoBD();
        $this->con = $bd->getMysqli();
        return $this->con;
    }

    public function salvar(Usuario $usuario) {
        $sql = "INSERT INTO {$this->table} (nome, telefone, data_agendada) VALUES (
        '{$usuario->getNome()}',
        '{$usuario->getTelefone()}',
        '{$usuario->getDataAgendada()}')";
       
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();

        return $status;
    }

    public function listarPorId($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id} = {$id}";
        $resultado = $this->getCon()->query($sql);
        $this->getCon()->close();

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $usuario = new Usuario(
                $linha['id_cliente'],
                $linha['nome'],
                $linha['telefone'],
                $linha['data_agendada']
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public function listarTodos() {
        $sql = "SELECT * FROM {$this->table}";
        $resultado = $this->getCon()->query($sql);
        

        $usuarios = [];
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $usuario = new Usuario(
                    $linha['id_cliente'],
                    $linha['nome'],
                    $linha['telefone'],
                    $linha['data_agendada']
                );
                $usuarios[] = $usuario;
            }
        }
        $this->getCon()->close();
        return $usuarios;
    }

    public function buscarPorNome($nome, $telefone) {
        $sql = "SELECT * FROM {$this->table} WHERE nome = '{$nome}' AND telefone = '{$telefone}'";
        $resultado = $this->getCon()->query($sql);
        $this->getCon()->close();

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $usuario = new Usuario(
                $linha['id_cliente'],
                $linha['nome'],
                $linha['telefone'],
                $linha['data_agendada']
            );
            return $usuario;
        } else {
            return null;
        }
    }
    public function excluir($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = {$id}";
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }
    public function atualizar(Usuario $usuario)
     {
        $sql = "UPDATE {$this->table} SET 
                nome = '{$usuario->getNome()}',
                telefone = '{$usuario->getTelefone()}',
                data_agendada = '{$usuario->getDataAgendada()}'
                WHERE {$this->id} = {$usuario->getId()}";
        
        $status = $this->getCon()->query($sql);
        $this->getCon()->close();
        return $status;
    }
}