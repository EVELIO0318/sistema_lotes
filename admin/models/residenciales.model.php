<?php 
require_once "conexion.php";

class ModeloResidenciales{
    static public function mdlBuscarResidencial($residencial){
        try {
            $stmt=Conexion::conectar()->prepare("SELECT COUNT(*)AS existe FROM residenciales WHERE nombre_res=:nombre AND estado=1");
            $stmt->bindParam(":nombre",$residencial,PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    static public function mdlGuardarResidencial($datosresidencial){
        
        try{
            $residencial=Conexion::conectar()->prepare("INSERT INTO residenciales(IDresidenciales,nombre_res, ubicacion,link_video_res,plano_pdf,info_lotes_pdf,info_catastro) VALUES (:id,:nombrer,:ubicacionr,:linkv,:planos,:infolotes,:infocatastro)");
            $residencial->bindParam(":nombrer",$datosresidencial['nombreresidencial'],PDO::PARAM_STR);
            $residencial->bindParam(":ubicacionr",$datosresidencial['direccionresidencial'],PDO::PARAM_STR);
            $residencial->bindParam(":linkv",$datosresidencial['videores'],PDO::PARAM_STR);
            $residencial->bindParam(":planos",$datosresidencial['urlplano'],PDO::PARAM_STR);
            $residencial->bindParam(":infolotes",$datosresidencial['urlinfolotes'],PDO::PARAM_STR);
            $residencial->bindParam(":infocatastro",$datosresidencial['catastroinfo'],PDO::PARAM_STR);
            $residencial->bindParam(":id",$datosresidencial['IDresidencial'],PDO::PARAM_STR);
            return $residencial->execute();
        }catch(Exception $k){
            return $k->getMessage();
        }
    }

    static public function mdlCargarResidenciales(){
        $residenciales=Conexion::conectar()->prepare("SELECT IDresidenciales, nombre_res, ubicacion, link_video_res, plano_pdf, info_lotes_pdf, info_catastro FROM residenciales WHERE estado<>0");
        $residenciales->execute();
        return $residenciales->fetchAll();
    }

    static public function mdlEditarResidencial($datosResidencial){
        try{
            $actualizarR=Conexion::conectar()->prepare("UPDATE residenciales SET nombre_res=:nombreA, ubicacion=:ubicacionA WHERE IDresidenciales=:ID");
            $actualizarR->bindParam(":nombreA",$datosResidencial['AcNombre'],PDO::PARAM_STR);
            $actualizarR->bindParam(":ubicacionA",$datosResidencial['ActDireccion'],PDO::PARAM_STR);
            $actualizarR->bindParam(":ID",$datosResidencial['IDresidencial'],PDO::PARAM_STR);
            return $actualizarR->execute();
        }catch(Exception $n){
            return $n->getMessage();
        }   
    }


    static public function mdlEliminarResidencial($IDR) {
        try{
            $eliminarR=Conexion::conectar()->prepare("UPDATE residenciales SET estado=0 WHERE IDresidenciales=:IDR");
            $eliminarR->bindParam(":IDR",$IDR,PDO::PARAM_STR);
            return $eliminarR->execute();
        }catch(Exception $n){
            return $n->getMessage();
        }
    }

    static public function mdlconteoResidenciales(){
        try{
            $conteores=Conexion::conectar()->prepare("SELECT COUNT(*) AS numerores FROM residenciales");
            $conteores->execute();
            return $conteores->fetch();
        }catch(Exception $vale){
            return $vale->getMessage();
        }
    }
}
?>