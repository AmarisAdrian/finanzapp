<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;
use Core\Core;

class UsuarioModel{

    static $TableName = "user"; 
    
    function __construct(){
        $this->id ="";
        $this->documento ="";
        $this->nombre_completo="";
        $this->password="";
    }
    public function AddUsuario(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(documento,nombre_completo,password)VALUES(:documento,:nombre_completo,:password)");
            $stmt->bindParam(':documento', $this->documento,PDO::PARAM_INT);
            $stmt->bindParam(':nombre_completo',  $this->nombre_completo,PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
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
    public function UpdateUsuario(){
        $bool = false;
        try {
            $Database = new Database();
            $con = $Database->Connect();
            $con->beginTransaction();
            $stmt = $con->prepare("UPDATE ".self::$TableName." SET documento=:documento,nombre_completo=:nombre_completo,password=:password where id=:id");
            $stmt->bindParam(':id', $this->id,PDO::PARAM_INT);
            $stmt->bindParam(':documento', $this->documento,PDO::PARAM_INT);
            $stmt->bindParam(':nombre_completo',  $this->nombre_completo,PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
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
    public static function GetAllUsuario($Sql){
        return Core::ExecuteQuery($Sql);
	}   
    public function Login(){
        try {
            $Sw = self::GetUserLogin($this->documento ,$this->password);
            if($Sw!=null || $Sw!=false){
                $sw = true;        
            }else if($Sw==false || ($Sw==null)){   
                $sw = false;                                                            
            }
        } catch(PDOException $ex){
            return "Excepcion controlada: ".$ex->getMessage();
        }
        return $sw;
    }
    public static function GetUserLogin($noDocumento,$password){
        $user =  self::GetByDocumento($noDocumento);
        try {
            if($user){             
               $password = Core::HashVerifyPassword($password,$user->password);
                if($password){
                    return self::GetByDocumento($noDocumento);
                } 
            }
        } catch(PDOException $ex){
			return "Excepcion controlada: ".$ex->getMessage();
		}
        return false;
       
     }
    public static function GetByDocumento($noDocumento){
        $Database = new Database();
		$con = $Database->Connect();
        $sql = "select * from ".self::$TableName." where documento=:documento";
		$sql = Core::Sanitizar($sql);
		try {
			if (!is_null($con) || !empty($con) ){
				$query = $con->prepare($sql);
                $query->bindParam(':documento',$noDocumento,PDO::PARAM_INT);
				if($query->execute()){
					if($query->rowCount() > 0){
						$data = $query->fetch(PDO::FETCH_OBJ);
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
     public static function GetByid($id){
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
} 