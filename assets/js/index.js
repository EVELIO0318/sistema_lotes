$(document).ready(function(){
  
    let carrousel1=new Swiper('.intro-carousel', {
        speed: 600,
        loop: true,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true
        }
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

          for (let i = 0; i < data.length; i++) {
            let urlimg= data[i]['url_image_res'].substring(3);
            if (i==0) {
              $('.imgback0').css("background-image", `url(${urlimg})`);
              $('.nameres').text(data[i]['nombre_res']); 
              $('.addresres').text(data[i]['ubicacion']);
              $('.btnverres').attr("href",`residencial.html?idresidencial=${data[i]['IDresidenciales']}`); 
            }else{
              carrousel1.appendSlide(`
              <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(${urlimg})">
              <div class="overlay overlay-a"></div>
              <div class="intro-content display-table">
                <div class="table-cell">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="intro-body">
                          <p class="intro-title-top">${data[i]['ubicacion']}
                          </p>
                          <h1 class="intro-title mb-4 ">
                            </span>
                            <br> ${data[i]['nombre_res']}
                          </h1>
                          <p class="intro-subtitle intro-price">
                            <a href="residencial.html?idresidencial=${data[i]['IDresidenciales']}"><span class="price-a">Ver Más</span></a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              `);
            }
          }
        }
    
    });


});






    
  