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
      horizontalOrder: false 
    });

    // load init post HOME
    loadPostInit();
   
    var canBeLoaded = true;
    // Load more post infinity scroll
    jQuery(window).scroll(function($) {
  
      
      if( jQuery(document).scrollTop() > ( jQuery(document).height() - 1000 ) && canBeLoaded == true ){
        
       // loadMorePost();        
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


    /////////////////////////// START MOBILE //////////////////////////////////////
     // activar pestaña menu mob
    $('.icon-menu-mobile').on('click', function(){
      $('.menu-mobile').addClass('active-menu-mobile');
    });
    $('.logo-close-mob').on('click', function(){
      $('.menu-mobile').removeClass('active-menu-mobile');
    });

    /////////////////////////// END MOBILE //////////////////////////////////////

  });    

    function loadPostInit(){
      
      var data = {
          'action': 'load_posts_by_ajax',
          'page': 1,
        // 'security': blog.security
      };   
      
      $.post(themeSancho._ajax_url, data, function(response) {                
          if($.trim(response) != '') {
  
            $('.containergrid').append(response);
            
            $('.gridhome').masonry({
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
            }
          );                
          } else {
              $('.loadmore').hide();
          }
      });      

    }



    function loadMorePost(){                       
              var data = {
                  'action': 'load_more_posts_by_ajax',
                  'page':  themeSancho._current_page,
                  'max_page': themeSancho._max_page,
                  //'security': blog.security
              };              

              $.ajax({
                url : themeSancho._ajax_url,
                data:data,
                type:'POST',
                beforeSend: function( xhr ){
                  // you can also add your own preloader here
                  // you see, the AJAX call is in process, we shouldn't run it again until complete
                  canBeLoaded = false; 
                },
                success:function(response){
                  
                  if($.trim(response) != '')  {
                    console.log("current page =>",themeSancho._current_page);
                  console.log("current max_page =>", data['max_page']);
             
                    
                     $('.containergrid').append(response);
                         
                    $('.gridhome').masonry({
                      itemSelector: '.grid-item',                            
                      gutter: 4,                                             
                  });
                      canBeLoaded = true;
                      themeSancho._current_page++;                   
                      canBeLoaded = true;
                  } 
                },
                complete: function(){
                  $( ".gridhome .grid-item" ).hover(function() {
                    console.log("hover");
                     $(this).addClass('active_hover_grid');
                   }, function() {
                     $(this).removeClass('active_hover_grid');
                   });
                },
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
