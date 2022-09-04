<?php 
namespace Controller;
require_once(__DIR__.'../../vendor/autoload.php'); 
use Core\Core;
if(isset($_SESSION)){
    session_destroy();
   // Core::redir_log("./?view=home");
}

?>