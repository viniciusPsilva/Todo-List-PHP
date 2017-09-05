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
    
    //Abre uma coneção com o Banco de dados no construtor da classe
    public function __construct() {
        $this->fabricaConexao = new FabricaDeConeções();
        $this->conexao = $this->fabricaConexao->abrirConexao();
        
    }
    
    /**
     * cadastra  um usuário no Banco de dados 
     * @param Usuario $usuario
     */
     function inserir(Usuario $usuario){
        $SQL = "INSERT INTO usuario (nome,email,senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":nome",$usuario->getNome());
        $stmt->bindValue(":email",$usuario->getEmail());
        $stmt->bindValue(":senha",$usuario->getSenha());
        $stmt->execute();
    }
    
    /**
     * Busca um usuário no banco de dados passando o id como parametro de busca 
     * @param type $id
     * @return type
     */
    function buscar($id){
        $SLQ = "SELECT USUARIO WHERE idUsuario = :id";
        $stmt = $this->conexao->prepare($SLQ);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetch();
    }
    
    /**
     * Busca todos os usuario cadastrados no Banco de dados 
     * @return type
     */
    function listar(){
        $SQL = "SELECT * FROM USUARIO";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetchAll();   
    }
    
    /**
     * Deleta um usuário do Banco de dados enviando o id do usuário como parametro
     * @param type $id
     */
    function deletar($id){
        $SQL = "DELETE FROM USUARIO WHERE idUsuario = :id";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":id", $id);
        $stmt->execute();                  
    }
  
    /**
     * Altera o usuário no Banco de dados enviando um usuário como parametro
     * @param Usuario $usuario
     */
    function alterar(Usuario $usuario){
       $SQL = "UPDATE USUARIO SET nome = :nome, email = :email WHERE idUsuario = :id"; 
       $stmt = $this->conexao->prepare($SQL);
       $stmt->bindValue(":id", $usuario->getId());
       $stmt->bindValue(":nome", $usuario->getNome());
       $stmt->bindValue(":email", $usuario->getEmail());
       $stmt->execute();
    }
    
    /**
     * Altera a senha do usuario passsando um usuário como parametro 
     * @param Usuario $usuario
     */
    function alterarSenha(Usuario $usuario){
        $SQL = "UPDATE USUARIO SET senha = :senha where idUsuario = :id";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":id", $usuario->getId());
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->execute();
    }
    
    /**
     * metodo responsavel pela busca de login de um usuário passando como parametro email e senha 
     * @param string $email
     * @param string $senha
     * @return type
     */
    function login(string $email , string $senha){
        $SQL = "SELECT * FROM usuario WHERE senha = :senha AND email = :email";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetchObject(Usuario::class);   
    }    
}
