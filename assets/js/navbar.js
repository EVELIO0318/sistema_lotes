$(document).ready(function(){
    $.ajax({
      
        type: "POST",
    
        url: "admin/controllers/residenciales.controller.php",
    
        data: {identificador:'solonombres'},
    
        dataType: "json",
    
        // processData: false,
        // contentType: false,
    
        cache: false,
        success: function (datalone) {
          for (let i = 0; i < datalone.length; i++) {
            $('.menures').append(`
              <a class="dropdown-item " href="residencial.html?idresidencial=${datalone[i]['IDresidenciales']}">${datalone[i]['nombre_res']}</a>
            `);
          }
        }
    });

});


