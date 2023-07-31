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
            
            $consulta=ModeloResidenciales::mdlBuscarResidencial($_POST['resNombre']);
            if ($consulta["existe"]==0) {

                $numerosresidenciales=ModeloResidenciales::mdlconteoResidenciales();
                $IDresidencial=$numerosresidenciales['numerores']+1;

                $oldplanourl="../views/files/Plano".$IDresidencial.".pdf";
                $oldlotesinfourl="../views/files/InfoLotes".$IDresidencial.".pdf";
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
            $datosActualizados=array(
                "IDresidencial"=>$_POST['idresidencial'],
                "AcNombre"=>$_POST['editarnombreResidencial'],
                "ActDireccion"=>$_POST['editardireccionresidencial'],
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