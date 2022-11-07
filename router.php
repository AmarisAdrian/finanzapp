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
    $router->get('/ingresos', function() {   
        require_once('ingresos.php');
    });
    $router->get('/deudas', function() {   
        require_once('deudas.php');
    });
    $router->get('/gastos-fijos', function() {   
        require_once('gastos_fijos.php');
    });
    $router->get('/abonar/(\w+)', function($name) {
        require_once('abonar_deuda.php');
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
    $router->post('/addingresocontroller', function() {   
        require_once('./controller/AddIngresoController.php');
    });
    $router->post('/editingresocontroller', function() {   
        require_once('./controller/EditIngresoController.php');
    });
    $router->post('/addusuariocontroller', function() {   
        require_once('./controller/AddUsuarioController.php');
    });
    $router->post('/editusuariocontroller', function() {   
        require_once('./controller/EditUsuarioController.php');
    });
    $router->post('/adddeudacontroller', function() {   
        require_once('./controller/AddDeudaController.php');
    });
    $router->post('/editdeudacontroller', function() {   
        require_once('./controller/EditDeudaController.php');
    });

});
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "ERROR 404 . La pagina no existe";
});
$router->run();
