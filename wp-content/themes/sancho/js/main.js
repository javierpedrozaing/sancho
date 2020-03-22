( function( $ ) { 
  $(document).ready(function(){
     //cargar mas grilla plugin


  
     $('.myportfolio-container').before($('.modal-video-article'));
    $('.esg-loadmore-wrapper').on('click', function(){
      console.log('click grilla');
      $('.esg-loadmore').css('opacity','1');
      // hover de la grilla
      $( ".item_grid_hover" ).hover(function() {
          $(this).addClass('active_hover_grid');
        }, function() {
          $(this).removeClass('active_hover_grid');
        }
      );
    });

    //  $(".cont-footer").on("click", function(){

    //   var page = $(".pagination__next").data("page") + 1;
      
    //   // window.location.href = next_page;
    //     // $('.site-main').infiniteScroll({
    //     //         // options
    //     //         path:  ".pagination__next a",
    //     //         append: '.item_grid_home',
    //     //         history: false

    //     // });
      
    //      $('.container_grid_desk').infiniteScroll({
    //           // options
    //         path:  ".pagination__next a",
    //         append: '.link_grid',
    //         history: false
    //     },

    //   function(new_elts) {

    //       var grid = $('.container_grid_desk');
    //       var elts = $(new_elts).css('opacity', 0);

    //         elts.animate({opacity: 1});
    //          var $container = $('.container_grid');
    //         $container.imagesLoaded( function() {
    //           $container.masonry({
    //               itemSelector: '.item_grid_home',
    //               columnWidth: 0,                  
    //               gutter: 10,                   
    //               horizontalOrder: false                 
    //           });
    //         });
    //   });
    //   //loadMorePost(page);
    // });
    // 
    
                //inicializacion grilla home
          var $container = $('.container_grid');
            $container.imagesLoaded( function() {
              $container.masonry({
                  itemSelector: '.item_grid_home',
                  columnWidth: 0,                  
                  gutter: 10,                   
                  horizontalOrder: false,
                  // nicer reveal transition
                  visibleStyle: { transform: 'translateY(0)', opacity: 1 },
                  hiddenStyle: { transform: 'translateY(100px)', opacity: 0 }             
              });
            });

      //     var msnry = $container.data('masonry');   
      //     $container.infiniteScroll({
      //       // options
      //       path: ".pagination__next a",
      //       append: '.item_grid_home',   
      //       button: '.down-arrow',
      //       history: false,
      //       // using button, disable loading on scroll 
      //       scrollThreshold: false,
      //       outlayer: msnry,


      //   });

    

      //  $container.on( 'request.infiniteScroll', function( event, response, path, items ) {
      //   $container.masonry('destroy');
        
      // });

      //  $container.on( 'load.infiniteScroll', function( event, response, path, items ) {
      //  console.log( 'Loaded: ' + items );
      //   $container.imagesLoaded( function() {
      //   $container.masonry({
      //             itemSelector: '.item_grid_home',
      //             columnWidth: 0,                  
      //             gutter: 10,                   
      //             horizontalOrder: false                 
      //         });
      //     });
      //   });

      
    $(".down-arrow").on("click", function(event){
      event.preventDefault();
      var page = parseInt($(".pagination__next").data("page"));      
      var newpage = page+1;
      loadMorePost(page, newpage);
    });

      // var query = getCookie("_querys");
    
    $( ".container-language" ).hover(function() {
        $('.container-language a').css('display','block'); 
        $('.container-language a.active_language').css('display','block');
      }, function() {
        $('.container-language a').css('display','none'); 
        $('.container-language a.active_language').css('display','block');
      }
    );
  
    $('body, html').addClass('show-scroll');

    // pestaña activa del menu
    var full_path = location.href.split("#")[0];
    $(".menu li a, .home-mobile a").each(function(){
        var $this = $(this);
        if($this.prop("href").split("#")[0] == full_path) {
            $(this).parent().addClass("active_menu");
        }
    });

    $(".container-language a, .container-language-mobile a").each(function(){
        var $this = $(this);
        if($this.prop("href").split("#")[0] == full_path) {
            $(this).addClass("active_language");
        } 
    });

   // ocultar flecha footer dependiendo la url
    var url_string = full_path.split('/');
    //español
    if (url_string[3] == "" || url_string[3] == "work" || url_string[3] == "noticias" || url_string[3] == "thinking"){ 
        $(".down-arrow span").css("display","none");
    } else { 
        $(".down-arrow").css("opacity","0");
    }
    //ingles
    if(url_string[3] == "en"){
      if (url_string[4] == "" || url_string[3] == "work" || url_string[4] == "news" || url_string[4] == "thinking"){ 
          $(".down-arrow span").css("display","none");
      }else { 
          $(".down-arrow").css("opacity","0");
      }
    } 

    const widowDesktop = window.matchMedia( "(min-width: 1024px)" );
      if (widowDesktop.matches) {
        // scroll para ocultar el menu
          var iScrollPos = 0;
          $(document).scroll(function () {
              var iCurScrollPos = $(this).scrollTop();
              if (iCurScrollPos > iScrollPos) {
                $('.header-sancho, .search-container .search-modal-input, .container-language a').css('height','10px');
                $('.header-sancho').css('overflow','hidden');
                $('.menu, .logo-sancho, .active_language').css('opacity', '0');
                    $( ".header-sancho" ).hover(function() {
                      $('.header-sancho, .search-container .search-modal-input, .container-language a').css('height','60px');
                      $('.header-sancho').css('overflow','visible');
                      $('.menu, .logo-sancho, .active_language').css('opacity', '1');
                    }, function() {
                      $('.header-sancho, .search-container .search-modal-input, .container-language a').css('height','10px');
                      $('.header-sancho').css('overflow','hidden');
                      $('.menu, .logo-sancho, .active_language').css('opacity', '0'); 
                    }
                  );
              } else {
                $('.header-sancho, .search-container .search-modal-input, .container-language a').css('height','60px'); 
                $('.header-sancho').css('overflow','visible');
                $('.menu, .logo-sancho, .active_language').css('opacity', '1');
                $('.header-sancho').unbind('mouseenter').unbind('mouseleave');
              }
              iScrollPos = iCurScrollPos;
          });
         

          // inicializacion grilla generica
          var $container1 = $('.grid');
            $container1.imagesLoaded( function() {
              $container1.masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
                gutter: '.grid-gutter'
              }); 
            });

         
// $('.grid').masonry({
//   itemSelector: '.grid-item',
//   columnWidth: '.grid-sizer',
//   percentPosition: true
// });
// $('.container_grid_generic').masonry({
//   itemSelector: '.grid-item',
//   columnWidth: '.grid-sizer',
//   percentPosition: true
// });

            
      } else {  
          // carousel de logo compañia
          $("#galery_company").bxSlider({
            pager: true
          });

          $('.container-img-company, .item_grid_hover').unbind('mouseenter').unbind('mouseleave');

          // desplegar ciudades mobile
          $(document).on('click','.container-country', function(){
            $('.container-country').removeClass('show-country');
            $(this).addClass('show-country');
            // if($(this).find('.info-company').hasClass('show-element')){
            //   $('.company-country').find('.info-company').prev().removeClass('active-country');
            //   $(this).find('.info-company').prev().addClass('active-country');
            // }
          }); 

          // inicializacion grilla home mob
          var $container = $('.container_grid');
          $container.imagesLoaded( function() {
            $container.masonry({
                itemSelector: '.item_grid_home',
                columnWidth: 0,
                gutter: 10                
            });
          });
          // inicializacion grilla generica mob
          // var $container1 = $('.container_grid_generic');
          // $container1.imagesLoaded( function() {
          //   $container1.masonry({
          //       itemSelector: '.item_grid_generic',
          //       columnWidth: 0,
          //       gutter: 10                
          //   });
          // });
      }

      //solo mobile
      const widowMobile = window.matchMedia( "(max-width: 767px)" );
      if (widowMobile.matches) {
        //cortar cadena de noticias
         $(".item_grid_notice p").each(function(){
          var notice = $(this).text();
          if(notice != ""){
            var shortText = jQuery.trim(notice).substring(0, 70) + "...";
            $(this).html(shortText);
          }
        });
      }

      $('.about-img').css({"opacity": "1", "transform": "matrix(1, 0, 0, 1, 0, 0)", "transition": "all 1s"});
      $('.container-text-about').css({"opacity": "1", "transform": "matrix(1, 0, 0, 1, 0, 0)", "transition": "all 1s"});

      
  });
