<?php
class Usuario {
    private $id;
    private $nome;
    private $telefone;
    private $data_agendada;

    public function __construct($id, $nome, $telefone, $data_agendada) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->data_agendada = $data_agendada;
    }

    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function getDataAgendada() {
        return $this->data_agendada;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function setDataAgendada($data_agendada) {
        $this->data_agendada = $data_agendada;
    }

    public function __toString() {
        return "<hr>
                <ul>
                    <li>Nome: {$this->nome} </li>
                    <li>Telefone: {$this->telefone} </li>
                    <li>Data Agendada: {$this->data_agendada} </li>
                </ul>";
    }
}
?>