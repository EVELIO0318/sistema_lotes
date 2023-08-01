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
                $pathplanosPDF="../admin".$oldplanourl;
                $pathlotesinfoPDF="../admin".$oldlotesinfourl;

                
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

            $rutanueva1='';
            $rutanueva2='';
            if($_FILES['pdfresidencialedit']['name'] == ""){

                $rutanueva1=$_POST['linkresidencialplano'];
            
            }else{
                // // $pathPDF=$_SERVER['DOCUMENT_ROOT']."/Proyecto_bienes_raices/admin/views/files/Lote".$IDlote.".pdf";
                $oldpathPDF1="../views/files/Plano".$_POST['idresidencial'].".pdf";
                // // echo $pathPDF;
                copy($_FILES['pdfresidencialedit']['tmp_name'],$oldpathPDF1);
                $rutanueva1="../admin".substr($oldpathPDF1,2);
            }



            if($_FILES['pdflotesinfoedit']['name'] == ""){

                $rutanueva2=$_POST['listaloteslink'];
            
            }else{

                // // $pathPDF=$_SERVER['DOCUMENT_ROOT']."/Proyecto_bienes_raices/admin/views/files/Lote".$IDlote.".pdf";
                $oldpathPDF2="../views/files/InfoLotes".$_POST['idresidencial'].".pdf";
                unlink($oldpathPDF2);
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
    }
?>