<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
use PDOException;
use Core\Core;
use Model\UsuarioModel;

class LoginController {

    public function __construct(){
        $this->id = "";
        $this->documento = "";
        $this->nombre_completo = "";
        $this->password = "";

    }
    public function LoginController(){
        try{
            $Usuario = new UsuarioModel ();
            $Usuario->documento = Core::Sanitizar($this->documento);
            $Usuario->password = Core::Sanitizar($this->password );
            if($Usuario->Login()){
                $data = Core::Serializer("login ok",true,201);
            }else{
               $data = Core::Serializer("Usuario o password incorrectos",false,201);
            }
        }catch(PDOException $ex){
           $data =  Core::Serializer("Excepcion controlada",$ex->getMessage(),500);
        }
        return $data;
    }
    public static function GetAllClienteController(){
        try{
            return UsuarioModel::GetAllUsuario("select * from user");  
        }catch(PDOException $ex){
            return Core::Serializer("Excepcion controlada: ",$ex->getMessage(),500);
        } 
    }
}
