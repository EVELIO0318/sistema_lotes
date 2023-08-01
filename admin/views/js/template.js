$(document).ready(function () {
    cargardatousuario();
});


function cargardatousuario() {
    $.ajax({

        type: "POST",

        url: "controllers/usuarios.controller.php",

        data: {identificador:"traerdatousuario"},

        dataType: "html",

        

        cache: false,
        success: function (data) {
            // console.log(data);
            
            $("#usuarionombre").text(data);
            // // console.log(datosusuario.foto);


            

        }

    });
}