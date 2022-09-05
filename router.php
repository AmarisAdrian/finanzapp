<?php 
namespace Url;
require_once(__DIR__.'/vendor/autoload.php'); 
use Core\Router;
$router = new Router();

$router->mount('', function() use ($router) {
    $router->get('/index', function() {   
        require_once('index.php');
    });
    $router->get('/home', function() {   
        require_once('landing.php');
    });
    $router->get('/usuario', function() {   
        require_once('usuario.php');
    });
    $router->get('/landing', function() {   
        require_once('landing.php');
    });
    $router->get('/salir', function() {   
        require_once('salir.php');
    });
    $router->post('/login', function() {   
        require_once('./controller/loginController.php');
    });
    $router->post('/addpagocontroller', function() {   
        require_once('./controller/AddPagoController.php');
    });
    $router->post('/editarpagocontroller', function() {   
        require_once('./controller/EditPagoController.php');
    });
});
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "ERROR 404 . La pagina no existe";
});
$router->run();
