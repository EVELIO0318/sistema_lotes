<?php 
session_start();
require ("modules/estructura.php");


if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"]=="ok") {
   
    /*=============================================
    =            cuerpo Princial ABRIR      =
    =============================================*/
    require ("modules/main_body.php");
    
    
    /*=============================================
    =            navbar     =
    =============================================*/
    require ("modules/navbar.php");
    
    
    /*=============================================
    =            sidebar     =
    =============================================*/
    require ("modules/sidebar.php");

    if (isset($_GET["ruta"])){
        if (
            $_GET["ruta"]=="inicio" || 
            $_GET["ruta"]=="usuarios" || 
            $_GET["ruta"]=="residenciales" || 
            $_GET["ruta"]=="lotes" || 
            $_GET["ruta"]=="salir") { //en caso de error en el reporte hacer otro else if con el cambio de php
        
            require("modules/".$_GET["ruta"].".php");    
            }else{
                require("modules/404.php");
            }
    }else{
        require("modules/inicio.php");
    }
    
    
    
    require("modules/footer.php");
    
    require ("modules/end_estructura.php");
}else{
    require("modules/login.php");  
}


?>