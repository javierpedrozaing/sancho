<?php /* Template Name: Home Template*/ global $tDir; ?>
<?php get_header(); ?>
<?php  get_template_part('part-header'); ?>

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
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php 

					// consultamos el video embebido
		$iframe = get_field('link__video');
						// use preg_match to find iframe src
		preg_match('/src="(.+?)"/', $iframe, $matches);
		$src = $matches[1];
		$id_video = explode("embed/", $src);
						// get only the id video
		$id = explode("?feature", $id_video[1]);	
		?>
		<?php if( get_field('destacado') ): ?>
			<?php if(get_field('link__video')) : ?>
				<div class="embed-destacado item_grid_hover">
					<?php if (!empty($id[0])): ?>
						<div class="container-video-favorite">
							<img src="https://img.youtube.com/vi/<?php echo $id[0] ?>/hqdefault.jpg">
						</div>
					<?php endif; ?>
					<div class="modal-video-article" id="<?php echo the_ID(); ?>">
						<div class="video-article">
							<iframe class="video_grid" id="<?php echo the_ID(); ?>" width="560" height="315" src="<?php echo $src; ?>" frameborder="0" allowfullscreen></iframe>
							<span class="close-modal-article close-video-grid" data-url="<?php echo get_permalink(get_the_ID()); ?>"></span>
						</div>
					</div>
					<div class="container_hover_grid" id="<?php echo the_ID(); ?>">
						<h1><?php echo the_field("origen"); ?></h1>
						<p><?php the_title(); ?></p>
					</div>
				</div>
			<?php else: ?>
				
				<?php $thumbID = get_post_thumbnail_id( get_the_ID() ); 
						$imgDestacada = wp_get_attachment_url( $thumbID ); ?>
				<div class="imagen_destacada item_grid_hover">
					<a href="<?php echo get_permalink(); ?>" id="hidefeature" class="hidefeature">
						<div class="container_hover_grid">
							<h1><?php echo the_field("origen"); ?></h1>
							<p><?php the_title(); ?></p>
						</div>
						<img src="<?php echo $imgDestacada; ?>" alt="" />
					</a>
				</div>
			<?php endif;  ?>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<main id="main" class="site-main" role="main">
		<?php 
			while ( have_posts() ) : the_post(); 

				the_content();
			endwhile;
			
		 ?>
	</main>
	<?php get_sidebar( 'content-bottom' ); ?>
</div>
<?php get_sidebar(); ?>
<?php  get_template_part('part-footer'); ?>
<?php get_footer(); ?>