<body class="hold-transition login-page cover">
<div class="login-box">
<!-- /.login-logo -->
<div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="views/img/plantilla/iconologin.png" alt="logotipo" class="img-fluid" style="width: 50%;">
    </div>
    <div class="card-body">
    <p class="login-box-msg">Ingreso al sistema</p>
    <form action="inicio" method="" autocomplete="off"  id="formlogin" class="full-box logInForm">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="correo" id="email" name="email" required>
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user"></span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass" required>
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- /.col -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" id="btnlogin" name="btnlogin">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
        </div>
    </form>
    <br>
    <div class="alert alert-danger" role="alert" id="negativo" style="display: none">
            Usuario o contraseña Incorrecto
        </div>

        <div class="alert alert-success" role="alert" id="positivo" style="display:none; ">
            Accesso concedido, redireccionando...
        </div>
    <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<!-- /.login-box -->
</body>
<script src="views/js/login.js"></script>