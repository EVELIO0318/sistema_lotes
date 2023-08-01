<?php 
require_once "../models/usuarios.model.php";
$identificador=$_POST['identificador'];

$clase= new ControladorUsuarios();

switch($identificador){
    case 'crearUsuario':
        $clase->crtCrearUsuario();
    break;
    case 'login':
        $clase->login();
        break;
    case 'cargarusuarios':
        $clase->crtCargarUsuario();
        break;
    case 'editarusuario':
        $clase->crtEditarUsuario();
        break;
    case 'eliminarusuario':
        $clase->crtEliminarUsuario();
        break;
    break;
    case 'traerdatousuario':
        $clase->crtCargardatoUsuario();
    break;
}


/*=============================================
    =     Metodo para crear usuario      =
=============================================*/
class ControladorUsuarios{
    static public function crtCrearUsuario(){

        $consulta=ModeloUsuario::mdlBuscarUsuario($_POST['nuevoNombre'].".".$_POST['nuevoapellido']."@proyectoempresa.com");

        if ($consulta['existe']==0){

            $passwordchanged= password_hash($_POST['nuevoPassword'],PASSWORD_DEFAULT);
    
            $usuario=array("nombre"=>$_POST['nuevoNombre'],
                            "apellido"=>$_POST['nuevoapellido'],
                            "direccion"=>$_POST['address'],
                            "correo"=>strtolower($_POST['nuevoNombre'].".".$_POST['nuevoapellido'])."@proyectoempresa.com",
                            "password"=>$passwordchanged);
    
            $respuesta=ModeloUsuario::mdlGuardarUsuario($usuario);
            
            if ($respuesta===TRUE) {
                echo "ok";
            }else{
                echo $respuesta;
            }
            
        }else{
            echo 'encontradoerror';
        }
        
    }


    static public function login(){

        $usuario=$_POST['email'];
        $pass=$_POST['pass'];
        
        $respuesta=ModeloUsuario::MdlMostrarUsuarios($usuario);

        if(is_array($respuesta)){
            if ($respuesta['correo']==$usuario &&  password_verify($pass, $respuesta['pass'])) { //aqui va el password verify
                if ($respuesta['estado']==1) {
                    session_start();
                    $_SESSION['iniciarSesion']="ok";
                    $_SESSION['id']=$respuesta['IDusuario'];
                    $_SESSION['nombre']=$respuesta['nombre'];
                    $_SESSION['apellido']=$respuesta['apellido'];
                    $_SESSION['direccion']=$respuesta['direccion'];
                    $_SESSION['correo']=$respuesta['correo'];
                    $_SESSION['estado']=$respuesta['estado'];

                    echo  $_SESSION['iniciarSesion'];
                }else{
                    echo "alertades";
                }
                }else{
                    echo 2;
                }
            }else{
                echo 'sinUser';
            }
    }

    static public function crtCargarUsuario(){
        session_start();
		$logeado=$_SESSION['id'];
		$listausuarios=ModeloUsuario::listarUser($logeado);
		echo json_encode($listausuarios,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }


    static public function crtEditarUsuario(){
        $consulta=ModeloUsuario::mdlBuscarUsuario($_POST['editarnombre'].".".$_POST['editarapellido']."@proyectoempresa.com");

            if ($_POST['editarpassword']==''){
                $passwordchanged=$_POST['passwordactual'];
            }else{
                $passwordchanged= password_hash($_POST['editarpassword'],PASSWORD_DEFAULT);
            }
    
            $usuariocambiar=array("idusuario"=>$_POST['idusuario'],
                            "nombre"=>$_POST['editarnombre'],
                            "apellido"=>$_POST['editarapellido'],
                            "direccion"=>$_POST['editaraddress'],
                            "correo"=>strtolower($_POST['editarnombre'].".".$_POST['editarapellido'])."@proyectoempresa.com",
                            "password"=>$passwordchanged);
    
            $respuesta=ModeloUsuario::mdlEditarrUsuario($usuariocambiar);
            
            if ($respuesta===TRUE) {
                echo "ok";
            }else{
                echo $respuesta;
            }
            
        
    }


    static public function crtEliminarUsuario(){
        $respuesta=ModeloUsuario::mdlEliminarUsuario($_POST['iduser']);
            
            if ($respuesta===TRUE) {
                echo "ok";
            }else{
                echo $respuesta;
            }
    }


    static public function crtCargardatoUsuario(){
        session_start();

        echo $_SESSION['nombre']." ".$_SESSION['apellido'];
    }
}
?>