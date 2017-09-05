<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of TodoList
 *
 * @author Vinicius
 */
class TodoList {
    private $id;
    private $titulo;
    private $descrição;
    private $imagem;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        
    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescrição() {
        return $this->descrição;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescrição($descrição) {
        $this->descrição = $descrição;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }


    
    
}
