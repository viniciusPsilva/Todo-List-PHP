<?php
//obtem a url do sistema e coloca em um array separado por " / "
$uriInfo = explode('/', $_SERVER['REQUEST_URI']);
//pega o nome do controller na posição [2] da url
$controller = isset($uriInfo[2]) ? trim($uriInfo[2]) : null;
//pega a ação(metodo do controller) na posição 3 do array
$acaoGet = (isset($uriInfo[3])&& $uriInfo!=="") ? trim($uriInfo[3]) : '';

$posicao = strpos($acaoGet,'?');

if ($posicao){
    $acao = substr($acaoGet, 0, $posicao);
} else {
    $acao = $acaoGet;
}
$args = [];
// Pegando os argumentos passados depois da ação
for ($i = 4; $i < count($uriInfo);$i++){
    $posicao = strpos($uriInfo[$i], '?');
    if ($posicao){
        $args[] = substr($uriInfo[$i],0, $posicao);
        break;
    }
}
// Ve se o controller foi informado
$posicao = strpos($controller,'?');
if ($posicao !== false){
    $controller = substr($controller, 0, $posicao);
}
if (!isset($controller) || empty($controller)){
    $controller = 'index';
}
// Trazendo o controller
$file = ucfirst($controller).'Controller.php';
if (!file_exists($file)){
    header('HTTP/1.0 404 not found');
    die();
}
require_once $file;
// Instancionad o oc ontroller
$classeReflection = new ReflectionClass($controller.'Controller');
$objController = $classeReflection->newInstance();
// Vendo se ele realmente é um controller
require_once '../controller/Controller.php';
if (!($objController instanceof Controller)){
    header('HTTP/1.0 404 not found');
    die();
}
// Chamando método do controller 
$rotas = $objController->getRoutes();
if (isset($rotas[$acao])){
    $classeReflection->getMethod($rotas[$acao])->invoke($objController);
} else {
    $classeReflection->getMethod($acao)->invoke($objController);
}

