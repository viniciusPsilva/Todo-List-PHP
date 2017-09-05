<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TesteController
 *
 * @author Vinicius
 */
require_once './Controller.php';

class TesteController extends Controller {

    public function testeUsuario() {

        echo '<h1>estou testando o usuario</h1><br/>';

        require_once '../../app/model/Usuario.php';
        require_once '../../app/dao/DaoUsuario.php';

        $usuario = new Usuario();


        $usuario->setNome("usuario teste");
        $usuario->setEmail("teste02@email.com");
        $usuario->setSenha("1234");

        $daoUsuario = new DaoUsuario();
        
        $usuarioLogado = $daoUsuario->login($usuario->getEmail(), $usuario->getSenha());
        
        echo '<h1>Usuario Logado</h1><hr/>';
        echo 'ID :'.$usuarioLogado->getId()."<br/>";
        echo 'NOME :'.$usuarioLogado->getNome()."<br/>";
        echo 'EMAIL :'.$usuarioLogado->getEmail()."<br/>";
        echo 'SENHA :'.$usuarioLogado->getSenha()."<br/>";
        die();
        

        /* insere um usuario no banco e dados 
          $daoUsuario->inserir($usuario) */

        /* lista todos os usuarios do banco de dados  
          $listUsuario = $daoUsuario->listar();
          $usuario = new Usuario();
          echo '<h3>Usuarios do banco de dados: </h3><br/>';
          foreach ($listUsuario as $u) {
          echo $u[1]."<br/>";
          } */

        /* busca um usuario com id 1
          echo "teste buscar usuario<br/>";
          $u = $daoUsuario->buscar(2);
          echo $u[1]; */


       // $daoUsuario->alterarSenha($usuario);
    }
    
    public function testeTodoList(){
        require_once '../../app/model/TodoList.php';
        require_once '../../app/dao/DaoTodoList.php';
        
        $todo =  new model\TodoList();
        $todo->setId(2);
        $todo->setTitulo("Teste Alterado");
        $todo->setDescrição("Descricao Teste Alterado");
        $todo->setImagem("img teste alterado");
        $todo->setIdUsuario(2);
        
        $dao = new DaoTodoList();
        //$dao->inserir($todo);
       // $dao->alterar($todo);
        
        echo 'Passou no Deletar'.'<br/>';
        /*
          $listTodo = $dao->listar(2);
          foreach ($listTodo as $t){
              echo "id: $t[0]  Titulo : $t[1]"."<br/>";
          }
          */
            $dao->deletar(3);
        
        die();
        
    }

    public function getRoutes() {
        return [
            '' => 'abrirIndex'
        ];
    }

}
