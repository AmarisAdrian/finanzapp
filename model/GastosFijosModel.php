<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;
use Core\Core;

class GastosFijosModel{

    static $TableName = "gastos_fijos"; 

    function __construct(){
        $this->id = "";
        $this->nombre = "";
        $this->mes_ciclo = "";
        $this->observaciones = "";
        $this->valor = "";
    }
    public function AddGastosFijos(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(nombre,mes_ciclo,observaciones,valor)VALUES(:nombre,:mes_ciclo,:observaciones,:valor)");
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':mes_ciclo',  $this->mes_ciclo,PDO::PARAM_INT);
            $stmt->bindParam(':observaciones', $this->observaciones, PDO::PARAM_STR);
            $stmt->bindParam(':valor', $this->valor, PDO::PARAM_INT);
            if($stmt->execute()){
                $con->commit();
                $bool = true;            
            } else {
                $bool = false;   
            }
        }catch(PDOException $ex){
            $con->rollBack();
            error_log("Excepcion controlada: ".$ex->getMessage());
        }
        finally{
            Database::Disconnect();
        }
        return $bool;  
    }
    public function UpdateGastosFijos(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("UPDATE ".self::$TableName." SET nombre=:nombre,mes_ciclo=:mes_ciclo,observaciones=:observaciones,valor=:valor where id=:id");
            $stmt->bindParam(':id', $this->id,PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':mes_ciclo',  $this->mes_ciclo,PDO::PARAM_INT);
            $stmt->bindParam(':observaciones', $this->observaciones, PDO::PARAM_STR);
            $stmt->bindParam(':valor', $this->valor, PDO::PARAM_INT);
            if($stmt->execute()){
                $con->commit();
                $bool = true;            
            } else {
                $bool = false;   
            }
        }catch(PDOException $ex){
            $con->rollBack();
             error_log("Excepcion controlada: ".$ex->getMessage());
        }
        finally{
            Database::Disconnect();
        }
        return $bool;  
    }
    public static function GetById($id){
        $Database = new Database();
		$con = $Database->Connect();
        $sql = "select * from ".self::$TableName." where id=:id";
		$sql = Core::Sanitizar($sql);
		try {
			if (!is_null($con) || !empty($con) ){
				$query = $con->prepare($sql);
                $query->bindParam(':id',$id,PDO::PARAM_INT);
				if($query->execute()){
					if($query->rowCount() > 0){
						$data = $query->fetchObject(self::class);
					}else {
						return false;
					}	
				}  
			}
		} catch(PDOException $ex){
			$data = "Excepcion controlada: ".$ex->getMessage();
		}
		return $data;	
     }
    public static function GetAllGastosFijos($Sql){
        return Core::ExecuteQuery($Sql);
	}   
}