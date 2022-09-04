<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 

use PDOException;
use Core\Core;
use Model\PagosModel;
try{
    if(!is_null( $_POST['observacion']) && !is_null( $_POST['monto']) && !is_null($_POST['fecha'])){   
        $pagos = new PagosModel ();
        $pagos->observacion = Core::Sanitizar($_POST['observacion']);
        $pagos->monto = Core::Sanitizar( $_POST['monto']);
        $pagos->fecha = Core::Sanitizar($_POST['fecha']);
        $pagos->user = 1;
        if($pagos->AddPagos()){
            Core::alert('Correcto','Se ha guardado  el pago correctamente','./home');
        }else{
            Core::alert('Error','No se guardo el pago correctamente','./home');
        }
    }else{
        Core::alert('Error','Error de validacion','./home');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./home');
}
