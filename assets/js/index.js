document.addEventListener("DOMContentLoaded", (event) => {
    var mySwiper = new Swiper('.swiper-container', {
        // ...other parameters
        observer: true
    });
    $.ajax({
    
        type: "POST",
    
        url: "admin/controllers/residenciales.controller.php",
    
        data: {identificador:'cargarparapagina'},
    
        dataType: "json",
    
        // processData: false,
        // contentType: false,
    
        cache: false,
        success: function (data) {

            //aqui va el swiper add    
        }
    
    });
});


    
  