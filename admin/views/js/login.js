$("#formlogin").submit(function (e){
    e.preventDefault();
    var parametros=new FormData($('#formlogin')[0]);
	parametros.append("identificador","login");

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
            $('#positivo').fadeIn(500);
            $('#positivo').fadeOut( 3000 );

            window.setTimeout('location.href="inicio"', 2000);
            }else if (data==2 || data=='sinUser') {

                $('#negativo').fadeIn(500);
                $('#negativo').fadeOut( 1000 );

            }else if (data=='alertades') {
                $('.card').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Su Usuario ha sido desactivado',
                    text: 'Reporte a su superior o al departamento de IT',
            }).then((result)=>{
                $('.card').show();
            });
            }

        }

    });
});