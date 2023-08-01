<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Administrar Lotes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar Lotes</li>
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
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalLote" id="addlote">Agregar Lote</button>

        </div>
        <div class="card-body">
        <table id="lotes" class="tablas table table-bordered table-striped tablas" style="width: 100%;">
            <thead>
            <tr>
                <th>No. Lote</th>
                <th>Ubicación</th>
                <th>Ver Ficha Catastral</th>
                <th>Ver Expediente</th>
                <th>Ver Fotos</th>
                <th>Ver Video</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody id="listalotes">
            </tbody>
            <tfoot>
            <tr>
                <th>No. Lote</th>
                <th>Ubicación</th>
                <th>Ver Ficha Catastral</th>
                <th>Ver Expediente</th>
                <th>Ver Fotos</th>
                <th>Ver Ver Video</th>
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

<div class="modal fade" id="modalLote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data" id="guardarlote" class="formulario">
    <div class="modal-header" style="background: #3c8dbc; color: white;">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="card-body">
    
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese el Link de la Ficha Catastral" aria-label="Username" aria-describedby="basic-addon1" name="clavecatastral" id="clavecatastral" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese el Link del video en Youtube" aria-label="Username" aria-describedby="basic-addon1" name="linkYoutube" id="linkYoutube" required>
            </div>
        </div>

        <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
                    </div>
                <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="addreslote" id="addreslote" cols="30" rows="5" required></textarea>
                </div>
            </div>

        <div class="form-group">
            <div class="panel">
                SUBIR ARCHIVO PDF DEL LOTE
            </div>
            <br>
            <input type="file" name="pdffile" id="pdffile" class="pdffile" required accept="application/pdf">
        </div>
        <br>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" id="guardarlote" name="btnguardar">Guardar Cambios</button>
        </div>
    </form>
    </div>
</div>
</div>



<!--=============================================
=            Estructura del modal de Editar     =
============================================= -->
<div class="modal fade" id="modaeditarlote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data" id="editarlote">
        <div class="modal-header" style="background: #3c8dbc; color: white;">
            <h5 class="modal-title" id="exampleModalLongTitle">Editar Residencial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
            <input type="hidden" name="idlote" id="idlote">
            
            
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingrese el Link de la Ficha Catastral" aria-label="Username" aria-describedby="basic-addon1" name="editclavecatastral" id="editclavecatastral" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingrese el Link del video en Youtube" aria-label="Username" aria-describedby="basic-addon1" name="editlinkYoutube" id="editlinkYoutube" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></i></span>
                    </div>
                <textarea type="text" placeholder="Ingresar Dirección" class="form-control" name="addresloteedit" id="addresloteedit" cols="30" rows="5" required></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="panel">
                    SUBIR ARCHIVO PDF DEL LOTE
                </div>
                <br>
                <input type="file" name="editpdffile" id="editpdffile" class="editpdffile" accept="application/pdf">
                <input type="hidden" name="oldpdf" id="oldpdf">
            </div>

            

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


<script src="views/js/lotes.js"></script>