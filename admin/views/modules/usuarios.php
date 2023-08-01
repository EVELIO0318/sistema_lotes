  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalUsuario" id="addusuario">Agregar Usuario</button>

        </div>
        <div class="card-body">
          <table id="usuarios" class="tablas table table-bordered table-striped tablas" style="width: 100%;">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>correo</th>
                
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="listarUser">
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>correo</th>
               
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--=============================================
=            Estructura del modal de Agregar     =
============================================= -->

<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data" id="guardarusuario" class="formulario">
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <!-- <input type="hidden" name="idusuario" id="idusuario"> -->
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa el Nombre" aria-label="Username" aria-describedby="basic-addon1" required name="nuevoNombre" id="nuevoNombre">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa el Apellido" aria-label="Username" aria-describedby="basic-addon1" required name="nuevoapellido" id="nuevoapellido">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
              </div>
              <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="address" id="address" cols="30" rows="5" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Ingresar Contraseña" aria-label="Username" aria-describedby="basic-addon1" required name="nuevoPassword" id="nuevoPassword">
            </div>
          </div>
          <!-- <input type="hidden" id="passwordactual" name="passwordactual"> -->

          <!-- Entrada para seleccionar su perfil -->

          <!-- subir foto -->


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!--=============================================
=            Estructura del modal de Editar     =
============================================= -->



<div class="modal fade" id="modaleditarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data" id="editarusuario">
      <div class="modal-header" style="background: #3c8dbc; color: white;">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <input type="hidden" name="idusuario" id="idusuario">
          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa el Nombre" aria-label="Username" aria-describedby="basic-addon1" required name="editarnombre" id="editarnombre">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tag"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Ingresa el Apellido" aria-label="Username" aria-describedby="basic-addon1" required name="editarapellido" id="editarapellido">
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
              </div>
              <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="editaraddress" id="editaraddress" cols="30" rows="5" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Edite Contraseña(Si no cambiara contraseña, dejar en blanco)" aria-label="Username" aria-describedby="basic-addon1" name="editarpassword" id="editarpassword">
            </div>
          </div>
          <input type="hidden" id="passwordactual" name="passwordactual">

          <!-- Entrada para seleccionar su perfil -->

          <!-- subir foto -->


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" id="btneditar" name="btneditar">Actualizar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="views/js/usuarios.js"></script>