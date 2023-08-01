$(document).ready(function(){
    // $('#phone').mask('0000-0000');
    load();
})


function load() {
	$('#usuarios').DataTable( {
		responsive: true,
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ usuarios",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ usuarios)",
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
            "url" : "controllers/usuarios.controller.php",
            "data": {identificador:"cargarusuarios"},
            "dataSrc":'',
        },
        "columns":[
        	{"data":"IDusuario"},
        	{"data":"nombre"},
            {"data":"apellido"},
        	{"data":"direccion"},
        	{"data":"correo"},
            
            {"defaultContent": `<div class="btn-group">
                    <button class="btn btn-warning btneditar"  data-toggle="modal" data-target="#modaleditarusuario" id="btneditarusuario">
                        <i class="fas fa-edit" style="color: white;">
                        </i>
                    </button>
                    <button class="btn btn-danger btneliminar" id="btneliminar">
                        <i class="fa fa-times"></i>
                    </button>
                    </div>`},
        ],
                // "rowCallback": function( row, data ) {
                // if ( data.estado == 1 ) {
                //     $('td:eq(5)', row).html( 'Activo' );
                // }
                // }
    });
    }


$('#guardarusuario').submit(function(e){
    e.preventDefault();
    var parametros=new FormData($('#guardarusuario')[0]);
	parametros.append("identificador","crearUsuario");

    $.ajax({

        type: "POST",

        url: "controllers/usuarios.controller.php",

        data: parametros,

        dataType: "html",

        processData: false,
        contentType: false,

        cache: false,
        success: function (data) {
            console.log(data);

            if (data=='ok') {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Guardado con éxito',
                });
                load();
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
            $('#guardarusuario').trigger("reset"); 

        }

    });
});

$('#usuarios tbody').on("click","button.btneditar",function(){
    var datosusuario=$(this).parents('tr');
	if (datosusuario.hasClass('child')) {
		datosusuario=datosusuario.prev();
	}
	var nuevosdatos=$('#usuarios').DataTable().row(datosusuario).data();

    console.log(nuevosdatos);

    $("#idusuario").val(nuevosdatos['IDusuario']);
    $("#editarnombre").val(nuevosdatos['nombre']);
    $("#editarapellido").val(nuevosdatos['apellido']);
    $("#editaraddress").val(nuevosdatos['direccion']);
    $("#passwordactual").val(nuevosdatos['pass']);
});


$('#editarusuario').submit(function(e){
    e.preventDefault();
    var datoseditados=new FormData($('#editarusuario')[0]);
	datoseditados.append("identificador","editarusuario");

    $.ajax({

        type: "POST",

        url: "controllers/usuarios.controller.php",

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
                    title: 'Usuario Actualizado con éxito',
                });
                load();
            }else if(data=='encontradoerror'){
                Swal.fire({
                        icon: 'error',
                        title: 'Este nombre y apellido ya esta en uso',
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


$('#usuarios tbody').on("click","button.btneliminar",function(){
    var datosusuario=$(this).parents('tr');
	if (datosusuario.hasClass('child')) {
		datosusuario=datosusuario.prev();
	}
	var nuevosdatos=$('#usuarios').DataTable().row(datosusuario).data();

    // console.log(nuevosdatos);

    Swal.fire({
        title: '¿Esta seguro que desea Eliminar Este Usuario?',
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

                url: "controllers/usuarios.controller.php",

                data: {identificador:"eliminarusuario",iduser:nuevosdatos['IDusuario']},

                // dataType: "JSON",

                cache: false,
                success: function (response) {
                    console.log(response);
                    if (response=='ok') {
                        Swal.fire({
                                icon: 'success',
                                title: 'Usuario Eliminado con éxito',
                        });
                        $('#usuarios').DataTable().ajax.reload();
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