<?php /* Template Name: Custom Search */ ?>
<?php global $tDir; 
?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>

<?php 
	// $array_query = json_decode(get_option('version'));
	// $array_query[count($array_query)+1] =  $_GET['s'];
	// add_option( 'version', json_encode($array_query), '', 'yes' );
	// echo json_encode($array_query);		
?>
	 <section id="primary" class="content-area"> 
		<?php
			$tags = [];
			$titles_post = [];
			$term =  $_GET['s'];
			$tag =  $_GET['tag'];
			$posts_term = new WP_Query( array( 's' => $term, 'post_status' => 'publish' ) );			
			//$query = $_POST['query'];

			while ( $posts_term->have_posts() ) {
				$posts_term->the_post();
				array_push($titles_post, get_the_title(get_the_ID()) );
			}			
			wp_reset_postdata();
			$posts = new WP_Query( array( 's' => $term, 'post_status' => 'publish' ) );			
		
		 	//print_r($data);
		 ?>
		<main id="main" class="site-main" role="main">
			<div class="container-result-search">
				<header class="page-header-search">
					<!-- <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sancho' ), get_search_query() ); ?></h1> -->
					<h1>Resultado de busqueda:</h1>
					<div class="letter-search">
						<?php if ($titles_post): ?>
						<?php foreach ($titles_post as $key => $value) {							
							$posts->the_post(); ?>
							 <p><?php echo  $value; ?></p>
						<?php } ?>
						<?php endif ?>
				
					</div>
					<div class="clean-search">
						<p>limpiar busqueda</p>
					</div>
				</header>
		<?php if ( $posts and $posts->have_posts() ) : ?>			
				<div class="gridhome">
				<div class="grid-sizer"></div>
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>					
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
		<?php else : ?>
			<div class="no-result-search"> 
				<p>No se encontraron resultados. Ingresa otro término de búsqueda.</p>
			</div>	

		<?php endif;
		?>
			</div>
	 </main>
	 </section> 

<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>