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
            carrousel1.appendSlide(`
            <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <p class="intro-title-top">Doral, Florida
                          <br> 78345
                        </p>
                        <h1 class="intro-title mb-4 ">
                          <span class="color-b">204 </span> Mount
                          <br> Olive Road Two
                        </h1>
                        <p class="intro-subtitle intro-price">
                          <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            `);

            carrousel1.appendSlide(`
            <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <p class="intro-title-top">Doral, Florida
                          <br> 78345
                        </p>
                        <h1 class="intro-title mb-4 ">
                          <span class="color-b">204 </span> Mount
                          <br> Olive Road Two
                        </h1>
                        <p class="intro-subtitle intro-price">
                          <a href="#"><span class="price-a">rent | $ 12.000</span></a>
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
    
    });


});






    
  