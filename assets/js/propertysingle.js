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
        
    $(document).ready(function(){
        
        $.ajax({
        
            type: "POST",
        
            url: "admin/controllers/lotes.controller.php",
        
            data: {identificador:'cargarlotespagina'},
        
            dataType: "json",
        
            // processData: false,
            // contentType: false,
        
            cache: false,
            success: function (data) { 
              // console.log(data);

              for (let i = 0; i < data.length; i++) {
                let urlimglote= data[i]['url_image'].substring(3);
                $('.listal').append(`
                <div class="col-md-4">
                  <div class="card-box-a card-shadow">
                  <div class="img-box-a">
                    <img src="${urlimglote}" alt="" class="img-a img-fluid loteimg" style="height: 400px;">
                  </div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a">
                          <a href="lote.html?idlote=${data[i]['IDlote']}">${data[i]['Direccion']}</a>
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
        
        });
    });



  })()
  