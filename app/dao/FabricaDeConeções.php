<?php
/**
 * Description of FabricaDeConeções
 *
 * @author Vinicius
 */
class FabricaDeConeções {

    public $HOST = "localhost";
    public $BANCO = "todolistPHP";
    public $SENHA = "root";
    public $USUARIO = "root";
    
    /**
     * Abre conexão com o banco de dados MYSQL
     * @return \dao\PDO
     */
    public function abrirConexao(){
        try{
            $pdo = new PDO("mysql:host=$this->HOST;dbname=$this->BANCO","$this->USUARIO","$this->SENHA");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (Exception $e ){
            exit("Não foi possível conectar com o banco de dados". $e->getMessage());
        }
    }

}
