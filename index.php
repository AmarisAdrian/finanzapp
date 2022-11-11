<?php 
namespace index;
require_once(__DIR__.'/vendor/autoload.php'); 
use Core\Core;
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/font/css/font-awesome.min.css">
    <script src="asset/js/sweetalert2.all.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="asset/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Inicio</title>
    <title>FinanzApp</title>
  </head>
    <body class="bg-light">
    <?php session_start();
    if(isset($_SESSION['documento'])&&(isset($_SESSION['tiempo']))){
        $inactivo = 1200;
        $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo){        
          Core::redir_log("./salir");       
          exit();
        }else{
          require_once 'router.php';
        }  ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom text-light text-center">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="row justify-content-center  mx-auto ">
                <div class="navbar-nav">
                  <a class="text-white nav-link active" aria-current="page" href="home"><i class="fa fa-home" aria-hidden="true"></i> <b>Home</b></a>
                  <a class="text-white nav-link" href="ingresos"><i class="fa fa-usd" aria-hidden="true"></i> <b>Ingresos</b></a>
                  <a class="text-white nav-link" href="gastos-fijos"><i class="fa fa-bar-chart" aria-hidden="true"></i> <b>Gastos fijos</b></a>
                  <a class="text-white nav-link" href="deudas"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> <b>Deudas</b></a>
                  <a class="text-white nav-link" href="usuario"><i class="fa fa-user" aria-hidden="true"></i> <b>Usuarios</b></a>
                  <a class="text-white nav-link" href="salir"><i class="fa fa-sign-out" aria-hidden="true"></i> <b>Salir</b></a>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <br><br>
   <?php }else{ ?>
    <div class="container ">
      <div class="row">
          <div class="m-2 col-md-6 align-items-center justify-content-center mx-auto">
              <br><br>
                <div class="card border-light">
                  <div class="card-header bg-primary text-light"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</div>
                  <div class="card-body">
                  <form class="form-signin" accept-charset="UTF-8" id="frmlogin" name="frmlogin" role="form" method="POST" action="./login">
                    <div class="mb-3 input-group-lg">
                      <label for="usuario" class="form-label "><b>Usuario</b></label>
                      <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario">
                    </div>
                    <div class="mb-3 input-group-lg">
                      <label for="password" class="form-label"><b>Password</b></label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                  </form>
                </div>
             </div>
          </div>
        </div>
    </div>
 <?php } ?>
    <script src="asset/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script src="asset/js/datatable.js" crossorigin="anonymous"></script>
  </body>
</html>