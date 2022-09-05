<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php'); 
use Controller\GetPagoController;
use Core\Core;
?>
<div class="container">
  <div class="row">
    <h3 id="menu_tabla_gastos">Gastos realizados  &nbsp; </h3>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    </div>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_gastos">
    <thead class="bg-custom text-light">
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col"><i class="fa fa-usd" aria-hidden="true"></i> Monto</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Descripcion</th>
          <th class="text-center" scope="col"><i class="fa fa-calendar" aria-hidden="true"></i>  Fecha</th>
          <th class="text-center" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $pagos =GetPagoController::GetAllPagos();
        ?>
        <tr>
         <form class="form-inline" method="POST" action="./addpagocontroller">
            <td class="text-center"></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="monto" name="monto" aria-describedby="monto" placeholder="monto" required></td>
            <td class="text-center"><textarea class="border border-info  form-control" rows="1" placeholder="observacion" id="observacion" name="observacion" required> </textarea></td>
            <td class="text-center"><input type="date" class="border border-info  form-control" id="fecha" name="fecha" aria-describedby="fecha" placeholder="fecha" required></td>
            <td class="text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
              <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i>  Limpiar</button>
            </td>
          </form>
        </tr>
        <?php
        if(!is_null($pagos) || !empty($pagos)){
          foreach($pagos as $pagos) {?>
          <tr>
            <form class="form-inline" method="POST" action="./editarpagocontroller">
              <td class="text-center"> <?php echo $pagos->id; ?></td>
              <td class="text-center"><input type="number" class="form-control" id="monto" name="monto" aria-describedby="monto" placeholder="monto" value="<?php echo $pagos->monto; ?>" required></td>
              <td class="text-center"><textarea class="form-control" rows="1" placeholder="observacion" id="observacion"  name="observacion" required> <?php echo $pagos->observacion; ?></textarea></td>
              <td class="text-center"><input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="fecha" value="<?php echo $pagos->fecha; ?>" placeholder="fecha" required></td>
              <td class="text-center">
                <input type="hidden" id="id" name="id" value="<?php echo $pagos->id; ?>">
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
