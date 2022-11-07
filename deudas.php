<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php'); 
use Controller\DeudaController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}?>
<div class="container">
  <div class="row">
    <h3 id="menu_tabla_ingresos">Deudas &nbsp; </h3>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    </div>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_deudas">
    <thead class="bg-custom text-light">
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Nombre</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Deuda_total</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Valor_cuota</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Total_cuota</th>
          <th class="text-center" scope="col"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha</th>
          <th class="text-center" scope="col"></th>
          <th class="text-center" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $deudas = DeudaController::GetAllDeuda();
        ?>
        <tr>
         <form class="form-inline" method="POST" action="./adddeudacontroller">
            <td class="text-center"></td>        
            <td class="text-center"><textarea class="border border-info  form-control" rows="1" placeholder="nombre" id="nombre" name="nombre" required> </textarea></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="deuda_total" name="deuda_total" aria-describedby="deuda_total" placeholder="deuda total" required></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="valor_cuota" name="valor_cuota" aria-describedby="valor_cuota" placeholder="valor cuota" required></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="total_cuota" name="total_cuota" aria-describedby="total_cuota" placeholder="total cuota" required></td>
            <td class="text-center"><input type="date" class="border border-info  form-control" id="fecha" name="fecha" aria-describedby="fecha" placeholder="fecha" required></td>
            <td class="text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
            </td>
            <td class="text-center">
              <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i>  Limpiar</button>
            </td>
          </form>
        </tr>
        <?php
        if(!is_null($deudas) || !empty($deudas)){
          foreach($deudas as $deudas) {?>
          <tr>
            <form class="form-inline" method="POST" action="./editdeudacontroller">
              <td class="text-center"> <?php echo $deudas->id; ?></td>
              <td class="text-center"><textarea class="form-control" rows="1" placeholder="nombre" id="nombre"  name="nombre" required> <?php echo $deudas->nombre; ?></textarea></td>
              <td class="text-center"><input type="number" class="form-control" id="deuda_total" name="deuda_total" aria-describedby="deuda_total" placeholder="deuda_total" value="<?php echo $deudas->deuda_total; ?>" required></td>
              <td class="text-center"><input type="number" class="form-control" id="valor_cuota" name="valor_cuota" aria-describedby="valor_cuota" placeholder="valor_cuota" value="<?php echo $deudas->valor_cuota; ?>" required></td>
              <td class="text-center"><input type="number" class="form-control" id="total_cuota" name="total_cuota" aria-describedby="total_cuota" placeholder="total_cuota" value="<?php echo $deudas->total_cuota; ?>" required></td>
              <td class="text-center"><input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="fecha" value="<?php echo $deudas->fecha; ?>" placeholder="fecha" required></td>
              <td class="text-center">
                <input type="hidden" id="id" name="id" value="<?php echo $deudas->id; ?>">
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
