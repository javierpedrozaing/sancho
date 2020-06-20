<?php

/* Template Name: The Work template */
global $tDir;
?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>

<div id="primary" class="content-area the-work">
	<div class="filter">
		<h3>The Work</h3>
	</div>

	<?php 
		
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => 'the-work',
			'posts_per_page' => 20,
			'orderby' => array( 'date' => 'ASC'),						
		);
		$blog_posts = new WP_Query( $args );
	?>

	<?php if ( $blog_posts->have_posts() ) : 
	
		?>
			<div class="gridhome">
				<div class="grid-sizer"></div>
				<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>					
					<?php
					// $meta_data = get_the_category(get_the_ID());
					// var_dump($meta_data);exit();	
					 $size_grid = get_field( 'size_grid' ); 
					$external_link = get_field( 'check_external_link' );
					$the_external_link = get_field( 'external_link' );
					$client = get_field( 'cliente' );
					$author = get_field( 'campaing_author' );
					$campaingDate = get_field( 'campaing_date' );
					$permalink =  ($external_link) ? $the_external_link : get_post_permalink(get_the_ID());
					?>
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID()); ?>											
					<a href="<?php echo $permalink?>" target="_blank">
						<div class="grid-item grid-item--<?php echo explode(':', $size_grid)[0]; ?>" ><img class="thumbnail-grid" src="<?php  echo $featured_img_url; ?>" alt="">
							<div class="hover-content">
								<p class="taq-post"><?php  echo the_category() ?> </p>
								<p class="title-post"> <?php  echo the_title() ?>  </p>
								<p class="date-post"><?php echo $campaingDate ?></p>
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
			
</div><!-- .content-area -->


<?php get_template_part('template-parts/part-footer'); ?> 
<?php get_footer(); ?>
