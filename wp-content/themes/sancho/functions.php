<?php 


global $tDir;
$tDir = get_template_directory_uri();


// add support feature image post
add_theme_support( 'post-thumbnails' );

register_nav_menus(
	array(
		'top'    => __( 'Top Menu', 'sancho top menu' ),
		'social' => __( 'Social Links Menu', 'sancho social links' ),
	)
);

// Incluir Bootstrap CSS
function bootstrap_scripts() {
	wp_enqueue_style( 'bootstrap_css', 
  					get_stylesheet_directory_uri() . '/css/bootstrap.min.css', 
  					array(), 
  					'4.1.3'
					  ); 
	wp_enqueue_script( 'bootstrap_js', 
  					get_stylesheet_directory_uri() . '/js/bootstrap.min.js', 
  					array('jquery'), 
  					'4.1.3', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_scripts');


function my_jquery_enqueue() {
	global $wp_query;
   	wp_enqueue_script('jquery');
   	wp_enqueue_script( 'sancho-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );
	wp_enqueue_script( 'bxslider-js', get_template_directory_uri() . '/js/jquery.bxslider.js', array( 'jquery' ), '', false );	   
	// SLICK LIBRARY 
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/slick/slick.js', array( 'jquery' ), '20160816', true ); // script

	// isotope LIBRARY 
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . "/js/isotope.pkgd.min.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'packery-js', get_template_directory_uri() . "/js/packery-mode.pkgd.min.js", array( 'jquery' ), '', true );
	// wp_enqueue_script( 'infinity-scroll-js', get_template_directory_uri() . "/js/infinite-scroll.pkgd.min.js", array( 'jquery' ), '', true );

   	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
   	wp_enqueue_script( 'masonry-js',  get_template_directory_uri() . '/js/masonry.js', array( 'jquery' ), '', true );
   	// wp_enqueue_script( 'infinite-scroll-js', "https://unpkg.com/infinite-scroll@3.0.2/dist/infinite-scroll.pkgd.min.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'images-load-js', "https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'autocomplete-jquery', get_template_directory_uri() . '/js/jquery-ui.min.js', array( 'jquery' ), '', true );
	   
	
	
	// wp_enqueue_script( 'jquery-grid', "https://cdn.rawgit.com/suprb/Nested/master/jquery.nested.js", array( 'jquery' ), '', true );

	$themeSancho = array(
		'_ajax_url' => admin_url( 'admin-ajax.php' ),
			'_ajax_nonce'=>wp_create_nonce( 'dhvc_form_ajax_nonce' ),
		'_themes_url'=>  get_template_directory_uri(),
		'_site_url'=> get_site_url(),
		'_current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 0,
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'_max_page' => $wp_query->max_num_pages,
	);

	wp_localize_script('sancho-script', 'themeSancho', $themeSancho);
	wp_enqueue_script( 'sancho-script' );
}
add_action("wp_enqueue_scripts", "my_jquery_enqueue");

 function languages_list_footer(){
        global $sitepress;
        $languages = icl_get_languages();
        if(!empty($languages)){
        $currlng = (isset($_GET['lang']) && $_GET['lang'] != '') ? $_GET['lang'] : 'ES';
           
        foreach($languages as $l){
            $language_url = apply_filters ( 'WPML_filter_link', $l[ 'url' ], $l );
           echo '<a href="'.$language_url.'">'. icl_disp_language($l['language_code']).'</a>';
        }
    }
}


add_action('wp_ajax_guias', 'guias');
add_action('wp_ajax_nopriv_guias', 'guias');
function guias(){
	$html= '<div class="column-city">';
	$args = array();
	$categories = get_categories( $args );
	foreach ($categories as $key => $value):
		if ( ( ($value->category_parent>=9) AND ($value->category_parent<=14) ) OR ( ($value->category_parent>=39) AND ($value->category_parent<=52) ) ) {
			if (stripos($value->name, $_POST['ciudad'])!==false) {
				$html .= '<div class="container-country">';
				$html .= '<h1>'.$value->name.'</h1>';
				query_posts('category_name='.$value->name );
				while ( have_posts() ) : the_post();
					$html .= '<div class="company-country">';
						$html .='<h3>'.get_field('nombre').'</h3>';
						$html .='<div class="info-company">';
							$html .='<p>'.get_field('direccion').'</p>';
							$html .='<p>'.get_field('ciudad').'</p>';
							$html .='<p>'.get_field('url').'</p>';
							$html .='<p>'.get_field('telefono').'</p>';
						$html .='</div>';
					$html .='</div>';
				endwhile;
				$html .='</div>';
			}
		}
	endforeach;
	$html .='</div>';
	echo $html; 

	die();
}


add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax');

function load_posts_by_ajax(){	
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	
		//check_ajax_referer('load_more_posts', 'security');				
		// $args = array(
		// 	'post_type' => 'post',
		// 	'post_status' => 'publish',
		// 	'posts_per_page' => 7,		    
		// 	'paged' =>  $paged,
		// );
		query_posts( $args );		
		?>	 	
	
			<?php if ( have_posts() ) : ?>
			<div class="gridhome">
				<div class="grid-sizer"></div>
				<?php while ( have_posts() ) : the_post(); ?>					
					<?php
					 $size_grid = get_field( 'size_grid' ); 
					$external_link = get_field( 'check_external_link' );
					$the_external_link = get_field( 'external_link' );
					$permalink =  ($external_link) ? $the_external_link : get_post_permalink(get_the_ID());

					?>
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID()); ?>	
					<a href="<?php echo $permalink?>" target="_blank">										
						<div class="grid-item grid-item--<?php echo explode(':', $size_grid)[0]; ?>" ><img class="thumbnail-grid" src="<?php  echo $featured_img_url; ?>" alt="">
							<div class="hover-content">
								<p class="taq-post"><?php  echo the_category() ?> </p>
								<p class="title-post"> <?php  echo the_title() ?>  </p>
								<p class="date-post"><?php echo get_the_date() ?></p>
								<p class="link-post">
									<?php 
									if ($external_link) { ?>									
										<a href="<?php echo $permalink; ?>"  target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/foreign.svg" alt=""></a>
									<?php }else{ ?>
										
										<a href='<?php echo $permalink; ?> ' target="_blank">Leer más</a>
									<?php } 
									?>
								</p>
							</div>
						</div>  									
					</a>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>			 
			
	 <?php
		wp_die();
	
}

add_action('wp_ajax_load_more_posts_by_ajax', 'load_more_posts_by_ajax');
add_action('wp_ajax_nopriv_load_more_posts_by_ajax', 'load_more_posts_by_ajax');

function load_more_posts_by_ajax(){
	$paged = $_POST['page'] + 1;
		$max_page = $_POST['max_page'];
		echo("<p style='top:-15px; position:relative;'> max page => " . $max_page . "===" . "page => " . $paged . "</page>" . "</p>");
		

	if ($max_page <= $paged_post) {				
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : $paged_post;
			//check_ajax_referer('load_more_posts', 'security');		
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 7,
				'paged' =>  $paged,
			);
			$blog_posts = new WP_Query( $args );
			?>	 	 			
				<?php if ( $blog_posts->have_posts() ) : ?>
				<div class="gridhome">
					<div class="grid-sizer"></div>
					<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>					
						<?php $size_grid = get_field( 'size_grid' ); ?>
						<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID()); ?>											
							<div class="grid-item grid-item--<?php echo explode(':', $size_grid)[0]; ?>" ><img class="thumbnail-grid" src="<?php  echo $featured_img_url; ?>" alt=""></div>  									
					<?php endwhile; ?>
				</div>
					<?php endif; ?>			
			<?php
		
			wp_die();
	}
}

