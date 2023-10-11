<?php
require_once('app/controller/news.controller.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        break;
    case 'agregar':
        break;
    case 'eliminar':
        break;
    case 'editar':
        break;
    //case 'login':
    //    break;
    //case 'auth':
    //    break;
    //case 'logout':
    //    break;
    default: 
        //echo "404 Page Not Found";
        break;
}