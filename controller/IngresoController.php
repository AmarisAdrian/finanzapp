<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\IngresosModel;
class IngresoController{
    public static function GetAllIngresos(){
        try{
            return IngresosModel::GetAllIngresos("Select * from ingresos");
        }catch(PDOException $ex){
            Core::alert('Error ', $ex->getMessage(),'./home');
        }     
    }
}
