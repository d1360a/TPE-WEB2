<?php
require_once('./app/controller/news.controller.php');
require_once('./app/controller/auth.controller.php');
require_once('./app/controller/section.controller.php');

// tabla de ruteo para acceso publico
// listarNoticias -> showNews();
// detalleNoticia/:id -> detailNews($id);

// seccion -> showSectionPage($id);

// login -> showLogin();
// auth -> authenticateUser();


//tabla de ruteo para acceso administrador
// agregarNoticia -> addNews();
// eliminarNoticia/:id -> removeNews($id);
//editarNoticia/:id -> editNews($id);
// editarNoticia/:id -> insertNews($id);

// agregar-seccion -> addSection();
// seccion -> showSectionPage($id);

// logout-> logout();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'listarNoticias';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listarNoticias':
        $controller = new NewsController();
        $controller->showNews();
        break;
    case 'agregarNoticia':
        $controller = new NewsController();
        $controller->addNews();
        break;
    case 'eliminarNoticia':
        $controller = new NewsController();
        $controller->removeNews($params[1]);
        break;
    case 'editarNoticia':
        $controller = new NewsController();
        $controller->editNews($params[1]);
        break;
    case 'detalleNoticia':
        $controller = new NewsController();
        $controller->detailNews($params[1]);
        break;

    #secciones
    case 'eliminar-seccion':
        $controller = new SectionController();
        $controller->deleteSection($params[1]);
        break;
    case 'agregar-seccion':
        $controller = new SectionController();
        $controller->addSection();
        break;
    case 'mostrar-seccion':
        $controller = new SectionController();
        $controller->showSectionPage($params[1]);
        break;
    case 'editar-seccion':
        $controller = new SectionController();
        $controller->editSection($params[1]);
        break;

    #autenticacion
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->authenticateUser();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        break;
}