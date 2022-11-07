<?php
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;
class UsuarioController{
    public static function GetAllUsuario(){
        try{
            return UsuarioModel::GetAllUsuario("Select * from user ");
        }catch(PDOException $ex){
            Core::alert('Error', $ex->getMessage(),'./home');
        }
    }
}
