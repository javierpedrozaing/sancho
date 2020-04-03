( function( $ ) {   
  $(document).ready(function(){
       
     /////////////////////////// START DESKTOP //////////////////////////////////////
     $('.menu-item-11').css('display', 'none'); // hide home

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
    
    $('.img-share').on('click', function(){
      $('.wp-share-button.theme32').toggleClass('active-share');
    });

    $(".container-about .lideres .content-hover").hover(function(){      
      $(this).prev('.hover-card').css('opacity', '0.47');
      $(this).css('cursor', 'pointer');
      // 
      $(this).prev('.hover-card').show();
    }, function(){
      
      $(this).prev('.hover-card').hide();
    });

    $(".container-about .lideres .lideres-area .content-hover").hover(function(){      
      $(this).prev('.hover-card').css('opacity', '1');      
      $(this).css('cursor', 'default');
      $(this).prev('.hover-card').hide();
    });

    $(".container-about .lideres .lideres-area .content-hover").on('click', function(e){
      e.preventDefault();
    });

    $(document).on("click", ".modal-content .close", function(){      
      $(".search-modal-input").css('right', '256px');
      $('.container-about .modal-leaders').css('position', 'relative');
      
       
    });

    $(document).on("click", ".modal-leaders", function () {
      $('.container-about .modal-leaders').css('position', 'absolute');
      
      $("html, body").animate({ scrollTop: 0 }, 600);
      console.log("modal leaders");
      let photo_leader = $(this).data('photo-modal');
      let name_leader = $(this).data('name');
      let position_leader = $(this).data('position');
      let description_leader = $(this).data('description');
      $(".modal-leaders .modal-body .photo-leader").attr('src', photo_leader);
      $(".modal-leaders .modal-body .name-leader").text(name_leader);
      $(".modal-leaders .modal-body .position-leader").text(position_leader);
      $(".modal-leaders .modal-body .description-leader").text(description_leader);
      $(".search-container .search-modal-input").css('right', '273px');

    });

    // Manage toogle collapsed link oportunities    
    $('.oportunities .container-opotunity').first().find('a').removeClass( "collapsed" );
    $('.oportunities .container-opotunity').first().find('a').next('div').addClass('show');
  
    
    $('.oportunities .container-opotunity a').each(function(){
      $(this).css('font-weight', 'bold');
      $(this).css('cursor', 'pointer');
      if ($(this).hasClass('collapsed')) {
        $(this).text('Ver más');
        $(this).next('span').addClass('fa-chevron-right');
      }else{
        $(this).text('Ver menos');        
        $(this).next('span').addClass('fa-chevron-up');
      }
      
    });

    $('.oportunities .container-opotunity a').on('click', function(){      
      $(this).next('span').removeClass('fa-chevron-right');      
      $(this).next('span').removeClass('fa-chevron-up');
      if ($(this).hasClass('collapsed')) {
        $(this).text('Ver menos');              
        $(this).next('span').addClass('fa-chevron-up');
      }else{
        $(this).text('Ver más');
        
        $(this).next('span').addClass('fa-chevron-right');
      }

    })

    // $('.grid').isotope({
    //   itemSelector: '.grid-item',
    //   percentPosition: true,
    //   masonry: {
    //     columnWidth: '.grid-sizer'
    //   }    
      
    // });


    // $('.grid').isotope({
    //   itemSelector: '.grid-item',
    //   masonry: {
    //     columnWidth: 100
    //   }
    // });


    // $('.grid').isotope({
    //   layoutMode: 'packery',
    //   itemSelector: '.grid-item',
    //   percentPosition: true,
    //   packery: {
    //     columnWidth: '.grid-sizer'
    //   }
    // });
    

    $('.gridhome').masonry({
      // itemSelector: '.grid-item',
      // masonry: {        
      //   gutter: 4,
      //   horizontalOrder: false,                
      // }
      itemSelector: '.grid-item',
      
      gutter: 4,                         
    });

    $( ".gridhome .grid-item" ).hover(function() {
      console.log("hover");
      $(this).find('.hover-content').show();
      $(this).find('.hover-content').css('position', 'absolute');
      $(this).find('.hover-content').css('z-index', '9999')
      $(this).find('.hover-content').css('top', '80px');
      $(this).find('.hover-content').css('margin', '0 20px');
      $(this).find('.hover-content').css('color', '#fff');
      $(this).find('.hover-content').css('font-weight', 'bold');
      
        $(this).addClass('active_hover_grid');
      
      }, function() {
        $(this).removeClass('active_hover_grid');
        $(this).find('.hover-content').hide();
      });    

    // load init post HOME
    loadPostInit();
   
    var canBeLoaded = true;
    // Load more post infinity scroll
    jQuery(window).scroll(function($) {
  
      
      if( jQuery(document).scrollTop() > ( jQuery(document).height() - 1000 ) && canBeLoaded == true ){
        
        loadPostInit();        
      }
    });

    // hover de logos de compañia
      $( ".container-img-company" ).hover(function() {
        $(this).find('.img-black').css('display', 'none');
        $(this).find('.img-color').css('display', 'block');
      }, function() {
        $(this).find('.img-black').css('display', 'block');
        $(this).find('.img-color').css('display', 'none');
      }
    );

        
  
    /////////////////////////// END DESKTOP //////////////////////////////////////

    var url = $('.embedvideo').attr('src');
    // video interna articulo
    $('.container-video-article').on('click', function(){
      
      $('.modal-video-article').css('display', 'block');
      $('body, html').addClass('hidden-scroll').removeClass('show-scroll');
      $('#video').attr('src', url);
    });
    $('.close-video-article').on('click', function(){
      $('.modal-video-article').css('display', 'none');
      $('body, html').addClass('show-scroll').removeClass('hidden-scroll');
      $('#video').attr('src', ''); 
    });
    

     // lista de sugerencias buscador general
    // $('.input-search').keydown(function(e) {
    //   $(".list-sugestion").css("opacity", "1");
    //   $(".list-sugestion").css("display", "block");
    // });
    // // ocultar lista de sugerencias
    // $('.input-search').keyup(function(e){
    //     if( $(this).val() == '' ) {
    //       $(".list-sugestion").css("opacity", "0");
    //       $(".list-sugestion").css("display", "none");
    //     }
    //     if(e.which == 40){
    //       // console.log('abajo');
    //     }
    // });

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
    /////////////////////////// START MOBILE //////////////////////////////////////
     // activar pestaña menu mob
    $('.icon-menu-mobile').on('click', function(){
      $('.menu-mobile').addClass('active-menu-mobile');
      
    });
    $('.logo-close-mob').on('click', function(){
      $('.menu-mobile').removeClass('active-menu-mobile');
    });

    $(".post-categories a[rel='category tag']").each(function(){
      $(this).removeAttr('href');
      $(this).css('cursor', 'default');
    });

    /////////////////////////// END MOBILE //////////////////////////////////////
  });    

    function loadPostInit(){
      
      var data = {
        'action': 'load_posts_by_ajax',
        'query': themeSancho.posts,
        'page':  themeSancho._current_page,
        'max_page': themeSancho._max_page + 1,
      };   
      
      $.post(themeSancho._ajax_url, data, function(response) {  
        
        
        if (themeSancho._current_page != themeSancho._max_page) {          
          themeSancho._current_page++;
            if($.trim(response) != '') {
    
              $('.containergrid').append(response);
            
              $('.gridhome').masonry({
                itemSelector: '.grid-item',                            
                gutter: 4,                                             
            });

            $( ".gridhome .grid-item" ).click(function(e){
              
              $(this).find('.hover-content').show();
              $(this).find('.hover-content').css('position', 'absolute');
              $(this).find('.hover-content').css('z-index', '9999')
              // $(this).find('.hover-content').css('top', '80px');
              $(this).find('.hover-content').css('margin', '0 20px');
              $(this).find('.hover-content').css('color', '#fff');
              $(this).find('.hover-content').css('font-weight', 'bold');              
            });  

            $( ".gridhome .grid-item" ).hover(function() {
              console.log("hover");
              $(this).find('.hover-content').show();
              $(this).find('.hover-content').css('position', 'absolute');
              $(this).find('.hover-content').css('z-index', '9999')
              // $(this).find('.hover-content').css('top', '80px');
              $(this).find('.hover-content').css('margin', '0 20px');
              $(this).find('.hover-content').css('color', '#fff');
              $(this).find('.hover-content').css('font-weight', 'bold');
              
                $(this).addClass('active_hover_grid');
              
              }, function() {
                $(this).removeClass('active_hover_grid');
                $(this).find('.hover-content').hide();
              });                
            } else {
                $('.loadmore').hide();
            }
        }
      });      

    }

    
  ///////////////// SLIDE LIBRARY ////////////////
    $('.slide-home').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      autoplay: true,
      arrows: true
    });
  ///////////////// SLIDE LIBRARY ////////////////
  
}) ( jQuery );
