<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;

class PagosModel{

    static $TableName = "pagos"; 

    function __construct(){
        $this->id = "";
        $this->observacion = "";
        $this->monto = "";
        $this->fecha = "";
        $this->user = "";
    }
    public function AddPagos(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(observacion,monto,fecha,user)VALUES(:observacion,:monto,:fecha,:user)");
            $stmt->bindParam(':observacion', $this->observacion,PDO::PARAM_INT);
            $stmt->bindParam(':monto',  $this->monto,PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $stmt->bindParam(':user',  $this->user,PDO::PARAM_INT);
            if($stmt->execute()){
                $con->commit();
                $bool = true;            
            } else {
                $bool = false;   
            }
        }catch(PDOException $ex){
            $con->rollBack();
            echo "Excepcion controlada: ".$ex->getMessage();
        }
        finally{
            Database::Disconnect();
        }
        return $bool;  
    }
}