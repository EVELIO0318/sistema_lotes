<?php 
    require_once "conexion.php";
    class ModeloUsuario{

        static public function mdlGuardarUsuario($datos){
            try{
                $stmt=Conexion::conectar()->prepare("INSERT INTO usuarios(nombre,apellido,direccion,correo,pass) VALUES (:nombre,:apellido,:direccion,:correo,:passw)");
                $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
                $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
                $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
                $stmt->bindParam(":passw", $datos["password"], PDO::PARAM_STR);
                return $stmt->execute();
                } catch(Exception $e){
                        return $e->getMessage();
                        // return "Error del try";
                }
        }

        static public function mdlBuscarUsuario($email){

            try{
                $stmt=Conexion::conectar()->prepare("SELECT COUNT(*) AS existe FROM usuarios WHERE correo=:email AND estado=1");
                $stmt->bindParam(":email",$email,PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
                
            }catch(Exception $u){
                return $u->getMessage();
            }
            
        }

        static public function MdlMostrarUsuarios($usuario){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE correo= :email"); //se le debe poner : despues del igual del where para proteger la base de datos
    
            $stmt->bindParam(":email",$usuario, PDO::PARAM_STR);//enlazar parametro
    
            $stmt->execute();
            return $stmt -> fetch();// fetch sirve para retornar un solo item        
        }

        static public function listarUser($logeado)
        {
            try{
                $listadeusuarios=Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE IDusuario<>:logeado  AND estado<>2");
                $listadeusuarios->bindParam(":logeado",$logeado,PDO::PARAM_STR);
                $listadeusuarios->execute();
                return $listadeusuarios->fetchAll(PDO::FETCH_ASSOC);
    
            }catch(Exception $exe){
                return $exe->getMessage();
            }
        }

        static public function mdlEditarrUsuario($user){

            try{
                $editarusuario=Conexion::conectar()->prepare("UPDATE usuarios SET nombre=:nombre,apellido=:apellido,direccion=:direccion,correo=:correo,pass=:pass WHERE IDusuario=:ID");
                $editarusuario->bindParam(":ID",$user['idusuario'],PDO::PARAM_STR);
                $editarusuario->bindParam(":nombre",$user['nombre'],PDO::PARAM_STR);
                $editarusuario->bindParam(":apellido",$user['apellido'],PDO::PARAM_STR);
                $editarusuario->bindParam(":direccion",$user['direccion'],PDO::PARAM_STR);
                $editarusuario->bindParam(":correo",$user['correo'],PDO::PARAM_STR);
                $editarusuario->bindParam(":pass",$user['password'],PDO::PARAM_STR);
                return $editarusuario->execute();
            }catch(Exception $nincy){
                return $nincy->getMessage();
            }
        }


        static public function mdlEliminarUsuario($id){
            try{
                $eliminar=Conexion::conectar()->prepare("UPDATE usuarios SET estado=2 WHERE IDusuario=:ID");
                $eliminar->bindParam(":ID",$id,PDO::PARAM_STR);
                return $eliminar->execute();
            }catch(Exception $rocio){
                return $rocio->getMessage();
            }
        }
    }
?>