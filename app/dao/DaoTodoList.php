<?php
require_once '../model/TodoList.php';
require_once '../dao/FabricaDeConeções.php';
class DaoTodoList {
    private $fabricaConexoes;
    private $conexao;
    
    public function __construct() {
        $this->fabricaConexoes = new FabricaDeConeções();
        $this->conexao = $this->fabricaConexoes->abrirConexao();
    }
    /**
     * Insete um todolist no banco de dados
     * @param TodoList $todo
     */
    function inserir(model\TodoList $todo){
        $SQL = "INSERT INTO todolist (titulo, descricao, imagem, usuario) VALUES(:titulo, :descricao, :imagem, :usuario)";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":titulo", $todo->getTitulo());
        $stmt->bindValue(":descricao", $todo->getDescrição());
        $stmt->bindValue(":imagem", $todo->getImagem());
        $stmt->bindValue(":usuario", $todo->getIdUsuario());
        $stmt->execute();
    }
    
    /**
     * busca um todolist do Banco de dados passando com parametro um id
     * @param $id
     */
    function buscar($id){
        $SQL = "SELECT * FROM todolist where id = :id";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetchObject();
    }
    
    /**
     * Busca todos os todolist do banco de dados passando como parametro o id do usuario logado
     * @param type $idUsuario
     * @return type
     */
    function listar ($idUsuario){
        $SLQ = "SELECT * FROM todolist WHERE usuario = :idUsuario";
        $stmt = $this->conexao->prepare($SLQ);
        $stmt->bindValue(":idUsuario", $idUsuario);
        $stmt->execute();
        $this->conexao = null;
        return $stmt->fetchAll();
    }
    
    /**
     * Deleta do banco de dados o todolist passando como parametro um id 
     * @param type $id
     */
    function deletar($id){
        $SQL = "DELETE FROM todolist WHERE id = :idTodoList";
        $stmt = $this->conexao->prepare($SQL);
        $stmt->bindValue("idTodoList", $id);
        $stmt->execute();
    }
    /**
     * Altera os todo list passando como parametro o novo todo list 
     * @param model\TodoList $todo
     */
    function alterar(model\TodoList $todo){
        $SLQ = "UPDATE todolist SET titulo = :titulo, descricao = :descricao, imagem = :imagem WHERE id = :id";
        $stmt = $this->conexao->prepare($SLQ);
        $stmt->bindValue(":id", $todo->getId());
        $stmt->bindValue(":titulo", $todo->getTitulo());
        $stmt->bindValue(":descricao", $todo->getDescrição());
        $stmt->bindValue(":imagem", $todo->getImagem());
        $stmt->execute();
    }
}