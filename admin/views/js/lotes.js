

$(document).ready(function (){
    // cargarRsidenciales();
    loadlotes();
   cargarDropzone();
});


$('#pdffile,#editpdffile').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
      if(ext != "pdf"){
          $( this ).val('');
          Swal.fire({
            icon: 'error',
            title: 'El Archivo no es un Archivo PDF',
            text: 'Seleccione otro',
        });
      }
    }
  });

 $("#guardarlote").submit(function (e){
    e.preventDefault();
    let ArrayLote= new FormData($('#guardarlote')[0]);
    ArrayLote.append("identificador","crearLote");

    $.ajax({

        type: "POST",

        url: "controllers/lotes.controller.php",

        data: ArrayLote,

        dataType: "html",

        processData: false,
        contentType: false,

        cache: false,
        success: function (data) {
            console.log(data);

            if (data=='ok') {
                Swal.fire({
                    icon: 'success',
                    title: 'Residencial Guardado con éxito',
                });
                $('#guardarlote').trigger("reset"); 
                loadlotes();
            }else{
                Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error fatal',
                text: 'Contacte a soporte',
            });
            }

        }

    });
 });


function loadlotes() {
    $('#lotes').DataTable( {
		responsive: true,
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ lotes",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando lotes del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando lotes del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ lotes)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

		},
        destroy: true,
        "ajax": {
            "method": "POST",
            "url" : "controllers/lotes.controller.php",
            "data": {identificador:"cargarlotes"},
            "dataSrc":'',
        },
        "columns":[
        	{"data":"IDlote",className: "text-center"},
        	{"data":"Direccion",className: "text-center"},
            {"data":"link_ficha_catastral",
        		render: function (data,type,row) {
        				return ` <a class="btn btn-info btnvercatastro" id="btnvercatastro" href="${data}" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>`;
        		},className: "text-center"
        	},
            {"data":"pdf_expediente",
        		render: function (data,type,row) {
        				return `<a class="btn btn-success btnexpendiente" href="${data}" id="btnexpendiente" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>`;
        		},className: "text-center"
        	},
            // {"defaultContent": `<div class="btn-group">
            //     <button class="btn btn-primary subirfotos" id="subirfotos" data-toggle="modal" data-target="#verfotos" name="subirfotos">
            //         <i class="fas fa-upload"></i>
            //     </button>
            //     /div>`},
             {
            render: function () {
                    return ` <button class="btn btn-secondary crudfotos" id="crudfotos" data-toggle="modal" data-target="#crudfotos" name="crudfotos">
                                <i class="fas fa-eye"></i>
                            </button>`;
            },className: "text-center"
            },
            {"data":"link_video",
                render: function (data,type,row) {
                        return ` <a class="btn btn-danger btnvideo" href="${data}" id="btnvideo" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>`;
                },className: "text-center"
        	},
            {"defaultContent": `<div class="btn-group">
                    <button class="btn btn-primary subirfotos" id="subirfotos" data-toggle="modal" data-target="#verfotos" name="subirfotos">
                        <i class="fas fa-upload"></i>
                    </button>
                    <button class="btn btn-warning btneditarlote"  data-toggle="modal" data-target="#modaeditarlote" id="btneditarlote">
                        <i class="fas fa-edit" style="color: white;">
                        </i>
                    </button>
                    <button class="btn btn-danger btnborrarlote" id="btnborrarlote" name="btnborrarlote">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>`},
        ],
    });
}
$('#lotes tbody').on("click","button.btneditarlote",function(){
    var datoslote=$(this).parents('tr');
    if (datoslote.hasClass('child')) {
        datoslote=datoslote.prev();
    }
    var nuevosdatoslote=$('#lotes').DataTable().row(datoslote).data();


    $("#idlote").val(nuevosdatoslote['IDlote']);
    $("#editclavecatastral").val(nuevosdatoslote['link_ficha_catastral']);
    $("#editlinkYoutube").val(nuevosdatoslote['link_video']);
    $("#oldpdf").val(nuevosdatoslote['pdf_expediente']);
    $("#addresloteedit").val(nuevosdatoslote['Direccion']);
});



