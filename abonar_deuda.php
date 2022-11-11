<?php 
require_once("index.php");
require_once(__DIR__.'/vendor/autoload.php');
use Controller\DeudaController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}
if(isset($_GET['id'])&&(!empty($_GET['id']))){
 $deuda = DeudaController::GetDeudaById($_GET['id']);?>
<div class="container">
    <div class="m-2 d-flex justify-content-center">
        <div class= "card  border border-custom" style="width: 60rem;">
            <div class="card-header bg-custom "><b> ABONAR DEUDA :</b> <?php  echo $deuda->nombre; ?></div>
            <div class="card-body">
                <form action="#" method="post" >
                    <div class="input-group-lg form-group">
                        <label for="valor">Valor a abonar</label>
                        <input type="number" name="valor" class="form-control" id="valor" placeholder="Valor" value="">
                    </div>
                    <div class="input-group-lg form-group">
                        <label for="valor">Fecha Abono</label>
                        <input type="date" name="fecha_abono" class="form-control" id="fecha_abono" placeholder="Fecha Abono">
                    </div>
                    <div class="input-group-lg form-group">
                        <label for="valor">Observaciones</label>
                        <textarea type="text" name="Observaciones" class="form-control" id="Observaciones" placeholder="Observaciones"></textarea>
                    </div>
                    <hr>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
                        <button class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Cancelar</button>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $_GET["id"]; ?>" placeholder="Valor">
                </form>
            </div>
        </div>
    </div>
</div>
<?php }else {  ?>
    <div class="container">
        <div class="alert alert-danger">Error de validación</div>
    </div>
  
<?php } ?>
