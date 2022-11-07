<?php
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;
session_start();
try{
    if(!is_null( $_POST['id']) && !is_null( $_POST['documento']) && !is_null( $_POST['nombre_completo']) && !is_null( $_POST['password'])){   
        $usuarios = UsuarioModel::GetByid($_POST['id']);
        $usuarios->id= Core::Sanitizar($_POST['id']);
        $usuarios->documento= Core::Sanitizar($_POST['documento']);
        $usuarios->nombre_completo = Core::Sanitizar($_POST['nombre_completo']);
        $usuarios->password = Core::HashPassword( $_POST['password']);
        if($usuarios->UpdateUsuario()){
            Core::alert('Correcto','Se ha actualizado el usuario correctamente','./usuario');
        }else{
            Core::alert('Error','No se actualizó','./usuario');
        }
    }else{
        Core::alert('Error','Error de validacion','./usuario');
    }
}catch(PDOException $ex){
    Core::alert('Error ', $ex->getMessage(),'./usuario');
}