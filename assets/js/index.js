$(document).ready(function(){
    $.ajax({
    
        type: "POST",
    
        url: "admin/controllers/residenciales.controller.php",
    
        data: {identificador:'cargarparapagina'},
    
        dataType: "json",
    
        // processData: false,
        // contentType: false,
    
        cache: false,
        success: function (data) {
            // swiper.appendSlide(`<div class="swiper-slide">new new</div>`);
            //aqui va el swiper add    
        }
    
    });


});



    
  