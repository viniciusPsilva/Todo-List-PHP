<?php
define('ROOT', '/todoListPhp/');
define('CONTROLLER', 'app/controller/');
define('VIEW', 'app/view/');

require_once "../util/Helper.php";

/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 21/03/2017
 * Time: 12:03
 */
abstract class Controller{

    public function getRoutes(){
        return [];
    }

    public function redirect($caminho){
        header('Location: '.ROOT.$caminho);
    }

     //retorana o caminho absoluto do projeto
    public static function url($caminho){
        return ROOT.$caminho;
    }

    static public function st($str){
        return strip_tags($str);
    }

}