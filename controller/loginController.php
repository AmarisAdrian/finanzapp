<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;

try{
    if(!is_null( $_POST['usuario']) && !is_null( $_POST['password'])){  
        if((isset($_POST["usuario"]))&&(isset($_POST["password"]))){
            if((is_numeric($_POST["usuario"])) && (ctype_alnum($_POST["password"]))){ 
                $Usuario = new UsuarioModel ();
                $Usuario->documento = Core::Sanitizar( $_POST['usuario']);
                $Usuario->password = Core::Sanitizar($_POST['password']);
                if($Usuario->Login()){
                    $usuario = UsuarioModel::GetByDocumento($Usuario->documento);
                    session_start();
                    $_SESSION['tiempo'] = time();
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['documento'] = $usuario->documento;
                    Core::redir_log('./home');
                } else{
                    Core::redir("Credenciales invalidas",'./home');
                }      
            }else{
                Core::redir("Campos invalidos",'./home');
            }          
        }else{
            Core::redir("Error de validacion",'./home');
        }  
    }else{
        Core::redir("No se pueden ingresar campos nulos",'./home');
    }  
}catch(PDOException $ex){
   Core::redir("Excepcion controlada",$ex->getMessage(),'./home');
}