add_action('wp_ajax_customSearch', 'customSearch');
add_action('wp_ajax_nopriv_customSearch', 'customSearch');

function customSearch(){

	 global $wp_query;
	  $search = [];
	  
	  array_push($search, $_POST['query']);
	  $get_tags = implode("+", $search);
	  
	  $query = new WP_Query( array( 'tag' => $get_tags ) );
	  //query_posts('tag='.$get_tags );
	  $html_result = "";
	  $html_not_result = "";
	  	if (get_field('check_external_link', get_the_ID())){
			$link_external = get_field('external_link', get_the_ID());
		}else{
			$link = get_permalink(get_the_ID());
		}

		//$link_post =  get_field('check_external_link', get_the_ID()) ?  $link_external :  $link;
		
		
	  	if ( !empty($get_tags) ) :
	  		$html_result .= "<ul>";
 		while ( $query->have_posts() ) : $query->the_post();
 			$link_post = get_field('check_external_link', get_the_ID()) ? get_field('external_link', get_the_ID()) :  get_post_permalink(get_the_ID());
 			$target = get_field('check_external_link', get_the_ID()) ? "_blank" : "_self";
 			$thumbID = get_post_thumbnail_id( get_the_ID() ); 
			$image_related = get_field('image_related_article'); 					

 			if ( get_field("type", get_the_ID()) == "news" ) {
				$html_result .= '<li style="height:105px;">';		
	 			$html_result .= '<a href="'.$link_post.' " target="_blank">';
				$html_result .= '<div class="item_notice_plugin">';
				$html_result .= '<h1 class="notice-title">'.get_the_title(get_the_ID()).'</h1>';		
				$html_result .= get_field("cuerpo_noticia", get_the_ID());		
				$html_result .= '</div>';
				$html_result .= '</a>';
				$html_result .= '</li>';
 			}else{
				$html_result .= "<li>";
				$html_result .= "<a href='". $link_post ."' target='".$target."'>";
				$html_result .=  wp_get_attachment_image($image_related, full);
				$html_result .= "<p>".  get_field("origen") . "</p>";
				$html_result .= "<h1>".  get_the_title() . "</h1>";

				$html_result .= "</a>";
				$html_result .= "</li>";	
 			}

 		
 			
					
 		endwhile;
 		$html_result .= "</ul>";
 		wp_reset_query();

 		
 		echo $html_result;
 	  else :
 	  	$html_not_result .= '<div class="no-result-search">  <p>No se encontraron resultados. Ingresa otro término de búsqueda.</p> </div>';
 	  	echo $html_not_result;
	  endif;
	
	  //get_template_part('search');

	  exit;
	  die();

}

