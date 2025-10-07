<?php
class Admin {
    private $id;
    private $senha;
    

    public function __construct($id, $senha) {
        $this->id = $id;
        $this->senha = $senha;
    }

    public function getId() {
        return $this->id;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function getSenha() {
        return $this->senha;
    }
    

    public function setId($id) {
        $this->id = $id;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    

    public function __toString() {
        return "<hr>
                <ul>
                    <li>ID: {$this->id} </li>
                    <li>Usuário: {$this->usuario} </li>
                    <li>Senha: {$this->senha} </li>
                    </ul>";
    }
}
?>