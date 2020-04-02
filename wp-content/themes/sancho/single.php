<?php global $tDir; ?>
<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>
<div id="primary" class="content-area">
	<div class="container-article">
		<div class="container-share">
				<div class="images-share">
					
					<?php echo do_shortcode("[social_share_button]"); ?>
					<div class="img-share">
					</div>
				</div>
		</div>		
			<div class="banner-article">
				<?php while ( have_posts() ) : the_post(); ?>	
				<?php 
					$image_desktop = get_field('image_desk');
					$image_mobile = get_field('image_mobil');
				 ?>
		
				 <?php if ($image_desktop): ?>
					<img class="img-article-desk" src="<?php the_field('image_desk'); ?>">				 	
				 <?php endif ?>
				<?php if ($image_mobile): ?>
					<img class="img-article-mobile" src="<?php the_field('image_mobil');?>">	
				<?php endif ?>
				
				<?php endwhile; ?>
			</div>
			<div class="container-text-article">
				<h1> <?php echo the_title(); ?></h1>				
				<h3><span class="author"><?php echo get_the_author_meta('user_firstname');  ?></span> | <span class="date-article"><?php the_date() ?></span></h3>	
				<div class="content-article">					
					<?php echo get_the_content(); ?>
				</div>
				<hr>

				<div class="container-related">				
					<?php 
						$gettags = get_the_tags();						
						$tags = [];
						if ($gettags) {
							foreach ($gettags as $key => $value) {
								array_push($tags, $value->name);
							}

							$tags_related = implode(", ", $tags);
							
							$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								
								'tag' => $tags_related,
								'post__not_in ' => array( get_the_ID()),
								'posts_per_page' => 20,								
								'orderby' => array( 'date' => 'ASC'),						
							);
						}
						// ENABLE IT IF IS NECESARY SHOW RELATED BY CATEGORY
						// else{
						// 	$category = get_the_category();
							
						// 	$args = array(
						// 		'post_type' => 'post',
						// 		'post_status' => 'publish',
						// 		'category_name' => $category,
						// 		'posts_per_page' => 20,
						// 		'orderby' => array( 'date' => 'ASC'),						
						// 	);
						// }
						
						
					
						$related_post = new WP_Query( $args );
					?>
					<?php if ( $related_post->have_posts() ) : ?>
					<h3>También te puede interesar</h3>
						<div class="gridhome">
							<div class="grid-sizer"></div>
							<?php while ( $related_post->have_posts() ) : $related_post->the_post(); ?>					
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
											<p class="taq-post"><?php  the_category() ?> </p>
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

				</div>
			</div>

		

			
						
	</div>
		
</div>


<div class="modal-video-article">
	<div class="video-article">
		<iframe id="video" width="560" height="315" src="<?php echo $src; ?>" frameborder="0" allowfullscreen></iframe>
		<span id="stop_video" class="close-modal-article close-video-article"></span>
	</div>
</div>

<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>
 