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
										
			
			</div>
			<?php endwhile; ?>
			<div class="container-share">
				<div class="images-share">
					<div class="anchor-about">
						<div class="img-anchor">
						</div>
					</div>
					<?php echo do_shortcode("[social_share_button]"); ?>
					<div class="img-share">
					</div>
				</div>
			</div>
		</div>	

<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>
 
