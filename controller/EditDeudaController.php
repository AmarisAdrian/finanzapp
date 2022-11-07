<?php
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\DeudaModel;
session_start();
try{
    if(!is_null( $_POST['id']) && !is_null( $_POST['nombre']) && !is_null( $_POST['deuda_total']) && !is_null( $_POST['valor_cuota']) && !is_null( $_POST['total_cuota']) && !is_null($_POST['fecha'])){   
        $deudas = DeudaModel::GetById($_POST['id']);
        $deudas->id= Core::Sanitizar($_POST['id']);
        $deudas->nombre = Core::Sanitizar($_POST['nombre']);
        $deudas->deuda_total = Core::Sanitizar( $_POST['deuda_total']);
        $deudas->valor_cuota = Core::Sanitizar( $_POST['valor_cuota']);
        $deudas->total_cuota = Core::Sanitizar( $_POST['total_cuota']);
        $deudas->fecha = Core::Sanitizar($_POST['fecha']);
        $deudas->user = $_SESSION["id"];
        if($deudas->UpdateDeuda()){
            Core::alert('Correcto','Se ha actualizado la deuda correctamente','./deudas');
        }else{
            Core::alert('Error','No se actualizó','./deudas');
        }
    }else{
        Core::alert('Error','Error de validacion','./deudas');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./deudas');
}
