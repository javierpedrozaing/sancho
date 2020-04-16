<?php /* Template Name: Home Template*/ global $tDir; ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>

<div id="primary" class="content-area content-home">
	<?php 
	global $wp_query;
	if (get_field('categoria', $wp_query->post->ID)) {
		$slug = get_field('categoria', $wp_query->post->ID);
		//
	}
	$category = get_category_by_slug($slug);
	//var_dump($category);exit();

	$args=array(			
		'posts_per_page' => -1,		 					
		'order'    => 'DESC',
		'cat' => $category->cat_ID

	);

	$the_query = new WP_Query($args);
	?>

	<?php 
		$args = array( 'post_type' => 'bannerslide', 'posts_per_page' => 5, 'post_name__in' => array('home-slider') );
		$the_query = new WP_Query( $args );		
	?>

	<div class="slide-home">
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php 
				if( have_rows('slide') ):

					// loop through the rows of data
				   while ( have_rows('slide') ) : the_row();
			   
					   // display a sub field value
					   $titleSlide = get_sub_field('titulo');
					   $imageSlide = get_sub_field('imagen');
					   $imageSlideMobile = get_sub_field('imagen_mobile');
					   $contentSlide = get_sub_field('texto');
					   $linkSlide = get_sub_field('link');

					   if( !empty( $imageSlide ) ): ?>
					   	<div class="content-slide">							
							<div class="slide-block">
								<img class="mobile" src="<?php echo esc_url($imageSlideMobile['url']); ?>" alt="" />
								<img class="desktop" src="<?php echo esc_url($imageSlide['url']); ?>" alt="" />
								<div class="content-text">
									<h4><?php  echo $titleSlide; ?> </h4>
									<p class="text-slide"><?php echo $contentSlide; ?></p>
									<a href="<?php echo esc_url( $linkSlide ); ?> " target="_blank" class="link-slide">Ver Más</a>
								</div>
							</div>		
							
						</div>						

			   			<?php endif; 
				   endwhile;
			   
			   else :
			   
				   echo "no content find";
			   
			   endif; ?>
			
				<?php wp_reset_postdata(); ?>		
			<?php endwhile; ?>
		<?php endif; ?>	
	</div>
	


	<div class="containergrid">
		
	</div>


<!--
	<div class="gridhome">
	<div class="grid-sizer"></div>
	
	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--square"></div>  
	<div class="grid-item grid-item--squarex2"></div>

	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--rectangular"></div>

	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--square"></div>

	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--rectangular"></div>

	<div class="grid-item grid-item--squarex2"></div>
	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--square"></div>
	<div class="grid-item grid-item--rectangular"></div>
	<div class="grid-item grid-item--rectangular"></div>

		<div class="page-load-status">
		<div class="loader-ellips infinite-scroll-request">
			<span class="loader-ellips__dot"></span>
			<span class="loader-ellips__dot"></span>
			<span class="loader-ellips__dot"></span>
			<span class="loader-ellips__dot"></span>
		</div>
		<p class="infinite-scroll-last">End of content</p>
		<p class="infinite-scroll-error">No more pages to load</p>
		</div>

		<a class="pagination__next" href="/page/2">Next</a>
	
	</div>
	-->

	
</div>
<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>


