<?php
/* Template Name: About template */
?>


<?php global $tDir; ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>

	<div class="container-about">
			<?php while ( have_posts() ) : the_post(); ?>	
				
				<?php if (get_field('imagen_o_video') == "imagen") : ?>
					<div class="about-img">
						<img class="img-desktop-about" src="<?php echo the_field('imagen_escritorio'); ?>">
						<img class="img-mobile-about" src="<?php echo the_field('imagen_mobile') ?>">
					</div>
				<?php else : ?>
					<div class="embed-container">						
						<?php echo the_field('video'); ?>
					</div>
				<?php endif; ?>
		
			<div class="container-text-about">
				<h1><?php echo the_field('titulo'); ?></h1>					
				<div class="first-parraph">	
					<p><?php echo the_field('primer_parrafo'); ?></p>						
				</div>								
									
				<div class="second-parraph">
					<?php echo the_field('segundo_parrafo'); ?>					
				</div>
	
				<div class="third-parraph">
					<?php echo the_field('tercer_parrafo'); ?>							
				</div>
		

			<?php endwhile; ?>
			</div>

			
			<?php 
					$args = array( 'post_type' => 'nuestroslideres', 'posts_per_page' => 50 );
					$the_query = new WP_Query( $args );		
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php						
							$photoLeader = get_field('foto');
							$position = get_field('cargo');
							$description = get_field('descripcion');
							$areaLeader = get_field('lider_de_area');
						?>
							<!-- Large modal -->						
							<div class="modal  bd-example-modal-lg" tabindex="-1" role="dialog">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">									
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Modal body text goes here.</p>
								</div>							
								</div>
							</div>
							</div>


						<?php if(!$areaLeader) : ?> 						
							<div class="lideres">							
								<h3>Nuestros Lideres</h3>								
									<div class="card-group row">									
										<div class="col-xs-1 col-md-3 ">
											<div class="card">											
												<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
												<div class="hover-card"></div>										
													<div class="content-hover" data-toggle="modal" data-target=".bd-example-modal-lg">
														<p class="name-leader"><?php echo the_title(); ?></p>
														<p class="position-leader"><?php  echo $position ?></p>
														<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
													</div>												
											</div>										
										</div>

										<div class="col-xs-1 col-md-3 ">
											<div class="card">
												<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
												<div class="hover-card"></div>										
													<div class="content-hover">
														<p class="name-leader"><?php echo the_title(); ?></p>
														<p class="position-leader"><?php  echo $position ?></p>
														<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
													</div>												
											</div>										
										</div>

										<div class="col-xs-1 col-md-3 ">
											<div class="card">
												<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
												<div class="hover-card"></div>										
													<div class="content-hover">
														<p class="name-leader"><?php echo the_title(); ?></p>
														<p class="position-leader"><?php  echo $position ?></p>
														<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
													</div>												
											</div>										
										</div>

										<div class="col-xs-1 col-md-3 ">
											<div class="card">
												<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
												<div class="hover-card"></div>										
													<div class="content-hover">
														<p class="name-leader"><?php echo the_title(); ?></p>
														<p class="position-leader"><?php  echo $position ?></p>
														<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
													</div>												
											</div>										
										</div>																		
									</div>							
																										
								<?php else: ?>
								<!-- IMPLEMENT TABS AND SHOW AREA LEADERS-->
								
								<a class="tab-collapse-leaders" data-toggle="collapse" href="#collapseLeaders" role="button" aria-expanded="false" aria-controls="collapseLeaders">
									Líderes de las áreas 
									<span> - </span>
								</a>
							
								
								<div class="collapse" id="collapseLeaders">
								<div class="card card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
								</div>
								</div>
								<?php endif; ?>
							</div>	
						<?php endwhile; ?>
					<?php endif; ?>	


	
			<div class="container-share">
				<div class="images-share">
					
					<?php echo do_shortcode("[social_share_button]"); ?>
					<div class="img-share">
					</div>
				</div>
			</div>
		</div>	

<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>
 
