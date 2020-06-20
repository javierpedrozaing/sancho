( function( $ ) {   
  $(document).ready(function(){
    
    // autocomplete search
    $(".input-search").autocomplete({              
      source: function( request, response ) {
        $(".list-sugestion").html("");
        let data = {
          'action': 'autocomplete_search',  
          'dataType': "jsonp",    
          'term': request.term          
        };       
        
      $.ajax({
        url : themeSancho._ajax_url,
        data:data,
        type:'POST',
        beforeSend: function( xhr ) {
          // you can also add your own preloader here
          // you see, the AJAX call is in process, we shouldn't run it again until complete          
        },
        success:function(res) {
          console.log(res);          
        // response( res );        
          $(".list-sugestion").append(res);
        },
        complete:function() {
          $(".list-sugestion ul li").on("click", function(e){
            e.preventDefault();
            let tag = request.term;
            window.location.replace(siteUrl + "/?s="+$(this).text());

          });
      
        }
      });
      },
      minLength: 2,        
    } );

    $('.clean-search').on('click', function(){
      $('.letter-search p').remove();
      $(".container-result-search .gridhome").html("<div class='no-result-search'> <p>No se encontraron resultados. Ingresa otro término de búsqueda.</p></div>");    
    });

    $('.letter-search p').on('click', function(){
      $(this).remove();  
      if ($('.letter-search p').length == 1) {
        window.location.replace(siteUrl + "/?s="+$('.letter-search p').text());     
      } else  if ($('.letter-search p').length == 0){
        $(".container-result-search .gridhome").html("<div class='no-result-search'> <p>No se encontraron resultados. Ingresa otro término de búsqueda.</p></div>");    
      }

    
  });

     /////////////////////////// START DESKTOP //////////////////////////////////////
     $('.menu-item-11').css('display', 'none'); // hide home

     // abrir barra de busqueda click en lupa
    $('.menu-menu-header-container .button-search').on('click', function(event){      
      
      $(this).css('position', 'absolute');
      $('.input-search').focus();      
        if($('.menu-menu-header-container .input-search').val().length == 0 ) {          
            $('.search-container .search-modal-input').toggleClass('open');            
            if (window.matchMedia('(max-width: 767px)').matches) {
              
            } else {
              if($('.search-container .search-modal-input').hasClass('open')){            
                $('form#searchform').css('right', '50px');
                $('form#searchform').css('position', 'absolute');
                $('form#searchform').css('width', '300px');              
              }else{
                $('form#searchform').css('right', 'none');
                $('form#searchform').css('position', 'absolute');
                $('form#searchform').css('width', '0'); 
              } 
            }
            
            
        }else{          
          $('.menu-menu-header-container form').submit();
        }
    });

    $('#menu-header-mobile .button-search').on('click', function(event){ 
      console.log("val input => ", $('#menu-header-mobile  form .input-search').val().length);            
        if($('#menu-header-mobile  form .input-search').val().length > 0 ) {                         
          $("#menu-header-mobile form").submit();
        }
    });

       
    // animacion compartir y ancla
    var scrollPos = 10;
    $('.container-share').css('opacity','1');
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
      $('.container-about .modal-leaders').css('position', 'relative');             
    });


    $(document).on("click", ".modal-leaders", function () {         
      $('.container-about .modal-leaders').css('position', 'absolute');            
      $("html, body").animate({ scrollTop: 0 }, 600);            
      let photo_leader = $(this).data('photo-modal');
      let name_leader = $(this).data('name');
      let position_leader = $(this).data('position');
      let description_leader = $(this).data('description');
      $(".modal-leaders .modal-body .photo-leader").attr('src', photo_leader);
      $(".modal-leaders .modal-body .name-leader").text(name_leader);
      $(".modal-leaders .modal-body .position-leader").text(position_leader);
      $(".modal-leaders .modal-body .description-leader").text(description_leader);      
    });


    // backe modal leaders 
    $(document).on("click", ".card .modal-leaders-mobil.modal-dialog", function () {  
      $(".modal-leaders-mobil").prev('.hover-card').css('opacity', '0.47');
      $(".modal-leaders-mobil").css('opacity', '1');
      $(".modal-leaders-mobil").css('cursor', 'pointer');
      $(".modal-leaders-mobil").prev('.hover-card').show();  
    
    });

    
    // SAVE HTML ABOUT PAGE FOR SHOW MODAL MOBILE
  
    var saveAboutContent =  $('.container-about').html();

    // hover click mobile
    $(document).on("click", ".card .modal-leaders-mobil", function () {   
      $('.container-about').html(""); // reset content about              
      $("html, body").animate({ scrollTop: 0 }, 600);
      console.log("modal leaders mobil");
      let photo_leader = $(this).data('photo-modal');
      let name_leader = $(this).data('name');
      let position_leader = $(this).data('position');
      let description_leader = $(this).data('description');
      $(".modal-leaders-mobil .modal-body .photo-leader").attr('src', photo_leader);
      $(".modal-leaders-mobil .modal-body .name-leader").text(name_leader);
      $(".modal-leaders-mobil .modal-body .position-leader").text(position_leader);
      $(".modal-leaders-mobil .modal-body .description-leader").text(description_leader);      
    });

    $(document).on("click", ".modal-leaders-mobil .close", function () {
      $('.container-about').html(saveAboutContent);
    });

      // hover leaders mobile
      $(document).on("touchstart", ".modal-leaders-mobil", function () {           
        $(this).prev('.hover-card').css('opacity', '0.47');
        $(this).css('opacity', '1');
        $(this).css('cursor', 'pointer');
        $(this).prev('.hover-card').show();      
      });
      

    // Manage toogle collapsed link oportunities    
    //  $('.oportunities .container-opotunity').first().find('a').removeClass( "collapsed" );     
    // $('.oportunities .container-opotunity').first().find('div.collapse').addClass('show');
  
    
    $('.oportunities .container-opotunity a').each(function(){
      $(this).css('font-weight', 'bold');
      $(this).css('cursor', 'pointer');
      if ($(this).hasClass('collapsed')) {
        $(this).text('Ver más');
        $(this).next('span').addClass('fa-chevron-right');
      } else if($(this).next('div').hasClass('show')){
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
      } else {
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
    var datapost = {
      'action': 'load_posts_by_ajax',
      'posts_per_page' : 12,     
      'page':  themeSancho._current_page,
      
    };   
    loadPostInit(datapost);
   
    
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 1200; // the distance (in px) from the page bottom when you want to load more posts
    // Load more post infinity scroll
    $(window).scroll(function() {  
     
      if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
        datapost.page++;
        loadPostInit(datapost);        
      }
    });

    // hover de logos de compañia
    
        $(".container-company .container-img-company").hover(function() {          
          console.log("hover hover");
          $(this).find('.img-black').css('display', 'none');
          $(this).find('.img-color').css('display', 'block');
        }, function() {
          $(this).find('.img-black').css('display', 'block');
          $(this).find('.img-color').css('display', 'none');
        });
      
      
  
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

    var li = $('.list-sugestion li');
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

    function loadPostInit(data){
      
      $.ajax({
				url :themeSancho._ajax_url,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
				},
				success:function(response){
					if( response ) {
            canBeLoaded = true; // the ajax is completed, now we can run it again
            let page = parseInt(themeSancho._current_page) + 1;
            themeSancho._current_page = page;            
            $('.containergrid').append(response);
         
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
						
					}
        },
        complete: function(){
          $('.gridhome').masonry({
            // itemSelector: '.grid-item',
            // masonry: {        
            //   gutter: 4,
            //   horizontalOrder: false,                
            // }
            itemSelector: '.grid-item',
            
            gutter: 4,                         
          });
        }
			});

    }

    
  ///////////////// SLIDE LIBRARY ////////////////
    $('.slide-home').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: false,
      autoplay: true,
      arrows: true,
      fade: true,
  
    });
  ///////////////// SLIDE LIBRARY ////////////////
  
}) ( jQuery );