add_action('wp_ajax_cloadMorePost', 'loadMorePost');
add_action('wp_ajax_nopriv_loadMorePost', 'loadMorePost');

function loadMorePost(){
	$paged_post = $_POST["page"]  + 1;

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : $paged_post;
			
	$articulos = new WP_Query( array('cat' => '4' , 'paged' => $paged, 'post_status' => 'publish', 'orderby' => array( 'date' => 'DESC'), 'posts_per_page' => 10) );

	$post_number = 0; 

	if($articulos->have_posts()){
		while($articulos->have_posts()){
			$articulos->the_post();
			$post_number++;

			if (get_field("type")!= "news") {
				if (!get_field("destacado")) {
					$field = get_field_object("tipo_imagen");
					$value = $field['value'];
					$label = $field['choices'][ $value ];
					$thumbID = get_post_thumbnail_id( get_the_ID() ); 
					$imgDestacada = wp_get_attachment_url( $thumbID );
					$iframe_content = get_field('video_de_contenido');
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe_content, $matches);
					$src_video = $matches[1];
					$id_video_content = explode("embed/", $src_video);
					// get only the id video
					$video_content_id = explode("?feature", $id_video_content[1]);
					if ( $value == 'grande') :
						$tipo_imagen = "width_g_home_1";
					elseif ( $value == 'cuadrada') :
						$tipo_imagen = "height_g_home_1";
					elseif ( $value == 'horizontal') :
						$tipo_imagen = "width_g_home_2";
					elseif ( $value == 'vertical') :
						$tipo_imagen = "";
					elseif ( $value == 'noticia') :
						$tipo_imagen = "height_g_home_1";
					endif;

					if (get_field('check_external_link')) :
						$link_external = get_field('external_link');
					else:
							$link = get_permalink(get_the_ID());
					endif;

					$iframe = get_field('link__video');
					// use preg_match to find iframe src
					preg_match('/src="(.+?)"/', $iframe, $matches);
					$src_grid = $matches[1];
					$id_video = explode("embed/", $src_grid);
							// get only the id video
					$id = explode("?feature", $id_video[1]);
					$link_post = get_field('check_external_link') ? $link_external : $link;

					?>

					<a href="<?php echo !empty($id[0]) ? '#' : $link_post ?>" <?php echo get_field('check_external_link') ? 'target="_blank"' : 'target="_self"'; ?>  >
						<div class="item_grid_home <?php echo $tipo_imagen ?> item_grid_hover">
							<?php if ($imgDestacada): ?>
								<img src="<?php echo $imgDestacada;?>">
							<?php endif; ?>
							
							<?php if (!empty($id[0])): ?>
								<div class="container-video-grid">
									<img src="https://img.youtube.com/vi/<?php echo $id[0] ?>/hqdefault.jpg">
								</div>
							<?php endif; ?>
							
							
							<?php if (!empty($id[0])): ?>
								<div class="modal-video-article" id="<?php echo the_ID(); ?>">
									<div class="video-article">
										<iframe class="video_grid" id="<?php echo the_ID(); ?>" width="560" height="315" src="<?php echo $src_grid; ?>" frameborder="0" allowfullscreen></iframe>
										<span class="close-modal-article close-video-grid" data-url="<?php echo get_permalink(get_the_ID()); ?>"></span>
									</div>
								</div>								
								<div class="container_hover_grid" id="<?php echo the_ID(); ?>">
									<h1><?php echo the_field("origen"); ?></h1>
									<p><?php the_title(); ?></p>
								</div>
							<?php else : ?>
								<?php if (get_field('textos_grilla')) : ?>
									<?php $hover = "container_hover_grid"; ?>
								<?php else: ?>
									<?php $hover = "hover_grid_mobile"; ?>
								<?php endif; ?>
									<div class="<?php echo $hover; ?> ">
										<h1><?php echo the_field("origen"); ?></h1>
										<p><?php the_title(); ?></p>
									</div>
								
							<?php endif; ?>
						</div>
						</a>


					<?php
					
					
				}
			} ?>
	
			<?php if (get_field("type") == "news") : ?>
				<a href="<?php echo get_field('external_link'); ?>" target='_blank'>
				<div class="item_grid_home height_g_home_1 item_grid_notice">
					<h1><?php the_title(); ?></h1>
					<p><?php echo the_field("cuerpo_noticia"); ?></p>
				</div>
				</a>
			<?php endif; ?>
			<?php
		}
		wp_reset_postdata();
		die();
	}else{
		echo "finalpost";
	}
}

add_action('wp_ajax_autocomplete_search', 'autocomplete_search');
add_action('wp_ajax_nopriv_autocomplete_search', 'autocomplete_search');

function autocomplete_search(){
	$term = $_POST['term'];			
	$posts = new WP_Query( array( 'tag' => $term, 'post_status' => 'publish', 'limit' => 10 ) );	
	
	if ( $posts->have_posts() ) {
	} ?>
	<ul>
	<?php while ( $posts->have_posts() ) {
		$posts->the_post(); ?>
		<li><a href="#"><?php echo get_the_title(get_the_ID()); ?></a></li>								
	<?php } ?>
	</ul>

	<?php
	wp_die();
}
?>