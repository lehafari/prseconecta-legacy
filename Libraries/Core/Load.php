<?php

$controller = ucwords($controller);
$controller = str_replace('-', '_', $controller);
// Load // Con este codigo ya comunicamos con los controlladadores
$controllerfile = "Controllers/" . $controller . ".php";

if (file_exists($controllerfile)) {
    // Si existe, lo extraemos
    include $controllerfile;
    // Lo instanciamos
    $controller = new $controller();

    $method = str_replace('-', '_', $method);
    if (method_exists($controller, $method)) {
        $controller->$method($params);
    } else {
        require_once('Controllers/Error.php');
    }
} else {
    require_once('Controllers/Error.php');
}
