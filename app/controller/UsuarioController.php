<?php

/**
 * Description of UsuarioController
 *
 * @author Vinicius
 */
require './Controller.php';
require_once '../dao/DaoUsuario.php';

class UsuarioController extends Controller {

    /**
     * abre a tela de cadastro sa aplicação
     */
    public function abrirTelaCadastro() {
        require_once '../view/usuario/cadastroUsuario.php';
    }

    /**
     * cadastra um novo usuario na aplicação
     * @return type
     */
    public function cadastrar() {
        //Pega os dados do usuario
        $usuario = $this->getUsuario();
        //testa se o usuario enviado é válido    
        if ($this->validarUsuario($usuario, 'cadastro')) {
            $daoUsuario = new DaoUsuario();
            try {
                $daoUsuario->inserir($usuario);
                $this->setUserSession($daoUsuario->login($usuario->getEmail(), $usuario->getSenha()));
                return $this->redirect('/');
            } catch (Exception $ex) {
                $erro = "Já existe um usuário com esse email";
                require_once '../view/usuario/cadastroUsuario.php';
            }
        } else {
            $erro = "Erro ao cadastrar-se verifique os dados informados";
            require_once '../view/usuario/cadastroUsuario.php';
        }
    }

    /**
     * abre a tela de login
     */
    public function abrirLogin() {
        require_once '../view/usuario/login.php';
    }

    /**
     * Faz o login do usuario na aplicação
     * @return type
     */
    public function login() {
        $dao = new DaoUsuario();
        $usuario = $this->getUsuario();

        if ($this->validarUsuario($usuario, 'login')) {
            $usuarioBuscado = $dao->login($usuario->getEmail(), $usuario->getSenha());
            if ($usuarioBuscado != null) {
                //redireciona o usuario para as telas com as todo list 
                $this->setUserSession($usuarioBuscado);
                return $this->redirect('');
            } else {
                $erro = "Email ou senha inválido";
                require_once '../view/usuario/login.php';
            }
        } else {
            $erro = "Preencha corretamente os campos";
                require_once '../view/usuario/login.php';
        }
    }

    /**
     * Coloca os dados do usuario na sessão 
     * @param Usuario $usuario
     */
    public function setUserSession(Usuario $usuario) {
        session_start();
        $_SESSION['idUsuario'] = $usuario->getId();
        $_SESSION['nomeUsuario'] = $usuario->getNome();
    }

    /**
     * faz logOff na aplicação
     * @return type
     */
    public function sair() {
        session_start();
        session_destroy();
        return $this->redirect('index');
    }

    /**
     * pega os dados do Usuario enviados através de um form via POST
     * @return \Usuario
     */
    public function getUsuario() {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        return $usuario;
    }

    /**
     * 
     * @param Usuario $usuario
     * @param String $opcao
     * @return boolean
     * @throws RuntimeException
     */
    public function validarUsuario(Usuario $usuario, String $opcao) {

        if ($opcao === null || empty($opcao)) {
            throw new RuntimeException('O metodo validarUsuario espera receber uma string opção');
        }

        if ($opcao === 'cadastro') {
            if ($usuario->getEmail() === null || $usuario->getNome() === null || $usuario->getSenha() === null) {
                return false;
            } elseif (empty($usuario->getNome()) || empty($usuario->getEmail()) || empty($usuario->getSenha())) {
                return false;
            } else {
                return true;
            }
        } elseif ($opcao === 'login') {
            if (is_null($usuario->getEmail()) || is_null($usuario->getSenha())) {
                return false;
            } elseif (empty($usuario->getEmail()) || empty($usuario->getSenha())) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getRoutes() {
        return [
            "/" => "index"
        ];
    }

}
