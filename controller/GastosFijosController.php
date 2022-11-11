<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\GastosFijosModel;
class GastosFijosController{
    public static function GetAllGastosFijos(){
        try{
            return GastosFijosModel::GetAllGastosFijos("Select * from gastos_fijos");
        }catch(PDOException $ex){
            Core::alert('Error ', $ex->getMessage(),'./home');
        }     
    }
}