<?php
/* Template Name: About template */
?>


<?php global $tDir; ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>

	<div class="container-about">
			<!-- Large modal Mobil -->						
			<div class="modal  modal-leaders-mobil modal-dialog  modal-lg" tabindex="-1" role="dialog">
				<div class="modal-content">								
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span >< Atras</span>
				</button>
							
				<div class="modal-body">
					<div class="opacity"></div>									
					<div class="detail-leader-mobil">					
						<img class="photo-leader" src="" alt="">
						<div class="content-detail">
							<p class="name-leader"></p>
							<p class="position-leader"></p>
							<p class="description-leader"></p>
						</div>
					</div>
				</div>							
				</div>						
			</div>
								
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
		

			
			</div>

			<!-- Large modal Desktop -->						
			<div class="modal  modal-leaders modal-dialog  modal-lg" tabindex="-1" role="dialog">
				<div class="modal-content">								
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
							
				<div class="modal-body">
					<div class="opacity"></div>									
					<div class="detail-leader">					
						<img class="photo-leader" src="" alt="">
						<p class="name-leader"></p>
						<p class="position-leader"></p>
						<p class="description-leader"></p>
					</div>
				</div>							
				</div>						
			</div>
		
			<div class="lideres">

				<div class="card-group row">					
					<h3>Nuestros Lideres</h3>	
						<?php 
							$args = array( 'post_type' => 'nuestroslideres', 'posts_per_page' => 50,  'orderby' => array( 'date' => 'DESC') );
							$the_query = new WP_Query( $args );		
							if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php						
									$photoLeader = get_field('foto');
									$photoLeaderModal = get_field('foto_modal');
									$position = get_field('cargo');
									$description = get_field('descripcion');
									$areaLeader = get_field('lider_de_area');
								?>													
								<?php if(!$areaLeader) : ?> 
										<div class="col-xs-1 col-md-3 ">																																												
												<div class="card" >											
													<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
													<div class="hover-card"></div>										
																										
														<div class="content-hover modal-leaders" data-toggle="modal" data-target=".modal-leaders" data-name="<?php the_title(); ?>" data-photo="<?php echo $photoLeader; ?>" data-photo-modal="<?php echo $photoLeaderModal; ?>" data-position="<?php echo  $position?>" data-description="<?php echo wp_strip_all_tags($description) ?>">
															<p class="name-leader"><?php echo the_title(); ?></p>
															<p class="position-leader"><?php  echo $position ?></p>
															<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
														</div>		
														<div class="hover-card movil"></div>	
														<div class="content-hover-mobil modal-leaders-mobil" data-toggle="modal" data-target=".modal-leaders-mobil" data-name="<?php the_title(); ?>" data-photo="<?php echo $photoLeader; ?>" data-photo-modal="<?php echo $photoLeaderModal; ?>" data-position="<?php echo  $position?>" data-description="<?php echo wp_strip_all_tags($description) ?>">
															<p class="name-leader"><?php echo the_title(); ?></p>
															<p class="position-leader"><?php  echo $position ?></p>
															<a href="#" class="readMore">Ver más  </a> <span  class="readMore"> > </span>
														</div>										
												</div>										
										</div>	
								<?php endif; ?>		
								<?php endwhile; ?>
						<?php endif; ?>	
				</div>
				
				
				
												<!-- IMPLEMENT TABS AND SHOW AREA LEADERS-->
								<div class="lideres-area">										
										<a class="tab-collapse-leaders" data-toggle="collapse" href="#collapseLeaders" role="button" aria-expanded="false" aria-controls="collapseLeaders">
											Líderes de las áreas 
											<span> - </span>
										</a>
																			
										<div class="collapse" id="collapseLeaders">
											<div class="card-group row">
											
												<?php 
												$args = array( 'post_type' => 'nuestroslideres', 'posts_per_page' => 50,  'orderby' => array( 'date' => 'DESC') );
												$the_query = new WP_Query( $args );		
												if ( $the_query->have_posts() ) :
													while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
													<?php						
														$photoLeader = get_field('foto');
														$position = get_field('cargo');
														$description = get_field('descripcion');
														$areaLeader = get_field('lider_de_area');
													?>
													
														<?php if($areaLeader) : ?> 	
														<div class="col-xs-1 col-md-3 ">
															<div class="card">											
																	<img class="" src="<?php echo $photoLeader ?>" alt="<?php echo $photoLeader ?>">
																	<div class="hover-card"></div>										
																												
																
															</div>
														</div>
														<?php endif; ?>
													<?php endwhile; ?>
												<?php endif; ?>
										
											</div>
										</div>									
								</div>	

	
				<div class="container-share">
					<div class="images-share">						
						<?php echo do_shortcode("[social_share_button]"); ?>
						<div class="img-share">
						<img src="<?php echo get_template_directory_uri()?>/images/newshare.svg" alt="">
						</div>
					</div>
				</div>
			</div>	

<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>
 
