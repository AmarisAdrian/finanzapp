<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\DeudaModel;
class DeudaController{
    public static function GetAllDeuda(){
        try{
            return DeudaModel::GetAllDeuda("Select * from deuda");
        }catch(PDOException $ex){
            Core::alert('Error ', $ex->getMessage(),'./home');
        }     
    }
}