$(document).ready(function (){
    loadresidenciales();
});

$('#pdflotesinfo,#pdfresidencial').on('change', function(){
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

$('#guardarresidencial').submit(function (e){
    e.preventDefault();

    var parametrosresidencial=new FormData($('#guardarresidencial')[0]);
	parametrosresidencial.append("identificador","crearResidencial");

    console.log(parametrosresidencial);

    $.ajax({

        type: "POST",

        url: "controllers/residenciales.controller.php",

        data: parametrosresidencial,

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
                $('#guardarresidencial').trigger("reset"); 
                loadresidenciales();
            }else if(data=='encontradoerror'){
                Swal.fire({
                        icon: 'error',
                        title: 'Este usuario ya existe',
                        text: 'Cambielo por otro nuevo',
                    });
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

function loadresidenciales(){
    $('#residenciales').DataTable( {
		responsive: true,
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ residenciales",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ residenciales)",
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
            "url" : "controllers/residenciales.controller.php",
            "data": {identificador:"cargarres"},
            "dataSrc":'',
        },
        "columns":[
        	{"data":"IDresidenciales"},
        	{"data":"nombre_res"},
            {"data":"ubicacion"},
            {"data":"info_catastro",
            render: function (data,type,row) {
                    return ` <a class="btn btn-info btninfocatastro" id="btninfocatastro" href="${data}" target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>`;
            },className: "text-center"
            },
            {"data":"plano_pdf",
        		render: function (data,type,row) {
        				return `<a class="btn btn-success btnplanos" href="${data}" id="btnplanos" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>`;
        		},className: "text-center"
        	},
            {"data":"link_video_res",
                render: function (data,type,row) {
                        return ` <a class="btn btn-danger btnvideores" href="${data}" id="btnvideores" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>`;
                },className: "text-center"
        	},
            {"data":"info_lotes_pdf",
        		render: function (data,type,row) {
        				return `<a class="btn btn-success btninfolotes" href="${data}" id="btninfolotes" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>`;
        		},className: "text-center"
        	},
            {"data": null,
                render: function () {
                        return ` <button class="btn btn-secondary crudfotos" id="crudfotos" data-toggle="modal" data-target="#crudfotos" name="crudfotos">
                                    <i class="fas fa-eye"></i>
                                </button>`;
                },className: "text-center"
            },
            
            {"defaultContent": `<div class="btn-group">
                    <button class="btn btn-primary subirfotos" id="subirfotos" data-toggle="modal" data-target="#verfotos" name="subirfotos">
                        <i class="fas fa-upload"></i>
                    </button>
                    <button class="btn btn-warning btneditarresidencial"  data-toggle="modal" data-target="#modaleditarresidencial" id="btneditarresidencial">
                        <i class="fas fa-edit" style="color: white;">
                        </i>
                    </button>
                    <button class="btn btn-danger btneliminarresidenciales" id="btneliminarresidencial">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>`},
        ],
        
    });


    $('#residenciales tbody').on("click","button.btneditarresidencial",function(){
        var datosresidencial=$(this).parents('tr');
        if (datosresidencial.hasClass('child')) {
            datosresidencial=datosresidencial.prev();
        }
        var nuevosdatosre=$('#residenciales').DataTable().row(datosresidencial).data();
    
        // console.log(nuevosdatosre);
    
        $("#idresidencial").val(nuevosdatosre['IDresidenciales']);
        $("#editarnombreResidencial").val(nuevosdatosre['nombre_res']);
        $("#editardireccionresidencial").val(nuevosdatosre['ubicacion']);
    });


    $('#editarresidencial').submit(function (e){
        e.preventDefault();
        var parametrosresidencialeditar=new FormData($('#editarresidencial')[0]);
	    parametrosresidencialeditar.append("identificador","editarResidencial");

        $.ajax({

            type: "POST",
    
            url: "controllers/residenciales.controller.php",
    
            data: parametrosresidencialeditar,
    
            dataType: "html",
    
            processData: false,
            contentType: false,
    
            cache: false,
            success: function (data) {
                console.log(data);
    
                if (data=='ok') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Residencial Actualizado con éxito',
                    });
                    loadresidenciales();
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
}


$('#residenciales tbody').on("click","button.btneliminarresidenciales",function(){
    var datos=$(this).parents('tr');
    if (datos.hasClass('child')) {
        datos=datos.prev();
    }
    var nuevosdatosel=$('#residenciales').DataTable().row(datos).data();

    Swal.fire({
        title: '¿Esta seguro que desea Eliminar Esta Residencial?',
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

                url: "controllers/residenciales.controller.php",

                data: {identificador:"eliminarresidencial",idresidenciales:nuevosdatosel['IDresidenciales']},

                // dataType: "JSON",

                cache: false,
                success: function (response) {
                    console.log(response);
                    if (response=='ok') {
                        Swal.fire({
                                icon: 'success',
                                title: 'Residencial Eliminada con éxito',
                        });
                        $('#residenciales').DataTable().ajax.reload();
                    }else{
                        Swal.fire({
                                icon: 'error',
                                title: 'Ha ocurrido un error fatal',
                                text: 'Contacte a soporte',
                        });
                    }
                }
            });
        }
    });
});