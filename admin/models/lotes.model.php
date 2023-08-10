<?php 
require_once 'conexion.php';
class ModeloLotes{
    static public function ConteoLotes(){

        try{
            $conteo=Conexion::conectar()->prepare("SELECT COUNT(*) AS lotesExistentes FROM lotes");
            $conteo->execute();
            return $conteo->fetch();
        }catch(Exception $diana){
            return $diana->getMessage();
        }
        
    }

    static public function mdlGuardarLote($loteGuardar){
        try{
            $guardarlote=Conexion::conectar()->prepare("INSERT INTO lotes(IDlote,link_video,pdf_expediente,link_ficha_catastral,Direccion)VALUES(:IDlote,:linkvideo,:pdflink,:linkficha,:direccion)");
            $guardarlote->bindParam(":IDlote",$loteGuardar['IDlote'],PDO::PARAM_STR);
            $guardarlote->bindParam(":linkvideo",$loteGuardar['linkvideo'],PDO::PARAM_STR);
            $guardarlote->bindParam(":pdflink",$loteGuardar['linkPdf'],PDO::PARAM_STR);
            $guardarlote->bindParam(":linkficha",$loteGuardar['linkcas'],PDO::PARAM_STR);
            $guardarlote->bindParam(":direccion",$loteGuardar['direccion'],PDO::PARAM_STR);
            return $guardarlote->execute();

        }catch(Exception $dulce){
            return $dulce->getMessage();
        }
    }


    static public function mdlCargarLotes(){
        try{
            $lotes=Conexion::conectar()->prepare("SELECT * FROM lotes WHERE estado<>0");
            $lotes->execute();
            return $lotes->fetchAll();
        }catch(Exception $dentist){
            return $dentist->getMessage();
        }
    }

    static public function mdlTraerImagenes(){
        try{
            $imgs=Conexion::conectar()->prepare("SELECT COUNT(*) AS conteoimagenes FROM imagenes_lote");
            // $imgs->bindParam(":id",$id,PDO::PARAM_STR);
            $imgs->execute();
            return $imgs->fetch();

        }catch(Exception $sk){
            return $sk->getMessage();
        }
    }

    static public function GuardarArrayImg($datosg){

        // return $datosg['imagenesurl'];
        try{
            $imgsave=Conexion::conectar()->prepare("INSERT INTO imagenes_lote (IDlote,url_image) VALUES (:idlote,:urlimglote)");

            $imgsave->bindParam(":idlote",$datosg['IDloteig'],PDO::PARAM_STR);
            $imgsave->bindParam(":urlimglote",$datosg['imagenesurl'],PDO::PARAM_STR);
            return $imgsave->execute();
        }catch(Exception $jordi){
            return $jordi->getMessage();
        }
    }


    static public function cargarimgs($id){
        try{
            $imgarray=Conexion::conectar()->prepare("SELECT IDimagen,url_image FROM imagenes_lote WHERE IDlote=:id");
            $imgarray->bindParam(":id",$id,PDO::PARAM_STR);
            $imgarray->execute();
            return $imgarray->fetchAll();
        }catch(Exception $angel){
            return $angel->getMessage();
        }
    }

    static public function mdlEliminarImg($IDimg){
        try{
            $eliminarimg=Conexion::conectar()->prepare("DELETE FROM imagenes_lote WHERE IDimagen=:id");
            $eliminarimg->bindParam(":id",$IDimg,PDO::PARAM_STR);
            return $eliminarimg->execute();
        }catch(Exception $valeska){
            return $valeska->getMessage();
        }
    }

    static public function mdlEditarlote($datoseditados){
        try{
            $editadolote=Conexion::conectar()->prepare("UPDATE lotes SET link_video=:video,pdf_expediente=:expendiente,link_ficha_catastral=:catastral, Direccion=:ubicacion WHERE IDlote=:IDlote");
            $editadolote->bindParam(":video",$datoseditados['linkv'],PDO::PARAM_STR);
            $editadolote->bindParam(":expendiente",$datoseditados['expediente'],PDO::PARAM_STR);
            $editadolote->bindParam(":catastral",$datoseditados['catastro'],PDO::PARAM_STR);
            $editadolote->bindParam(":ubicacion",$datoseditados['ubicacion'],PDO::PARAM_STR);
            $editadolote->bindParam(":IDlote",$datoseditados['IDlote'],PDO::PARAM_STR);
            return $editadolote->execute();
        }catch(Exception $solanyi){
            return $solanyi->getMessage();
        }
    }


    static public function mdlEliminarLote($IDlote){
        try{
            $eliminarlote=Conexion::conectar()->prepare("UPDATE lotes SET Estado=0 WHERE IDlote=:id");
            $eliminarlote->bindParam(":id",$IDlote,PDO::PARAM_STR);
            return $eliminarlote->execute();
        }catch(Exception $gaby){
            return $gaby->getMessage();
        }
    }

    static public function mdlDatosLPagina(){
        try{
            $local=Conexion::conectar()->prepare("SELECT l.IDlote,l.Direccion,l.link_video,l.pdf_expediente,l.link_ficha_catastral,il.url_image FROM lotes l INNER JOIN imagenes_lote il ON il.IDlote=l.IDlote WHERE l.estado<>0 GROUP BY l.IDlote");
            $local->execute();
            return $local->fetchAll(\PDO::FETCH_ASSOC);;
        }catch(Exception $k){
            return $k->getMessage();
        }
    }
}

?>