// animacion compartir y ancla
  var scrollPos = 0;
  $(window).scroll(function () {
      var currentPos = $(this).scrollTop();
      if (currentPos <= 10) {
        $('.container-share').css('opacity','0');
      } else{
        $('.container-share').css('opacity','1');
      }
      scrollPos = currentPos;
  });

  // abrir barra de busqueda click en lupa
  $('.button-search').on('click', function(event){
    $('.input-search').focus();
      if($('.input-search').val().length == 0 ) {
          $('.search-container .search-modal-input').toggleClass('open');
          if($('.search-container .search-modal-input').hasClass('open')){            
            $('.container-language').css('right', '27%');
          }else{
            $('.container-language').css('right', '4.7%'); 
          } 
          event.preventDefault();
      }
  });

  // ancla al inicio de la pagina
  $('.img-anchor').on('click', function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
  });

  // activar pestaña menu mob
  $('.icon-menu-mobile').on('click', function(){
    $('.menu-mobile').addClass('active-menu-mobile');
  });
  $('.logo-close-mob').on('click', function(){
    $('.menu-mobile').removeClass('active-menu-mobile');
  });

  // funcionalidad modal de video
  var url = $('#video').attr('src');
  

  //var url_grid = $('.video_grid').attr('src');
  
  // video interna articulo
  $('.container-video-article').on('click', function(){
    $('.modal-video-article').css('display', 'block');
    $('body, html').addClass('hidden-scroll').removeClass('show-scroll');
    $('#video').attr('src', url + '&autoplay=1&showinfo=0');
  });
  $('.close-video-article').on('click', function(){
    $('.modal-video-article').css('display', 'none');
    $('body, html').addClass('show-scroll').removeClass('hidden-scroll');
    $('#video').attr('src', ''); 
  });
  // video grilla
  $('.close-video-grid').on('click', function(){
    $('.modal-video-article').css('display', 'none');
    $('body, html').addClass('show-scroll').removeClass('hidden-scroll');
      var id_video = $(this).prev().attr("id");
      var video = document.getElementById(id_video);
      $(this).prev('#video_grid').attr('src', ''); 
     $("#video_grid").attr("src", "");
      toggleVideo('hide', video);
      var url_post = $(this).data("url");
      //console.log("url video " + video.getElementsByTagName("iframe")[0].src);
      window.location.replace(url_post); 
      // setTimeout(function(){
      //   window.location.replace(url_post);
      // }, 5000);
    
  });
  // $('.container_hover_grid.video_grid_home').on('click', function(){
  //   console.log('click destacadp');
  //   $(this).prev('.modal-video-article').css('display', 'block');
  //   if($(this).prev('.modal-video-article').is(':visible')){
  //     $('body, html').addClass('hidden-scroll').removeClass('show-scroll');
  //   }
  //   $('#video_favorite').attr('src', url_favorite + '&autoplay=1&showinfo=0');
  // });


  $(document).on('click', '.container_hover_grid', function(){
  
       var id_video = $(this).attr("id");
       var video = document.getElementById(id_video);

       console.log("id del video " + id_video + video);
       toggleVideo('show', video);
  });
  

    function toggleVideo(state, video) {
        console.log(state);
          // if state == 'hide', hide. Else: show video            
          var iframe = video.getElementsByTagName("iframe")[0].contentWindow;
          var url_grid = video.getElementsByTagName("iframe")[0].src;
          

          video.style.display = state == 'hide' ? 'none' : 'block';
          func = state == 'hide' ? 'pauseVideo' : 'playVideo';
          if (func == "pauseVideo") {
            console.log("pausa video");
            //url_grid = "";
            //$('.video_grid').attr('src', ''); 
            video.getElementsByTagName("iframe")[0].src = "";    
            console.log(video.getElementsByTagName("iframe")[0].src);         
             //video.getElementsByTagName("iframe").stopVideo();
          }else{
            console.log("autoplay video");
            console.log(video.getElementsByTagName("iframe")[0].src);

            $('body, html').addClass('hidden-scroll').removeClass('show-scroll');
            //$('.video_grid').attr('src', url_grid + '&autoplay=1&showinfo=0');
            video.getElementsByTagName("iframe")[0].src = url_grid + '?enablejsapi=1&autoplay=1';       
            //video.getElementsByTagName("iframe")[0].src = url_grid + '&end=1';                 
          }
          console.log(func);
          iframe.postMessage('{"event":"command","func":"' + func + '","args":""}','*');
          
    
          
         
      }


    // $('.container_hover_grid').click(function(){
    //   var url_favorite = $(this).prev('.modal-video-article').find("#video_grid").attr('src');
    //   console.log(url_favorite);
    //   $(this).prev('.modal-video-article').css('display', 'block');
    //   $('body, html').addClass('hidden-scroll').removeClass('show-scroll');
    //   $(this).prev('.modal-video-article').find("#video_grid").attr('src', url_favorite + '&autoplay=1&showinfo=0');
    // }); 
  

  // hover de logos de compañia
  $( ".container-img-company" ).hover(function() {
      $(this).find('.img-black').css('display', 'none');
      $(this).find('.img-color').css('display', 'block');
    }, function() {
      $(this).find('.img-black').css('display', 'block');
      $(this).find('.img-color').css('display', 'none');
    }
  );

  // activacion de pestaña segun continente
  $('.tab-continent').on('click', function(){
    var tab_id = $(this).attr('data-tab');
    $('.tab-continent').removeClass('active-continent');
    $('.city-continents').removeClass('active-info-continent');
    $(this).addClass('active-continent');
    $("#"+tab_id).addClass('active-info-continent');
  });

  // visualizacion informacion de la compañia
  // $('.company-country').on('click', function(){
  //   $('.company-country').find('.info-company').removeClass('show-element');
  //   $(this).find('.info-company').addClass('show-element');
  //   if($(this).find('.info-company').hasClass('show-element')){
  //     $('.company-country').find('.info-company').prev().removeClass('active-country');
  //     $(this).find('.info-company').prev().addClass('active-country');
  //   }
  // });
  $(document).on("click",".company-country",function() {
      $('.company-country').find('.info-company').removeClass('show-element');
      $(this).find('.info-company').addClass('show-element');
      if($(this).find('.info-company').hasClass('show-element')){
        $('.company-country').find('.info-company').prev().removeClass('active-country');
        $(this).find('.info-company').prev().addClass('active-country');
      }
  });
  // busqueda de ubicaciones
  $('.input-search-ubication').keyup(function(e){
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
      if( $(this).val() == '' ) {
        $(".container-continent").css("display", "block");
        $(".result-search-ubication").css("display", "none");
      }else{
        $.ajax({
         type: "POST",
          url: themeSancho._ajax_url, 
          data: {
            action:'guias',
            ciudad:$(this).val()
          },
          success: function(msg){
              // alert(msg);
              $('#search_query').html(msg);
          },
          error: function(msg){
              console.log(msg.statusText);
          }
       });
      }
  });
  $('.input-search-ubication').keydown(function (e) {
      if (e.keyCode == 13) {
          e.preventDefault();
          return false;
      }
  });
  // visualizacion resultado de busqueda ubicaciones
  $('.input-search-ubication').keypress(function() {
      $(".container-continent").css("display", "none");
      $(".result-search-ubication").css("display", "block");
  });

  // lista de sugerencias buscador general
  // $('.input-search').keypress(function(e) {
  //     $(".list-sugestion").css("opacity", "1");
  //     $(".list-sugestion").css("display", "block");
  // });
  // lista de sugerencias buscador general
  $('.input-search').keydown(function(e) {
      $(".list-sugestion").css("opacity", "1");
      $(".list-sugestion").css("display", "block");
  });
  // ocultar lista de sugerencias
  $('.input-search').keyup(function(e){
      if( $(this).val() == '' ) {
        $(".list-sugestion").css("opacity", "0");
        $(".list-sugestion").css("display", "none");
      }
      if(e.which == 40){
        // console.log('abajo');
      }
  });

  var li = $('.search-container .list-sugestion li');
  var liSelected;
  $(window).keydown(function(e){
      if(e.which === 40){
          if(liSelected){
              liSelected.removeClass('selected');
              next = liSelected.next();
              if(next.length > 0){
                  liSelected = next.addClass('selected');
              }else{
                  liSelected = li.eq(0).addClass('selected');
              }
          }else{
              liSelected = li.eq(0).addClass('selected');
          }
      }else if(e.which === 38){
          if(liSelected){
              liSelected.removeClass('selected');
              next = liSelected.prev();
              if(next.length > 0){
                  liSelected = next.addClass('selected');
              }else{
                  liSelected = li.last().addClass('selected');
              }
          }else{
              liSelected = li.last().addClass('selected');
          }
      }
  });

  // remover todas sugerencias de busqueda
  $('.clean-search').on('click', function(){
  
    $(".container-result-search ul").html("");

    $('.letter-search p').each(function(){
      console.log("limpiamos cookies" + $(this).text());
      eraseCookie($(this).text());
    });

    $('.letter-search p').remove();
    
    $('.letter-search').html("");

    $(".container-result-search ul").html('<div class="no-result-search"><p>No se encontraron resultados. Ingresa otro término de búsqueda.</p></div>');
  });
  
  // hover de la grilla
  $( ".item_grid_hover" ).hover(function() {
      $(this).addClass('active_hover_grid');
    }, function() {
      $(this).removeClass('active_hover_grid');
    }
  );

  $(".embed-container").hover(function(e){
    $(this).css("opacity", "1");
  });

  
  $(".embed-container").on("click", function(e){
    alert("asdasd");
    e.preventDefault();

  });
  $('.input-search').keyup(function() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("input-search");
      filter = input.value.toUpperCase();
      ul = document.getElementById("list-sugestion");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("a")[0];
          if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
          } else {
              li[i].style.display = "none";
          }
      }
  });
  $('.img-share').on('click', function(){
    $('.wp-share-button.theme32').toggleClass('active-share');
  });


  // capturamos path para determinar si se crea las cookies en el sitio en english o en el sitio de español
  // 
  $current_path = window.location.pathname;
  console.log("current path"  + $current_path);


  
        $('.input-search').keyup(function(e){
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          var tag_selected = $(".list-sugestion li.selected a").text();
          console.log("etiqueta seleccionada " + tag_selected);

          if (tag_selected != "") {
              $(".input-search").val(tag_selected);
              createCookie(tag_selected, tag_selected, 5);
          }else{
            e.preventDefault();
          }
          
        }        
    });

    // capturamos el click sobre el listado de sugerencias para poder crear las cookies
      $(".list-sugestion li a").on("click", function(){
                        
         createCookie($(this).text(), $(this).text(), 5);
         //ajaxSearch(queries);
         //        
        });      


   
        // crea cookkies
 
      function createCookie(name,value, days) {
        var expires = "";
        var path = "";
          if (days) {
            var maxage = ";max-age=" + 150;
          }

          if ($current_path.indexOf('/en/') != -1){
            path = "/en/";
          }else{
            path = "/";
          }
          
          //document.cookie = "contador" +  default + maxage + "; path=/";
          document.cookie = "_querys["+name+"]" + "=" + value + maxage + "; path="+path+" ";

          getCookie();
      }

      function eraseCookie(name) {
        var path = "";
        if ($current_path.indexOf('/en/') != -1){
            path = "/en/";
          }else{
            path = "/";
          }
         document.cookie = '_querys['+name+']'+'=; path='+path+'; Max-Age=-99999999;';
         
      }

      function getCookie() {
        var value = "; " + document.cookie;
        querys = [];
        tags = [];
        var parts = value.split("; ");      
        
        for (var i = 0; i < parts.length; i++) {
          if (!parts[i].indexOf("_querys")) {
            // console.log(parts[i]);  
            querys.push(parts[i].split("="));
          }
          
        }
        
        for (var i = 0; i < querys.length; i++) {
          //console.log(querys[i][1]);  
          //$(".letter-search").append("<p>"+querys[i][1]+"</p>");
          tags.push(querys[i][1]);
        }    
        
        var all_tags = tags.join("+");
        console.log(all_tags);

        $(".searchform").submit();
        //ajaxSearch(all_tags, tags);

      }

       function createCookieAjax(name,value, days) {
        var expires = "";
          if (days) {
            var maxage = ";max-age=" + 150;
          }
          
          //document.cookie = "contador" +  default + maxage + "; path=/";
          document.cookie = "_querys["+name+"]" + "=" + value + maxage + "; path=/";

          getCookieAjax();
      }

      function getCookieAjax() {
       var value = "; " + document.cookie;
        querys = [];
        tags = [];
        var parts = value.split("; ");      
        
        for (var i = 0; i < parts.length; i++) {
          if (!parts[i].indexOf("_querys")) {
            // console.log(parts[i]);  
            querys.push(parts[i].split("="));
          }
          
        }
        
        for (var i = 0; i < querys.length; i++) {
          //console.log(querys[i][1]);  
          $(".letter-search").append("<p>"+querys[i][1]+"</p>");
          tags.push(querys[i][1]);
        }    
        
        var all_tags = tags.join("+");
        //console.log(all_tags);

        //$(".searchform").submit();
        ajaxSearch(all_tags, tags);

      }

      $('.letter-search p').on('click', function(){
          $(this).remove();

          $('.letter-search').html("");
          
          eraseCookie($(this).text());
          
            console.log("borramos cookie " + $(this).text());  
            eraseCookie($(this).text());
          
          
            getCookieAjax();   
      // ajaxSearch();

      });

    // busqueda general por tags
    function ajaxSearch(tags, tags_array){
      console.log(tags);
        $.ajax({
           type: "POST",
            url: themeSancho._ajax_url, 
            data: {
              action:'customSearch',
              query:tags
            },
            success: function(datos){
                // alert(msg);
                $(".list-sugestion").hide();
                console.log("se envio los datos de busqueda");
                console.log(datos);
                var html_tags= "";
                for (var i = 0; i < tags_array.length; i++) {
                    html_tags += "<p>"+tags_array[i]+"</p>";
                }

                $(".content-area").html('<div class="container-result-search">'+
                  '<header class="page-header-search">'+
                  '<h1>Resultado de busqueda:</h1>'+
                  '<div class="letter-search">'+ html_tags +                  
                  '</div>'+
                  '<div class="clean-search">'+
                  '<p>limpiar busqueda</p>'+
                  '</div>'+
                  '</header>'+
                    datos +                  
                  "</div>");
                

            },
            error: function(msg){
                console.log(msg.statusText);
            },

            complete: function(datos){
                $('.clean-search').on('click', function(){
                  $('.letter-search p').remove();
                  $(".container-result-search ul").html("");
                  // $('.letter-search p').each(function(){
                  //   console.log("imprimimos cookies " + $(this).text());
                  //   eraseCookie($(this).text());  
                    
                  // });
                  // getCookie(); 
                  
                });

                 $('.letter-search p').on('click', function(){
                  $(this).remove();
                  console.log("borramos cookie " + $(this).text());
                  eraseCookie($(this).text());
                  
                  getCookie();                  
                  // ajaxSearch();


                });

                $("item_notice_plugin p:nth-child(2)").css("top", "50px");
                 $("item_notice_plugin p:nth-child(2)").css("font-family", "helveticaregular");
                 $("item_notice_plugin p:nth-child(2)").css("font-size", "13px");
                 $("item_notice_plugin p:nth-child(2)").css("color", "#8b8b8b");
                 $("item_notice_plugin p:nth-child(2)").css("padding-left", "10px");
                 

            }
         });
    }


    // $(".cont-footer").on("click", function(){
    //   var page = $(this).data("page") + 1;
    //   var next_page = $(".pagination__next a").attr("href");
    //   console.log("siguiente post " + next_page);
    //      $('.container_grid').infiniteScroll({
    //           // options
    //           path:  next_page,
    //           append: '.item_grid_home',
    //           history: false,
    //         });
    // });

      // var next_page = $(".pagination__next a").attr("href");
      // var next_page_post = next_page.split("/");
      
    
     function loadMorePost(page, newpage){
       var $container = $('.container_grid');

        $.ajax({
           type: "POST",
            url: themeSancho._ajax_url, 
            data: {
              action:'loadMorePost',
              page:page
            },

            error : function( response ){
              console.log(response);
            },

            before : function(response){
               console.log(response);
            },

            success : function( response ){
                 console.log(response.length);
              if (response.indexOf("finalpost") != -1) {
                console.log("final del post " + response.indexOf("finalpost"));
                $(".down-arrow").css("opacity", "0");
                $( ".down-arrow").unbind( "click" );
              }
              $(".pagination__next").data("page", newpage);
              $container.append( response ).masonry( 'appended', response );
              $container.masonry('destroy');
                   $container.masonry({
                          itemSelector: '.item_grid_home',
                          columnWidth: 0,                  
                          gutter: 10,                   
                          horizontalOrder: false                 
                      });
                      
//             var $window = $(window);
// $window.load(function () {
// if (window.location.hash) {
// var destination = $(window.location.hash).offset().top;
// $window.scrollTop(destination);
// }

//     });
            },

            complete : function(response){
               // hover de la grilla
                $( ".item_grid_hover" ).hover(function() {
                    $(this).addClass('active_hover_grid');
                  }, function() {
                    $(this).removeClass('active_hover_grid');
                  }
                );
                 $('.container_hover_grid').click(function(){   
                 alert('complate');    
                   var id_video = $(this).attr("id");
                   var video = document.getElementById(id_video);

                   console.log("id del video " + id_video + video);
                   toggleVideo('show', video);
                });

                 // video grilla
                  $('.close-video-grid').on('click', function(){
                    $('.modal-video-article').css('display', 'none');
                    $('body, html').addClass('show-scroll').removeClass('hidden-scroll');
                      var id_video = $(this).prev().attr("id");
                      var video = document.getElementById(id_video);
                      $(this).prev('#video_grid').attr('src', ''); 
                     $("#video_grid").attr("src", "");
                      toggleVideo('hide', video);
                      var url_post = $(this).data("url");
                      //console.log("url video " + video.getElementsByTagName("iframe")[0].src);
                      window.location.replace(url_post); 
                      // setTimeout(function(){
                      //   window.location.replace(url_post);
                      // }, 5000);
                    
                  });

                  
                  $container.imagesLoaded( function() {
                    $container.masonry({
                        itemSelector: '.item_grid_home',
                        columnWidth: 0,
                        gutter: 10                
                    });
                  });
            }
        });
     }
    
    

}) ( jQuery );