function cargarDropzone() {

    $('#lotes tbody').on("click","button.subirfotos",function(){
        var imagelote=$(this).parents('tr');
        if (imagelote.hasClass('child')) {
            imagelote=imagelote.prev();
        }
        var nuevosimagelote=$('#lotes').DataTable().row(imagelote).data();
        $("#idimglote").val(nuevosimagelote['IDlote'])
        myFileUploadDropZone.removeAllFiles(); 
    });


    let arrayImage=[];
    var myFileUploadDropZone = new Dropzone(".dropzone", {
       url: "/Proyecto_bienes_raices/admin/",
       maxFiles: 15,
       maxFilesize: 50,
       acceptedFiles: ".png, .jpg",
       addRemoveLinks: true,
       dictDefaultMessage: "Arrastra las imagenes o presiona aqui para subir",
       dictFallbackMessage: "Your browser does not support drag & drop feature.",
       dictInvalidFileType: "Esta no es una imagen,eliminela.",
       dictFileTooBig: "File is too big ({{filesize}} MB). Max filesize: {{maxFilesize}} MB.",
       dictResponseError: "Server responded with {{statusCode}} code.",
       dictCancelUpload: "Cancel Upload",
       dictRemoveFile: "Remove",
    });
    myFileUploadDropZone.on('addedfile',file=>{
       arrayImage.push(file);
    });

    

    myFileUploadDropZone.on('removedfile',file=>{
        let i =arrayImage.indexOf(file);
        arrayImage.splice(i,1);
     });

    $("#guardarimglotes").click(function () {
        if (arrayImage.length==0) {
            Swal.fire({
                    icon: 'error',
                    title: 'No ha cargador imagenes',
                    text: 'Cargue una imagen antes',
                });
        }else{
            let idloteimg=$("#idimglote").val();
            for (let i = 0; i < arrayImage.length; i++) {
                let imgData=new FormData();
                imgData.append("IDlote",idloteimg);
                imgData.append("file",arrayImage[i]);
                imgData.append("identificador","guardarimg");

                $.ajax({
    
                    type: "POST",
            
                    url: "controllers/lotes.controller.php",
            
                    data: imgData,
            
                    dataType: "html",
            
                    processData: false,
                    contentType: false,
            
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        if (data=='ok') {
                            flasher.success("Imagen Cargada con éxito");
                            myFileUploadDropZone.removeAllFiles();
                        }else{
                            flasher.error("Ha ocurrido un error fatal, Contacte a Evelio");
                        }
            
                    }
            
                });
    
            }
        }
    });
 };


 $('#lotes tbody').on("click","button.crudfotos",function(){
    var datosparaimg=$(this).parents('tr');
    if (datosparaimg.hasClass('child')) {
        datosparaimg=datosparaimg.prev();
    }
    
    var imgdata=$('#lotes').DataTable().row(datosparaimg).data();
    console.log(imgdata['IDlote']);
    cargarimagenesatabla(imgdata['IDlote']);
});


function cargarimagenesatabla(id){
    $('#imglotes').DataTable( {
		responsive: true,
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ imagenes",
			"sZeroRecords":    "No se encontraron imagenes",
			"sEmptyTable":     "No existe ninguna imagen guardada para este lote",
			"sInfo":           "Mostrando imagenes del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando imagenes del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ imagenes)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

		},
        destroy: true,
        "ajax": {
            "method": "POST",
            "url" : "controllers/lotes.controller.php",
            "data": {identificador:"cargarimgs",idlote:id},
            "dataSrc":'',
        },
        "columns":[
        	{"data":"IDimagen",className: "text-center"},
        	{"data":"url_image",
        		render: function (data,type,row) {
        				return ` <div class="text-center">
                                    <img src="${data}" class="img-thumbnail img-fluid" alt="img">
                                    </div>`;
        		},className: "text-center"},
            {"defaultContent": `<div class="btn-group">
                    <button class="btn btn-danger btnborrarimg" id="btnborrarimg">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>`,className: "text-center"},
        ],
    });
}

$('#imglotes tbody').on("click","button.btnborrarimg",function(){
    var datosimg=$(this).parents('tr');
    if (datosimg.hasClass('child')) {
        datosimg=datosimg.prev();
    }
    var datosmg=$('#imglotes').DataTable().row(datosimg).data();


    
    Swal.fire({
        title: '¿Esta seguro que desea Eliminar Esta Imagen?',
        text: "Esta Acción no se puede Deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({

                type: "POST",

                url: "controllers/lotes.controller.php",

                data: {identificador:"eliminarimglote",idlote:datosmg['IDimagen'],url:datosmg['url_image']},

                dataType: "html",

                cache: false,
                success: function (response) {
                    console.log(response);
                    if (response=='ok') {
                        flasher.success("Imagen Eliminada con éxito");
                        $('#imglotes').DataTable().ajax.reload();
                    }else{
                        Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error fatal',
                                text: 'Contacte a soporte',
                        });
                    }
                },
                error : function(xhr, status) {
                    console.log(xhr);
                },
            });
        }
    });


});

$("#editclavecatastral,#editlinkYoutube").focus(function(){	   
    this.select();
  });

$("#editarlote").submit(function (e) { 
    e.preventDefault();
    let datoseditados=new FormData($('#editarlote')[0]);
    datoseditados.append("identificador","editarlote");
    $.ajax({

        type: "POST",

        url: "controllers/lotes.controller.php",

        data: datoseditados,

        dataType: "html",

        processData: false,
        contentType: false,

        cache: false,
        success: function (data) {
            console.log(data);

            if (data=='ok') {
                Swal.fire({
                    icon: 'success',
                    title: 'Residencial Actualizada con éxito',
                });
                $('#lotes').DataTable().ajax.reload();
                $("#editpdffile").val(''); 
            }else{
                Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error fatal',
                text: 'Contacte a soporte',
            });
            }

        }

    });
});


$('#lotes tbody').on("click","button.btnborrarlote",function(){
    var datosaeliminar=$(this).parents('tr');
    if (datosaeliminar.hasClass('child')) {
        datosaeliminar=datosaeliminar.prev();
    }
    
    var imgdata=$('#lotes').DataTable().row(datosaeliminar).data();
    // console.log(imgdata['IDlote']);

     
    Swal.fire({
        title: '¿Esta seguro que desea Eliminar Este Lote?',
        text: "Esta Acción no se puede Deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({

                type: "POST",

                url: "controllers/lotes.controller.php",

                data: {identificador:"eliminarlote",idlote:imgdata['IDlote']},

                dataType: "html",

                cache: false,
                success: function (response) {
                    console.log(response);
                    if (response=='ok') {
                        flasher.success("Lote Eliminado con éxito");
                        $('#lotes').DataTable().ajax.reload();
                    }else{
                        Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error fatal',
                                text: 'Contacte a soporte',
                        });
                    }
                },
                error : function(xhr, status) {
                    console.log(xhr);
                },
            });
        }
    });
    


    
});

 
