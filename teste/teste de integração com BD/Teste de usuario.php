<?php
require_once '../../app/model/Usuario.php';
require_once '../../app/dao/DaoUsuario.php';

$usuario = new Usuario();

$usuario->setNome("Usuario teste 01");
$usuario->setEmail("usuarioTeste01@email.com");
$usuario->setSenha("1234");

$daoUsuario = new DaoUsuario();

//insere um usuario no banco de dados 
$daoUsuario->inserir($usuario);

echo 'Passou no inserir Usuario';

/*
//lista todos os usuarios do banco de dados 
$daoUsuario->listar();*/

/*
//busca um usuario com id 1
$daoUsuario->buscar(1);*/

/*
$usuario->setNome("usuario teste 01 alterado");
$usuario->setEmail("usuarioTesteALTERADO@email.com");
$usuario->setSenha("alterado");
$daoUsuario->alterar($usuario);*/
