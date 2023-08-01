<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Administrar Residenciales</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar Residenciales</li>
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
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalResidencial" id="addresidencial">Agregar Residencial</button>

        </div>
        <div class="card-body">
        <table id="residenciales" class="tablas table table-bordered table-striped tablas" style="width: 100%;">
            <thead>
            <tr>
                <th style="width: 10px;">#</th>
                <th>Nombre de Residencial</th>
                <th>Dirección</th>
                <th>Catastro</th>
                <th>Planos</th>
                <th>Video</th>
                <th>Información de Lotes</th>
                <th>Ver fotos</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="listaresidenciales">
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre de Residencial</th>
                <th>Dirección</th>
                <th>Catastro</th>
                <th>Planos</th>
                <th>Video</th>
                <th>Información de Lotes</th>
                <th>Ver fotos</th>
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

<div class="modal fade" id="modalResidencial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data" id="guardarresidencial" class="formulario">
    <div class="modal-header" style="background: #3c8dbc; color: white;">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Residencial</h5>
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
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Ingresa el Nombre de la Residencial" aria-label="Username" aria-describedby="basic-addon1" required name="resNombre" id="resNombre">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
            </div>
            <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="Resaddress" id="Resaddress" cols="30" rows="5" required></textarea>
            </div>
        </div>

        <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingrese el Link de la Ficha Catastral" aria-label="Username" aria-describedby="basic-addon1" name="catastrores" id="catastrores" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese el Link del video en Youtube" aria-label="Username" aria-describedby="basic-addon1" name="linkvideores" id="linkvideores" required>
            </div>
        </div>

        <div class="form-group">
            <div class="panel">
                SUBIR PLANO DE RESIDENCIAL
            </div>
            <br>
            <input type="file" name="pdfresidencial" id="pdfresidencial" class="pdfresidencial" required accept="application/pdf">
        </div>

        <div class="form-group">
            <div class="panel">
                SUBIR ARCHIVO DE LOS LOTES
            </div>
            <br>
            <input type="file" name="pdflotesinfo" id="pdflotesinfo" class="pdflotesinfo" required accept="application/pdf">
        </div>
        <!-- <input type="hidden" id="passwordactual" name="passwordactual"> -->

        <!-- Entrada para seleccionar su perfil -->

        <!-- subir foto -->
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" id="guardarresidencial" name="btnguardar">Guardar Cambios</button>
        </div>
    </form>
    </div>
</div>
</div>



<!--=============================================
=            Estructura del modal de Editar     =
============================================= -->



<div class="modal fade" id="modaleditarresidencial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data" id="editarresidencial">
    <div class="modal-header" style="background: #3c8dbc; color: white;">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Residencial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
        <input type="hidden" name="idresidencial" id="idresidencial">
        <div class="form-group">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Ingresa el Nombre de la Residencial" aria-label="Username" aria-describedby="basic-addon1" required name="editarnombreResidencial" id="editarnombreResidencial">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
            </div>
            <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="editardireccionresidencial" id="editardireccionresidencial" cols="30" rows="5" required></textarea>
            </div>
        </div>


            <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese el Link de la Ficha Catastral" aria-label="Username" aria-describedby="basic-addon1" name="catastroresedit" id="catastroresedit" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingrese el Link del video en Youtube" aria-label="Username" aria-describedby="basic-addon1" name="linkvideoresedit" id="linkvideoresedit" required>
                </div>
            </div>

            <div class="form-group">
                <div class="panel">
                    SUBIR PLANO DE RESIDENCIAL
                </div>
                <br>
                <input type="file" name="pdfresidencialedit" id="pdfresidenciaedit" class="pdfresidencialedit" accept="application/pdf">
            </div>

            <div class="form-group">
                <div class="panel">
                    SUBIR ARCHIVO DE LOS LOTES
                </div>
                <br>
                <input type="file" name="pdflotesinfoedit" id="pdflotesinfoedit" class="pdflotesinfoedit" accept="application/pdf">
            </div>
            <input type="hidden" name="linkresidencialplano" id="linkresidencialplano">
            <input type="hidden" name="listaloteslink" id="listaloteslink">

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


<!-- Modal -->


<script src="views/js/residenciales.js"></script>