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
            $actualizarR=Conexion::conectar()->prepare("UPDATE residenciales SET nombre_res=:nombreA, ubicacion=:ubicacionA, link_video_res=:videoedit, plano_pdf=:planoedit, info_lotes_pdf=:listalotesedit, info_catastro=:infocatastro WHERE IDresidenciales=:ID");
            $actualizarR->bindParam(":nombreA",$datosResidencial['AcNombre'],PDO::PARAM_STR);
            $actualizarR->bindParam(":ubicacionA",$datosResidencial['ActDireccion'],PDO::PARAM_STR);
            $actualizarR->bindParam(":ID",$datosResidencial['IDresidencial'],PDO::PARAM_STR);
            $actualizarR->bindParam(":videoedit",$datosResidencial['ActLink'],PDO::PARAM_STR);
            $actualizarR->bindParam(":planoedit",$datosResidencial['ActPlano'],PDO::PARAM_STR);
            $actualizarR->bindParam(":listalotesedit",$datosResidencial['ActLoteslistas'],PDO::PARAM_STR);
            $actualizarR->bindParam(":infocatastro",$datosResidencial['ActCatastro'],PDO::PARAM_STR);
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


    static public function GuardarArrayImgres($resdataimg){
        try{
            $imgsave=Conexion::conectar()->prepare("INSERT INTO imagenes_residencial (IDresidencial,url_image_res) VALUES (:idresi,:urlresi)");

            $imgsave->bindParam(":idresi",$resdataimg['IDlresig'],PDO::PARAM_STR);
            $imgsave->bindParam(":urlresi",$resdataimg['imagenesurl'],PDO::PARAM_STR);
            return $imgsave->execute();
        }catch(Exception $elisa){
            return $elisa->getMessage();
        }
    }


    static public function cargarimgs($id){
        try{
            $imgarray=Conexion::conectar()->prepare("SELECT IDimgresidencial,url_image_res FROM imagenes_residencial WHERE IDresidencial=:id");
            $imgarray->bindParam(":id",$id,PDO::PARAM_STR);
            $imgarray->execute();
            return $imgarray->fetchAll();
        }catch(Exception $angel){
            return $angel->getMessage();
        }
    }

    static public function mdlEliminarImgres($idresinden){
        try{
            $eliminarimg=Conexion::conectar()->prepare("DELETE FROM imagenes_residencial WHERE IDimgresidencial=:id");
            $eliminarimg->bindParam(":id",$idresinden,PDO::PARAM_STR);
            return $eliminarimg->execute();
        }catch (Exception $Angie){
            return $Angie->getMessage();
        }
    }


    static public function mdlDatosRPagina(){
        try{
            $local=Conexion::conectar()->prepare("SELECT r.IDresidenciales,r.nombre_res,r.ubicacion,r.link_video_res,r.plano_pdf,r.info_lotes_pdf,r.info_catastro,ir.url_image_res FROM residenciales r INNER JOIN imagenes_residencial ir ON ir.IDresidencial=r.IDresidenciales WHERE r.estado<>0 GROUP BY r.IDresidenciales");
            $local->execute();
            return $local->fetchAll(\PDO::FETCH_ASSOC);;
        }catch(Exception $k){
            return $k->getMessage();
        }
    }
}
?>