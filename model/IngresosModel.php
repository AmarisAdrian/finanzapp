<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;
use Core\Core;

class IngresosModel{

    static $TableName = "ingresos"; 

    function __construct(){
        $this->id = "";
        $this->nombre = "";
        $this->valor_ingreso = "";
        $this->fecha = "";
        $this->user = "";
    }
    public function Addingreso(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(nombre,valor_ingreso,fecha,user)VALUES(:nombre,:valor_ingreso,:fecha,:user)");
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':valor_ingreso',  $this->valor_ingreso,PDO::PARAM_INT);
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
            error_log("Excepcion controlada: ".$ex->getMessage());
        }
        finally{
            Database::Disconnect();
        }
        return $bool;  
    }
    public function UpdateIngresos(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("UPDATE ".self::$TableName." SET nombre=:nombre,valor_ingreso=:valor_ingreso,fecha=:fecha,user=:user where id=:id");
            $stmt->bindParam(':id', $this->id,PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':valor_ingreso',  $this->valor_ingreso,PDO::PARAM_INT);
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
    public static function GetAllIngresos($Sql){
        return Core::ExecuteQuery($Sql);
	}   
}