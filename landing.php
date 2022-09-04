<?php 
require_once('index.php');
?>
<div class="container">
  <div class="row">
    <h3>Gastos realizados</h3>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_gastos">
    <thead class="bg-custom text-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col"><i class="fa fa-usd" aria-hidden="true"></i> Monto</th>
          <th scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Descripcion</th>
          <th scope="col"><i class="fa fa-calendar" aria-hidden="true"></i>  Fecha</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <form class="form-inline" method="POST" action="./addpagocontroller">
            <td>1</td>
            <td><input type="number" class="form-control" id="monto" name="monto" aria-describedby="monto" placeholder="monto" required></td>
            <td><textarea class="form-control" rows="1" placeholder="observacion" id="observacion" name="observacion" required> </textarea></td>
            <td><input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="fecha" placeholder="fecha" required></td>
            <td>
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
              <button type="reset" class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i>  borrar</button>
            </td>
          </form>

        </tr>
      </tbody>
  </table>
  </div>
</div>
