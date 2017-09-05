<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .  "bookshelf" . DIRECTORY_SEPARATOR);
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 13/03/2017
 * Time: 17:47
 */
abstract class Info{
   const HTTP_HOST = "192.168.2.84";
   const DB_HOST = "localhost";

    public static function req_once($arq){
        require_once  ROOT . $arq;
    }

    public static function req($arq){
        require  ROOT . $arq;
    }
}