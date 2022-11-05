<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\IngresosModel;
session_start();
try{
    if(!is_null( $_POST['nombre']) && !is_null( $_POST['valor_ingreso']) && !is_null($_POST['fecha'])){   
        $ingresos = new IngresosModel ();
        $ingresos->nombre = Core::Sanitizar($_POST['nombre']);
        $ingresos->valor_ingreso = Core::Sanitizar( $_POST['valor_ingreso']);
        $ingresos->fecha = Core::Sanitizar($_POST['fecha']);
        $ingresos->user = $_SESSION["id"];
        if($ingresos->Addingreso()){
            Core::alert('Correcto','Se ha guardado  el ingreso correctamente','./ingresos');
        }else{
            Core::alert('Error','No se guardo el ingreso correctamente','./ingresos');
        }
    }else{
        Core::alert('Error','Error de validacion','./ingresos');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./ingresos');
}
