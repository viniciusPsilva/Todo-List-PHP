<?php

/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 22/03/2017
 * Time: 18:32
 */
require_once 'Controller.php';
class IndexController extends Controller {
    
    public function abrirIndex(){
        session_start();
        if (!isset($_SESSION['usuarioId'])){
            require_once '../view/index.php';
        }
    }

    public function getRoutes(){
        return [
            '' => 'abrirIndex'
        ];
    }


}