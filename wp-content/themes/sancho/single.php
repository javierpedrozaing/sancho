<?php global $tDir; ?>
<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header(); ?>
<?php  get_template_part('part-header'); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main page-article" role="main">
		<div class="container-article">
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
				<?php while ( have_posts() ) : the_post(); ?>	
				
					<?php echo the_field("primer_parrafo_article"); ?>
					
					<?php if (get_field('subtitulo_centrado') ) : ?>
							<h2><?php the_field('subtitulo_centrado'); ?></h2>
					<?php endif; ?>
					<?php echo the_field("segundo_parrafo_article"); ?>					
					<?php 
					// get iframe HTML
						$iframe = get_field('video_de_contenido');
						// use preg_match to find iframe src
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						$id_video = explode("embed/", $src);
						// get only the id video
						$id = explode("?feature", $id_video[1]);
						
					 ?>
					
			</div>
			<?php if (!empty($id[0])): ?>
				<div id="play_video" class="container-video-article">

					<img src="https://img.youtube.com/vi/<?php echo $id[0] ?>/hqdefault.jpg">
				</div> 
			<?php endif ?>
				
			<div class="container-text-article">
						
				<?php echo the_field("tercer_parrafo_article"); ?>
				<?php endwhile; ?>
				<!-- <h3>Vestibulum ac diam sit amet</h3>
				<h1>Calixto</h1>
				<h4>Sancho BBDO</h4>
				<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
				<h2>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a nulla quis lorem</h2>
				<p>Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada.</p>
				<p>Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh.</p>--> 
			</div>

		<!-- 	<div id="play_video" class="container-video-article">
				<img src="https://img.youtube.com/vi/<insert-youtube-video-id-here>/hqdefault.jpg">
			</div> -->
			<!-- <div class="container-text-article">
				<p>Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Donec rutrum congue leo eget malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada.</p>
				<p>Curabitur aliquet quam id dui posuere blandit. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Nulla porttitor accumsan tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Sed porttitor lectus nibh.</p>
			</div> -->
			<div class="container-related">
				<h1>Relacionados</h1>
			<?php related_posts(); ?>
			</div>
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
	</main>
</div>

<div class="modal-video-article">
	<div class="video-article">
		<iframe id="video" width="560" height="315" src="<?php echo $src; ?>" frameborder="0" allowfullscreen></iframe>
		<span id="stop_video" class="close-modal-article close-video-article"></span>
	</div>
</div>

<?php  get_template_part('part-footer'); ?> 
<?php get_footer(); ?>