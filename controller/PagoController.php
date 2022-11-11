<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
require_once("./index.php"); 
use PDOException;
use Core\Core;
use Model\PagosModel;
class PagoController{
    public static function GetAllPagos(){
        try{
            return PagosModel::GetAllPagos("Select * from pagos");
        }catch(PDOException $ex){
            Core::alert('Error ', $ex->getMessage(),'./home');
        }     
    }
}
