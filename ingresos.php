<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php'); 
use Controller\IngresoController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}
?>
<div class="container">
  <div class="row">
    <h3 id="menu_tabla_ingresos">Ingresos &nbsp; </h3>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    </div>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_ingresos">
    <thead class="bg-custom text-light">
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Descripcion</th>
          <th class="text-center" scope="col"><i class="fa fa-usd" aria-hidden="true"></i> Monto</th>
          <th class="text-center" scope="col"><i class="fa fa-calendar" aria-hidden="true"></i>  Fecha</th>
          <th class="text-center" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $ingresos =IngresoController::GetAllIngresos();
        ?>
        <tr>
         <form class="form-inline" method="POST" action="./addingresocontroller">
            <td class="text-center"></td>        
            <td class="text-center"><textarea class="border border-info  form-control" rows="1" placeholder="nombre" id="nombre" name="nombre" required> </textarea></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="valor_ingreso" name="valor_ingreso" aria-describedby="valor_ingreso" placeholder="valor ingreso" required></td>
            <td class="text-center"><input type="date" class="border border-info  form-control" id="fecha" name="fecha" aria-describedby="fecha" placeholder="fecha" required></td>
            <td class="text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
              <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i>  Limpiar</button>
            </td>
          </form>
        </tr>
        <?php
        if(!is_null($ingresos) || !empty($ingresos)){
          foreach($ingresos as $ingresos) {?>
          <tr>
            <form class="form-inline" method="POST" action="./editingresocontroller">
              <td class="text-center"> <?php echo $ingresos->id; ?></td>
              <td class="text-center"><textarea class="form-control" rows="1" placeholder="nombre" id="nombre"  name="nombre" required> <?php echo $ingresos->nombre; ?></textarea></td>
              <td class="text-center"><input type="number" class="form-control" id="valor_ingreso" name="valor_ingreso" aria-describedby="valor_ingreso" placeholder="valor_ingreso" value="<?php echo $ingresos->valor_ingreso; ?>" required></td>
              <td class="text-center"><input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="fecha" value="<?php echo $ingresos->fecha; ?>" placeholder="fecha" required></td>
              <td class="text-center">
                <input type="hidden" id="id" name="id" value="<?php echo $ingresos->id; ?>">
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
