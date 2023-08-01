<?php 
require_once "controllers/plantilla.controller.php";



require_once "models/usuarios.model.php";
require_once "models/residenciales.model.php";
require_once "models/lotes.model.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();