<?php 
// header('Content-type:application/json;charset=utf-8');
require_once "../models/lotes.model.php";
$identificador=$_POST['identificador'];

$lote= new ControladorLote();

switch ($identificador){
    case 'crearLote':
        $lote->ctrguardarlote();
    break;
    case 'cargarlotes':
        $lote->ctrCargarLotes();
    break;
    case'guardarimg':
        $lote->ctrGuardarImg();
    break;
    case 'cargarimgs':
        $lote->ctrCargarimgs();
    break;
    case 'eliminarimglote':
        $lote->ctrEliminarimg();
    break;
    case 'editarlote':
        $lote->ctreditarlote();
    break;
    case 'eliminarlote':
        $lote->ctrEliminarLote();
    break;
    case 'cargarlotespagina':
        $lote->ctrCargalotesPagina();
    break;

}


class ControladorLote{

    function ctrguardarlote(){

        $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
        $variableParaPDF = $ahora->format("su");

        //esta funcion trae un valor para renombrar
        $numeroLotes=ModeloLotes::ConteoLotes();
        $IDlote=$numeroLotes['lotesExistentes']+1;
        // $pathPDF=$_SERVER['DOCUMENT_ROOT']."/Proyecto_bienes_raices/admin/views/files/Lote".$IDlote.".pdf";
        $oldpathPDF="../views/files/Lote".$variableParaPDF.".pdf";
        // echo $pathPDF;
        copy($_FILES['pdffile']['tmp_name'],$oldpathPDF);
        $pathPDF="../admin".substr($oldpathPDF,2);

        $datosLote=array(
            "IDlote"=>$IDlote,
            "direccion"=>$_POST['addreslote'],
            "linkcas"=>$_POST['clavecatastral'],
            "linkvideo"=>$_POST['linkYoutube'],
            "linkPdf"=>$pathPDF
        );

        $respuesta=ModeloLotes::mdlGuardarLote($datosLote);
        if ($respuesta===TRUE) {
            echo "ok";
        }else{
            echo $respuesta;
        }
        
    }


    static public function ctrCargarLotes() {
        $listalotes=ModeloLotes::mdlCargarLotes();
        echo json_encode($listalotes,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    static public function ctrGuardarImg(){

        // $traerimagenes=ModeloLotes::mdlTraerImagenes();
        $ruta='';
        // $variableParaImg=$traerimagenes['conteoimagenes']+$_POST['conteoimagen'];
        $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
        $variableParaImg = $ahora->format("su");


        $IDloteimg=$_POST['IDlote'];
        $url_imagen=$_FILES['file']['tmp_name'];
        
        // echo $url_imagen=$_FILES['file']['type'];
        if ($_FILES['file']['type']=='image/jpg') {
            $ruta="../views/img/imglotes/".$IDloteimg."_img".$variableParaImg.".jpg";
        }
        if ($_FILES['file']['type']=='image/png') {
            $ruta="../views/img/imglotes/".$IDloteimg."_img".$variableParaImg.".png";

        }
         if ($_FILES['file']['type']=='image/jpeg') {
            $ruta="../views/img/imglotes/".$IDloteimg."_img".$variableParaImg.".jpeg";


        }

        copy($url_imagen,$ruta);


        $nuevaruta="../admin".substr($ruta,2);

        $DatosAGuardar=array(
            "IDloteig"=>$IDloteimg,
            "imagenesurl"=>$nuevaruta,
        );


        $guardarimgs=ModeloLotes::GuardarArrayImg($DatosAGuardar);

        // // var_dump($guardarimgs);
        if ($guardarimgs===TRUE) {
            echo "ok";
        }else{
            echo $guardarimgs;
        }


    }


    static public function ctrCargarimgs(){
        
        $traerimgs=ModeloLotes::cargarimgs($_POST['idlote']);
        echo json_encode($traerimgs,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }


    static public function ctrEliminarimg(){


        $eliminarimg=ModeloLotes::mdlEliminarImg($_POST['idlote']);
        if ($eliminarimg===TRUE) {

            $nuevaruta="..".substr($_POST['url'],8);
            unlink($nuevaruta);
            echo "ok";
        }else{
            echo $eliminarimg;
        }


        
    }

    static public function ctreditarlote(){
        $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
        $variableParaPDF = $ahora->format("su");
        $rutanueva='';
        if($_FILES['editpdffile']['name'] == ""){

            $rutanueva=$_POST['oldpdf'];
            
            }else{

                $rutacorregida="..".substr($_POST['oldpdf'],8);
                // echo $rutacorregida;
                // // $pathPDF=$_SERVER['DOCUMENT_ROOT']."/Proyecto_bienes_raices/admin/views/files/Lote".$IDlote.".pdf";
                unlink($rutacorregida);
                $oldpathPDF="../views/files/Lote".$variableParaPDF.".pdf";
                // // echo $pathPDF;
                copy($_FILES['editpdffile']['tmp_name'],$oldpathPDF);
                $rutanueva="../admin".substr($oldpathPDF,2);
            
            }

            // echo $rutanueva;
       $datosnuevoslot=array(
        "IDlote"=>$_POST['idlote'],
        "linkv"=>$_POST['editlinkYoutube'],
        "expediente"=>$rutanueva,
        "catastro"=>$_POST['editclavecatastral'],
        "ubicacion"=>$_POST['addresloteedit'],
       );

       $guardarlotes=ModeloLotes::mdlEditarlote($datosnuevoslot);
       if ($guardarlotes===TRUE) {
        echo "ok";
    }else{
        echo $guardarlotes;
    }
    }

    static public function ctrEliminarLote(){
        $eliminadolote=ModeloLotes::mdlEliminarLote($_POST['idlote']);
        if ($eliminadolote===TRUE) {
            echo "ok";
        }else{
            echo $eliminadolote;
        }
    }

    static public function ctrCargalotesPagina(){
        $lotesaPagina=ModeloLotes::mdlDatosLPagina();
        echo json_encode($lotesaPagina,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    }

}

?>