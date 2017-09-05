<?php
/**
 * Description of Usuario
 *
 * @author Vinicius
 */
class Usuario {
    private $idUsuario;
    private $nome;
    private $email;
    private $senha;
    
    public function getId() {
        return $this->idUsuario;
    }

    public function setId($id) {
        $this->idUsuario = $id;
    }

        
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }


}
