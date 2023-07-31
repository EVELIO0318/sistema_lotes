<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración de lotes</title>

    <!--=====================================
    =          Plugins de CSS           =
    ======================================-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Personal -->
    <!-- <link rel="stylesheet" href="views/plugins/Personal/css/plantila.css"> -->

    <!-- FavIcon -->
    <link rel="icon" href="views/img/plantilla/icono-negro.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="views/plugins/Ionicons/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->


    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="views/plugins/jqvmap/jqvmap.min.css"> -->

    <!-- Theme style -->
    <link rel="stylesheet" href="views/dist/css/adminlte.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css"> -->

    <!-- summernote -->
    <link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css">

    <!-- SweetAlert2 -->
    <!-- <link rel="stylesheet" href="views/plugins/sweetalert2/sweetalert2.min.css"> -->

    <!-- DataTables -->
    <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SelectPicker -->
    <link rel="stylesheet" href="views/plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">

    <!-- SelectPicker -->
    <link rel="stylesheet" href="views/plugins/select2/css/select2.css">

    <!--  DateRangePicker -->
    <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">

    <!--  Graphics Charts -->
    <!-- <link rel="stylesheet" href="views/plugins/chart.js/Chart.css"> -->

    <!--  Morris Charts -->
    <!-- <link rel="stylesheet" href="views/plugins/Morris/morris.css"> -->
    <!-- dropzone -->
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

<!--=====================================
=          Plugins de Javascript           =
======================================-->

<!-- jQuery -->
<script src="views/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<!-- <script src="views/plugins/chart.js/chart.js"></script> -->

<!-- Sparkline -->
<!-- <script src="views/plugins/sparklines/sparkline.js"></script> -->

<!-- JQVMap -->
<!-- <script src="views/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->

<!-- jQuery Knob Chart -->
<!-- <script src="views/plugins/jquery-knob/jquery.knob.min.js"></script> -->

<!-- daterangepicker -->
<script src="views/plugins/moment/moment.min.js"></script>

<script src="views/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="views/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->
<script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- SweetAlert2 -->
<script src="views/dist/js/adminlte.js"></script>

<!-- AdminLTE App -->
<script src="views/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Jquery Mask -->
<script src="views/plugins/jquery-mask/jquery.mask.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <!-- SelectPicker -->
    <script src="views/plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- Select2 -->
    <script src="views/plugins/select2/js/select2.js"></script>

  <!-- Number -->

    <script src="views/plugins/Number_Jquery/jquery.number.min.js"></script>

    <!-- DateRangePicker -->
    <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- dropzone -->
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

    <!-- MorrisChart -->
    <!-- <script src="views/plugins/Morris/morris.min.js"></script>
    <script src="views/plugins/Morris/raphael-min.js"></script> -->
    <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>

</head>


<!-- <body class="hold-transition sidebar-mini">



<script src="views/js/template.js"></script>

</body> -->
</html>


<!-- MODAL DE SUBIR FOTOS -->
<div class="modal fade" id="verfotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir imagenes del Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idimglote" name="idimglote">
        <form action="" class="dropzone" id="formimg">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="guardarimglotes">Guardar Imagenes</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE CRUD  FOTOS -->
<div class="modal fade" id="crudfotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestión del imagenes del Lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idimglote" name="idimglote">
          <table id="imglotes" class="tablas table table-bordered table-striped tablas" style="width: 100%;">
            <thead>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            </tfoot>
        </table>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="guardarimglotes">Guardar Imagenes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- MODAL DE SUBIR FOTOS -->