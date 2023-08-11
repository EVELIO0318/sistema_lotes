(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Toggle .navbar-reduce
   */
  let selectHNavbar = select('.navbar-default')
  if (selectHNavbar) {
    onscroll(document, () => {
      if (window.scrollY > 100) {
        selectHNavbar.classList.add('navbar-reduce')
        selectHNavbar.classList.remove('navbar-trans')
      } else {
        selectHNavbar.classList.remove('navbar-reduce')
        selectHNavbar.classList.add('navbar-trans')
      }
    })
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Search window open/close
   */
  let body = select('body');
  on('click', '.navbar-toggle-box', function(e) {
    e.preventDefault()
    body.classList.add('box-collapse-open')
    body.classList.remove('box-collapse-closed')
  })

  on('click', '.close-box-collapse', function(e) {
    e.preventDefault()
    body.classList.remove('box-collapse-open')
    body.classList.add('box-collapse-closed')
  })

  /**
   * Intro Carousel
   */
  

  /**
   * Property carousel
   */
  /**
   * News carousel
   */
  let carrousel3=new Swiper('#news-carousel', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.news-carousel-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    }
  });

  /**
   * Property Single carousel
   */
  new Swiper('#property-single-carousel', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.property-single-carousel-pagination',
      type: 'bullets',
      clickable: true
    }
  });
  
  
  let carrousel1=new Swiper('.intro-carousel', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });
  let carrousel2=  new Swiper('#property-carousel', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.propery-carousel-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
  
      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      autoHeight: false,
    }
  });
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
            for (let i = 0; i < data.length; i++) {
              let urlimg= data[i]['url_image_res'].substring(3);
              if (i==0) {
                $('.imgback0').css("background-image", `url(${urlimg})`);
                $('.nameres').text(data[i]['nombre_res']); 
                $('.addresres').text(data[i]['ubicacion']);
                $('.btnverres').attr("href",`residencial.html?idresidencial=${data[i]['IDresidenciales']}`); 


                $(".imgres2").attr("src",urlimg);
                $('.addresresi').text(data[i]['ubicacion']);
                $('.addresresi').attr("href",`residencial.html?idresidencial=${data[i]['IDresidenciales']}`);
              }
              else{
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
                carrousel3.appendSlide(`
                <div class="carousel-item-c swiper-slide">
                  <div class="card-box-b card-shadow news-box">
                    <img src="${urlimg}" alt="" class="img-b img-fluid" style="height: 300px;">
                  </div>
                  <div class="card-overlay">
                    <div class="card-header-b">
                      <div class="card-category-b">
                        <a href="residencial.html?idresidencial=${data[i]['IDresidenciales']}" class="category-b">Disponible</a>
                      </div>
                      <div class="card-title-b">
                        <h2 class="title-2">
                          <a href="residencial.html?idresidencial=${data[i]['IDresidenciales']}">${data[i]['ubicacion']}</a>
                        </h2>
                      </div>
                      <div class="card-date">
                       
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
  
  
      loadlotes();
  
  
  });
  
  
  
  function loadlotes(){
    $.ajax({
      
      type: "POST",
  
      url: "admin/controllers/lotes.controller.php",
  
      data: {identificador:'cargarlotespagina'},
  
      dataType: "json",
  
      // processData: false,
      // contentType: false,
  
      cache: false,
      success: function (data) {
        for (let i = 0; i < data.length; i++) {
          let urlimglote= data[i]['url_image'].substring(3);
          if (i==0) {
            $(".loteimg").attr("src",urlimglote);
            $('.linklote').text(data[0]['Direccion']);
            $('.linktolote').attr("href",`lote.html?idlote=${data[i]['IDlote']}`)
          }else{
            carrousel2.appendSlide(`
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="${urlimglote}" alt="" class="img-a img-fluid loteimg" style="height: 400px;">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="#">${data[i]['Direccion']}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">Disponible</span>
                      </div>
                    </div>
                    <div class="card-footer-a" style="height: 50%;">
                      <div class="card-info d-flex justify-content-around">
                        <a href="lote.html?idlote=${data[i]['IDlote']}" class="link-a">Click para ver Más
                          <span class="bi bi-chevron-right"></span>
                        </a>
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
  }
  
  
      
    
})()
