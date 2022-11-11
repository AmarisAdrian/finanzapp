<?php 
require_once('index.php');
require_once(__DIR__.'/vendor/autoload.php');
use Controller\UsuarioController;
use Core\Core;
if(!isset($_SESSION['documento'])&&(!isset($_SESSION['tiempo']))){      
    Core::redir_log("./salir");       
}
?>
<div class="container">
  <div class="row">
    <h3 id="menu_tabla_usuario">Usuarios &nbsp; </h3>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    </div>
    <hr>
  </div>
  <br>
  <div class="table-responsive">
    <table class="table table-bordered" id="tabla_usuarios">
    <thead class="bg-custom text-light">
        <tr>
          <th class="text-center" scope="col">#</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i>  Documento</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Nombre Completo</th>
          <th class="text-center" scope="col"><i class="fa fa-pencil" aria-hidden="true"></i> Password</th>
          <th class="text-center" scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $usuarios =UsuarioController::GetAllUsuario();
        ?>
        <tr>
         <form class="form-inline" method="POST" action="./addusuariocontroller">
            <td class="text-center"></td>        
            <td class="text-center"><input type="number" class="border border-info  form-control" id="documento" name="documento" aria-describedby="documento" placeholder="documento" required></td>
            <td class="text-center"><textarea class="border border-info  form-control" rows="1" id="nombre_completo" name="nombre_completo" placeholder="nombre completo" required> </textarea></td>
            <td class="text-center"><input type="number" class="border border-info form-control" id="password" name="password" aria-describedby="password" placeholder=" password" required></td>
            <td class="text-center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Guardar</button>
              <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i>  Limpiar</button>
            </td>
          </form>
        </tr>
        <?php
        if(!is_null($usuarios) || !empty($usuarios)){
          foreach($usuarios as $usuarios) {?>
          <tr>
            <form class="form-inline" method="POST" action="./editusuariocontroller">
              <td class="text-center"> <?php echo $usuarios->id; ?></td>
              <td class="text-center"><input type="number" class="form-control" id="documento" name="documento" aria-describedby="documento" value="<?php echo $usuarios->documento; ?>" placeholder="documento" required></td>
              <td class="text-center"><textarea class="form-control" rows="1" placeholder="nombre completo" id="nombre_completo"  name="nombre_completo" required> <?php echo $usuarios->nombre_completo; ?></textarea></td>
              <td class="text-center"><input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="password" value="" required></td>
              <td class="text-center">
                <input type="hidden" id="id" name="id" value="<?php echo $usuarios->id; ?>">
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
