<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php'); 
use Controller\GastosFijosController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}?>
<div class="container">
  <div class="row">
    <h3 id="menu_tabla_gastos_fijos">Gastos Fijos &nbsp; </h3>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    </div>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_gastos_fijos">
    <thead class="bg-custom text-light">
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Nombre</th>
          <th class="text-center" scope="col"><i class="fa fa-usd" aria-hidden="true"></i> Mes Ciclo</th>
          <th class="text-center" scope="col"><i class="fa fa-calendar" aria-hidden="true"></i>  Observaciones</th>
          <th class="text-center" scope="col"><i class="fa fa-calendar" aria-hidden="true"></i>  Valor</th>
          <th class="text-center" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $gastos =GastosFijosController::GetAllGastosFijos();
        ?>
        <tr>
         <form class="form-inline" method="POST" action="./addgastosfijoscontroller">
            <td class="text-center"></td>        
            <td class="text-center"><textarea class="border border-info  form-control" rows="1" placeholder="nombre" id="nombre" name="nombre" required> </textarea></td>
            <td class="text-center"><input type="date" class="border border-info form-control" id="mes_ciclo" name="mes_ciclo" aria-describedby="mes_ciclo" placeholder="mes ciclo" required></td>
            <td class="text-center"><input type="text" class="border border-info  form-control" id="observaciones" name="observaciones" aria-describedby="observaciones" placeholder="observaciones" required></td>
            <td class="text-center"><input type="text" class="border border-info  form-control" id="valor" name="valor" aria-describedby="valor" placeholder="valor" required></td>
            <td class="text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
              <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i>  Limpiar</button>
            </td>
          </form>
        </tr>
        <?php
        if(!is_null($gastos) || !empty($gastos)){
          foreach($gastos as $gastos) {?>
          <tr>
            <form class="form-inline" method="POST" action="./editgastosfijoscontroller">
              <td class="text-center"> <?php echo $gastos->id; ?></td>
              <td class="text-center"><textarea class="form-control" rows="1" placeholder="nombre" id="nombre"  name="nombre" required> <?php echo $gastos->nombre; ?></textarea></td>
              <td class="text-center"><input type="date" class="form-control" id="mes_ciclo" name="mes_ciclo" aria-describedby="mes_ciclo" placeholder="mes_ciclo" value="<?php echo $gastos->mes_ciclo; ?>" required></td>
              <td class="text-center"><input type="text" class="form-control" id="observaciones" name="observaciones" aria-describedby="observaciones" value="<?php echo $gastos->observaciones; ?>" placeholder="observaciones" required></td>
              <td class="text-center"><input type="text" class="form-control" id="valor" name="valor" aria-describedby="valor" value="<?php echo $gastos->valor; ?>" placeholder="observaciones" required></td>
              <td class="text-center">
                <input type="hidden" id="id" name="id" value="<?php echo $gastos->id; ?>">
                <button type="submit" class="btn btn-success "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
              </td>
            </form>
          </tr>
        <?php }
          }else{?>
          <div class=" alert alert-danger">
            No existen registros
          </div>
          <?php }?>
      </tbody>
  </table>
  </div>
</div>
