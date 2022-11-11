<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;
use Core\Core;

class DeudaModel{

    static $TableName = "deuda"; 

    function __construct(){
        
    }
    public function AddDeuda(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(nombre,deuda_total,valor_cuota,total_cuota,fecha,user)VALUES(:nombre,:deuda_total,:valor_cuota,:total_cuota,:fecha,:user)");
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':deuda_total',  $this->deuda_total,PDO::PARAM_INT);
            $stmt->bindParam(':valor_cuota', $this->valor_cuota, PDO::PARAM_INT);
            $stmt->bindParam(':total_cuota',  $this->total_cuota,PDO::PARAM_INT);
            $stmt->bindParam(':fecha',  $this->fecha,PDO::PARAM_STR);
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
    public function UpdateDeuda(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("UPDATE ".self::$TableName." SET nombre=:nombre,deuda_total=:deuda_total,valor_cuota=:valor_cuota,total_cuota=:total_cuota,fecha=:fecha, user=:user where id=:id");
            $stmt->bindParam(':id', $this->id,PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre,PDO::PARAM_STR);
            $stmt->bindParam(':deuda_total',  $this->deuda_total,PDO::PARAM_INT);
            $stmt->bindParam(':valor_cuota', $this->valor_cuota, PDO::PARAM_INT);
            $stmt->bindParam(':total_cuota',  $this->total_cuota,PDO::PARAM_INT);
            $stmt->bindParam(':fecha',  $this->fecha,PDO::PARAM_STR);
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
    public static function GetAllDeuda($Sql){
        return Core::ExecuteQuery($Sql);
	}   
}