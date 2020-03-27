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
    
    $(document).on("click", ".modal-content .close", function(){
      $('.container-about .modal-leaders').css('position', 'relative');
      $('.container-about .modal-leaders').css('height', 'auto');      
    });

    $(document).on("click", ".modal-leaders", function () {
      $('.container-about .modal-leaders').css('position', 'absolute');
      
      $("html, body").animate({ scrollTop: 0 }, 600);
      console.log("modal leaders");
      let photo_leader = $(this).data('photo');
      let name_leader = $(this).data('name');
      let position_leader = $(this).data('position');
      let description_leader = $(this).data('description');
      $(".modal-leaders .modal-body .photo-leader").attr('src', photo_leader);
      $(".modal-leaders .modal-body .name-leader").text(name_leader);
      $(".modal-leaders .modal-body .position-leader").text(position_leader);
      $(".modal-leaders .modal-body .description-leader").text(description_leader);

    });
  

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
