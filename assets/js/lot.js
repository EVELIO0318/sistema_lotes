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

    let single=new Swiper('.intro-carousel', {
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
        
    $(document).ready(function(){
      var prodId = getParameterByName('idlote');

      // console.log(prodId);
    
    
        $.ajax({
        
            type: "POST",
        
            url: "admin/controllers/lotes.controller.php",
        
            data: {identificador:'cargarlotepag',id:prodId},
        
            dataType: "json",
        
            // processData: false,
            // contentType: false,
        
            cache: false,
            success: function (data) { 
            //   $('.nameres,.nameaddr').text(data['nombre_res']);
            //   $('.resaddr').text(data['ubicacion']);
            //   $('.linkplane').attr('href',(data['plano_pdf']).substring(3));
            //   let link=data['link_video_res'];
            //   $('.linkvideores').attr('src',`https://www.youtube.com/embed/${link.substring(link.length - 11)}`);
            //   $('.infolotes').attr('src',data['info_lotes_pdf'].substring(3));
            //   $('.catastroinfo').attr('src',data['info_catastro']);
            }
        
        });


         traerimgsindividuales(prodId);
    });


    function getParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }


  function traerimgsindividuales(prodId){
    
    
    $.ajax({
        
      type: "POST",
  
      url: "admin/controllers/lotes.controller.php",
  
      data: {identificador:'cargarlotepagimg',id:prodId},
  
      dataType: "json",
  
      // processData: false,
      // contentType: false,
  
      cache: false,
      success: function (data) { 
        console.log(data); 

        // for (let i = 0; i < data.length; i++) {
        //   if (i==0) {
        //     $('.imgback0').css("background-image", `url(${(data[0]['url_image_res']).substring(3)})`);
        //   }else{
        //     single.appendSlide(`
        //     <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(${(data[i]['url_image_res']).substring(3)})">
        //     </div
        //      `);
        //   }
          
        // }
      }
  
  });
  };


  })()
  