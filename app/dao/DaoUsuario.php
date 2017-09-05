<?php
/**
 * Description of DaoUsuario
 *
 * @author Vinicius
 */
require_once '../model/Usuario.php';
require_once '../dao/FabricaDeConeções.php';
class DaoUsuario {
  
    private $fabricaConexao;
    private $conexao;
    
    public function __construct() {
        $this->fabricaConexao = new FabricaDeConeções();
        $this->conexao = $this->fabricaConexao->abrirConexao();
        
    }
    
     function inserir(Usuario $usuario){
        $SQL = "INSERT INTO usuario (nome,email,senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":nome",$usuario->getNome());
        $stmt->bindValue(":email",$usuario->getEmail());
        $stmt->bindValue(":senha",$usuario->getSenha());
        $stmt->execute();
    }
    
    function buscar($id){
        $SLQ = "SELECT USUARIO WHERE idUsuario = :id";
        $stmt = $this->conexao->prepare($SLQ);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetch();
    }
    
    function listar(){
        $SQL = "SELECT * FROM USUARIO";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetchAll();   
    }
    
    function deletar($id){
        $SQL = "DELETE FROM USUARIO WHERE idUsuario = :id";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":id", $id);
        $stmt->execute();                  
    }
  
    function alterar(Usuario $usuario){
       $SQL = "UPDATE USUARIO SET nome = :nome, email = :email WHERE idUsuario = :id"; 
       $stmt = $this->conexao->prepare($SQL);
       $stmt->bindValue(":id", $usuario->getId());
       $stmt->bindValue(":nome", $usuario->getNome());
       $stmt->bindValue(":email", $usuario->getEmail());
       $stmt->execute();
    }
    
    function alterarSenha(Usuario $usuario){
        $SQL = "UPDATE USUARIO SET senha = :senha where idUsuario = :id";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":id", $usuario->getId());
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->execute();
    }
    
    function login(string $email , string $senha){
        $SQL = "SELECT * FROM usuario WHERE senha = :senha AND email = :email";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetchObject(Usuario::class);   
    }
    

    
}
