<?php
require_once('./app/controller/news.controller.php');
require_once('./app/controller/auth.controller.php');
require_once('./app/controller/section.controller.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new NewsController();
        $controller->showNews();
        break;
    case 'agregar':
        $controller = new NewsController();
        $controller->addNews();
        break;
    case 'eliminar':
        $controller = new NewsController();
        $controller->removeNews($params[1]);
        break;
     case 'detalle':
        $controller = new NewsController();
        $controller->detailNews($params[1]);
        break;
    case 'agregar-seccion':
        $controller = new SectionController();
        $controller->addSection();
        break;
    case 'seccion':
        $controller = new SectionController();
        $controller->showSectionPage($params[1]);
        break;

    case 'login':
        $controller = new Auth_controller();
        $controller ->showLogin();
        break;
    case 'auth':
        $controller = new Auth_controller();
        $controller->authenticateUser();    
        break;
    case 'logout':
        $controller = new Auth_controller();
        $controller->logout();
        break;
    default: 
        break;
}