<?php
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\GastosFijosModel;
session_start();
try{
    if(!is_null( $_POST['id']) && !is_null( $_POST['nombre']) && !is_null( $_POST['mes_ciclo']) && !is_null($_POST['observaciones'])&& !is_null($_POST['valor'])){   
        $gastos = GastosFijosModel::GetById($_POST['id']);
        $gastos->id= Core::Sanitizar($_POST['id']);
        $gastos->nombre = Core::Sanitizar($_POST['nombre']);
        $gastos->mes_ciclo = Core::Sanitizar( $_POST['mes_ciclo']);
        $gastos->observaciones = Core::Sanitizar($_POST['observaciones']);
        $gastos->valor = Core::Sanitizar($_POST['valor']);
        if($gastos->UpdateGastosFijos()){
            Core::alert('Correcto','Se ha actualizado el gasto correctamente','./gastos-fijos');
        }else{
            Core::alert('Error','No se actualizó','./gastos-fijos');
        }
    }else{
        Core::alert('Error','Error de validacion','./gastos-fijos');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./gastos-fijos');
}
