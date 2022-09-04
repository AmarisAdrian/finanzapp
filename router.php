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
    $router->post('/addpagocontroller', function() {   
        require_once('./controller/AddPagoController.php');
    });
});
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "Error 404. La ruta no existe"; 
});
$router->run();
