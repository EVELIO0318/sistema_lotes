<?php 
    require_once "../models/residenciales.model.php";
    $identificador=$_POST['identificador'];

    $residencial= new ControladorResidenciales();

    switch ($identificador) {
        case 'crearResidencial':
            $residencial->ctrCrearResidencial();    
        break;
        case 'cargarres':
            $residencial->cargarResidenciales();
        break;
        case 'editarResidencial':
            $residencial->editarResidenciales();
        break;
        case 'eliminarresidencial':
            $residencial->eliminarResidenciales();
        break;
        case 'guardarimgres':
            $residencial->guardarimgs();
        break;
        case 'cargarimgres':
            $residencial->cargarimgs();
        break;
        case 'eliminarimgres':
            $residencial->ctrEliminarimgres();
        break;
        case 'cargarparapagina':
            $residencial->ctrCargarResidencialesPagina();
        break;
    }


    class ControladorResidenciales{
        static public function ctrCrearResidencial(){
            
            //solucion en el modulo de lotes, aqui ya empece
            $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
            $variableParaPDF = $ahora->format("su");

            $consulta=ModeloResidenciales::mdlBuscarResidencial($_POST['resNombre']);
            if ($consulta["existe"]==0) {

                $numerosresidenciales=ModeloResidenciales::mdlconteoResidenciales();
                $IDresidencial=$numerosresidenciales['numerores']+1;

                $oldplanourl="../views/files/Plano".$variableParaPDF.".pdf";
                $oldlotesinfourl="../views/files/InfoLotes".$variableParaPDF.".pdf";
                // echo $pathPDF;
                copy($_FILES['pdfresidencial']['tmp_name'],$oldplanourl);
                copy($_FILES['pdflotesinfo']['tmp_name'],$oldlotesinfourl);
                $pathplanosPDF="../admin".substr($oldplanourl,2);
                $pathlotesinfoPDF="../admin".substr($oldlotesinfourl,2);

                
                $datosResidencial=array(
                    "IDresidencial"=>$IDresidencial,
                    "nombreresidencial"=>$_POST['resNombre'],
                    "direccionresidencial"=>$_POST['Resaddress'],
                    "catastroinfo"=>$_POST['catastrores'],
                    "videores"=>$_POST['linkvideores'],
                    "urlplano"=>$pathplanosPDF,
                    "urlinfolotes"=>$pathlotesinfoPDF,
                );

                $respuestag=ModeloResidenciales::mdlGuardarResidencial($datosResidencial);
                if ($respuestag===TRUE) {
                    echo "ok";
                }else{
                    echo $respuestag;
                }
            }else{
                echo "encontradoerror";
            }
        }


        static public function cargarResidenciales(){
            $traerresidenciales=ModeloResidenciales::mdlCargarResidenciales();
            echo json_encode($traerresidenciales,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        static public function editarResidenciales(){

            $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
            $variableParaPDFedit = $ahora->format("su");
            $rutanueva1='';
            $rutanueva2='';
            if($_FILES['pdfresidencialedit']['name'] == ""){

                $rutanueva1=$_POST['linkresidencialplano'];
            
            }else{
                $rutacorregida1="..".substr($_POST['linkresidencialplano'],8);
                unlink($rutacorregida1);
                $oldpathPDF1="../views/files/Plano".$variableParaPDFedit.".pdf";
                
                copy($_FILES['pdfresidencialedit']['tmp_name'],$oldpathPDF1);
                $rutanueva1="../admin".substr($oldpathPDF1,2);
            }



            if($_FILES['pdflotesinfoedit']['name'] == ""){

                $rutanueva2=$_POST['listaloteslink'];
            
            }else{
                $rutacorregida2="..".substr($_POST['listaloteslink'],8);
                // // $pathPDF=$_SERVER['DOCUMENT_ROOT']."/Proyecto_bienes_raices/admin/views/files/Lote".$IDlote.".pdf";
                unlink($rutacorregida2);
                $oldpathPDF2="../views/files/InfoLotes".$variableParaPDFedit.".pdf";
                // // echo $pathPDF;
                copy($_FILES['pdflotesinfoedit']['tmp_name'],$oldpathPDF2);
                $rutanueva2="../admin".substr($oldpathPDF2,2);
            }
            
            // echo $_FILES['pdflotesinfoedit']['name'];


            $datosActualizados=array(
                "IDresidencial"=>$_POST['idresidencial'],
                "AcNombre"=>$_POST['editarnombreResidencial'],
                "ActDireccion"=>$_POST['editardireccionresidencial'],
                "ActCatastro"=>$_POST['catastroresedit'],
                "ActLink"=>$_POST['linkvideoresedit'],
                "ActPlano"=>$rutanueva1,
                "ActLoteslistas"=>$rutanueva2,
            );

            $actualizadoR=ModeloResidenciales::mdlEditarResidencial($datosActualizados);
            if ($actualizadoR===TRUE) {
                echo "ok";
            }else{
                echo $actualizadoR;
            }


        }


        static public function eliminarResidenciales(){
            
            $eliminado=ModeloResidenciales::mdlEliminarResidencial($_POST['idresidenciales']);
            if ($eliminado===TRUE) {
                echo "ok";
            }else{
                echo $eliminado;
            }
        }

        static public function guardarimgs(){
            
      
        $ruta='';
        $ahora = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
        $variableParaImg = $ahora->format("su");


        $IDres=$_POST['IDresidencial'];
        $url_imagen=$_FILES['file']['tmp_name'];
        
        // echo $url_imagen=$_FILES['file']['type'];
        if ($_FILES['file']['type']=='image/jpg') {
            $ruta="../views/img/imgresidencial/".$IDres."_img".$variableParaImg.".jpg";
        }
        if ($_FILES['file']['type']=='image/png') {
            $ruta="../views/img/imgresidencial/".$IDres."_img".$variableParaImg.".png";

        }
         if ($_FILES['file']['type']=='image/jpeg') {
            $ruta="../views/img/imgresidencial/".$IDres."_img".$variableParaImg.".jpeg";


        }

        copy($url_imagen,$ruta);


        $nuevaruta="../admin".substr($ruta,2);

        $DatosAGuardarres=array(
            "IDlresig"=>$IDres,
            "imagenesurl"=>$nuevaruta,
        );


        $guardarimgs=ModeloResidenciales::GuardarArrayImgres($DatosAGuardarres);

        if ($guardarimgs===TRUE) {
            echo "ok";
        }else{
            echo $guardarimgs;
        }
        }


        static public function cargarimgs(){
            $traerimgs=ModeloResidenciales::cargarimgs($_POST['idres']);
            echo json_encode($traerimgs,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        static public function ctrEliminarimgres(){
            $eliminarimg=ModeloResidenciales::mdlEliminarImgres($_POST['idresi']);
            if ($eliminarimg===TRUE) {
                $nuevaruta="..".substr($_POST['url'],8);
                unlink($nuevaruta);
                echo "ok";
            }else{
                echo $eliminarimg;
            }  
        }

        static public function ctrCargarResidencialesPagina(){
            $residencialesaPagina=ModeloResidenciales::mdlDatosRPagina();
            echo json_encode($residencialesaPagina,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        }
    }
?>