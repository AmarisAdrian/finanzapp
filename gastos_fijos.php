<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php'); 
use Controller\DeudaController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}?>