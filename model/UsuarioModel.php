<?php 
namespace Model;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDO,PDOException;
use Core\Database;
use Core\Core;

class UsuarioModel{

    static $TableName = "user"; 
    function __construct(){
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
            $stmt = $con->prepare("INSERT INTO ".self::$TableName."(documento, nombre_completo,password)VALUES(:documento,:nombre_completo,:password)");
            $stmt->bindParam(':documento', $this->Documento,PDO::PARAM_INT);
            $stmt->bindParam(':nombre_completo',  $this->Nombre,PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->Apellido, PDO::PARAM_STR);
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
    public static function GetAllUsuario($Sql){
        return Core::ExecuteQuery($Sql);
	}   
    public function Login(){
        $Sw = self::GetUserLogin($this->documento ,$this->password);
        if($Sw!=null || $Sw!=false){
            $_SESSION['tiempo'] = time();
            $_SESSION['noDocumento'] = $Sw->noDocumento;
            $sw = true;        
        }else if($Sw==false || ($Sw==null)){   
            $sw = true;                                                            
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
						$data = $query->fetchAll(PDO::FETCH_ASSOC);
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