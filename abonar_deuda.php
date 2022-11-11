<?php 
require_once("index.php");
require_once(__DIR__.'/vendor/autoload.php');
use Controller\DeudaController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}?>

<div class="container">
    <section class="d-flex justify-content-center">
        <div class= "card col-sm-5 p-2">
            <button class = "btn btn-primary" ></button>
            <div class="mb-2">
                <hr>
                <h4>Abonar</h4>
                <hr>
            </div>
            <div class="mb-2">
                <form action="./deudas">
                    <div class="mb-2">
                        <label for="valor">Valor</label>
                        <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor">
                    </div>
                    <div class="mb-2">
                        <label for="valor">Fecha Abono</label>
                        <input type="text" name="Fecha_Abono" class="form-control" id="Fecha_Abono" placeholder="Fecha Abono">
                    </div>
                    <div class="mb-2">
                        <label for="valor">Observaciones</label>
                        <input type="text" name="Observaciones" class="form-control" id="Observaciones" placeholder="Observaciones">
                    </div>
                    <hr>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
                        <button action="./deudas" type="exit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Cancelar</button>
                </form>
            </div>
            <hr>
            <button class = "btn btn-primary" ></button>
        </div>
    </section>
</div>
