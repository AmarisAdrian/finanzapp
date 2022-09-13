<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\PagosModel;
session_start();
try{
    if(!is_null( $_POST['id']) && !is_null( $_POST['observacion']) && !is_null( $_POST['monto']) && !is_null($_POST['fecha'])){   
        $pagos = PagosModel::GetById($_POST['id']);
        $pagos->id= Core::Sanitizar($_POST['id']);
        $pagos->observacion= Core::Sanitizar($_POST['observacion']);
        $pagos->monto= Core::Sanitizar( $_POST['monto']);
        $pagos->fecha= Core::Sanitizar($_POST['fecha']);
        $pagos->user = $_SESSION["id"];
        if($pagos->UpdatePago()){
            Core::alert('Correcto','Se ha actualizado el pago correctamente','./home');
        }else{
            Core::alert('Error','No se actualizó','./home');
        }
    }else{
        Core::alert('Error','Error de validacion','./home');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./home');
}
