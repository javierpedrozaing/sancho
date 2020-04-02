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
			$array_query = [];
			if($_COOKIE['_querys']){
				foreach ($_COOKIE['_querys'] as $value){
				   // echo "<a href='{$value}'>{$value}</a>";
				     array_push($tags, $value);
				} 
			}
			$get_tags = implode($tags, "+");
			
			$query = new WP_Query( array( 'tag' => $get_tags ) );			
			//$query = $_POST['query'];
			array_push($array_query, $query);
		 	//print_r($data);
		 ?>
		<main id="main" class="site-main" role="main">
			<div class="container-result-search">
				<header class="page-header-search">
					<!-- <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sancho' ), get_search_query() ); ?></h1> -->
					<h1>Resultado de busqueda:</h1>
					<div class="letter-search">
						<?php if ($get_tags): ?>
							<?php foreach ($tags as $key => $value): ?>
								<p><?php echo $value; ?></p>
							<?php endforeach ?>
						<?php endif ?>
				
					</div>
					<div class="clean-search">
						<p>limpiar busqueda</p>
					</div>
				</header>
		<?php if ( $get_tags and $query->have_posts() ) : ?>
			
			<ul>			
			<?php while ( $query->have_posts() ) : $query->the_post() ?>				
				<?php 
					$thumbID = get_post_thumbnail_id( get_the_ID() ); 
					$image_related = get_field('image_related_article'); 

					if (get_field('check_external_link', get_the_ID())){
						$link_external = get_field('external_link', get_the_ID());
					}else{
						$link = get_permalink(get_the_ID());
					}

					$link_post = get_field('check_external_link', get_the_ID()) ? $link_external : $link; 

			?>	
				<?php if ( get_field("type", get_the_ID()) == "news" ): ?>
				<li style="height:105px;">
					<a href="<?php echo $link_post ?>" target="_blank">
					<div class="item_notice_plugin">
					<h1 class="notice-title"><?php echo get_the_title(get_the_ID()) ?></h1>
					<?php echo get_field("cuerpo_noticia",get_the_ID()) ?>
					</div>
					</a>
				</li>

				<?php else: ?>
				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				// get_template_part( 'content', 'search' );

				
				?>
				
					<li>
						<a href="<?php echo $link_post ?>" target='<?php echo $link_external ? '_blank' : '_self' ?>' rel="bookmark" title="">
							<?php echo wp_get_attachment_image($image_related, full); ?>	
							<p><?php echo get_field("origen") ?></p>
							<h1><?php echo get_the_title(); ?></h1>
						</a>
					</li>
				

			<?php
				endif;
				// End the loop.
				endwhile; 				
				wp_reset_query(); ?>
			</ul>	
		
		<?php else : ?>
			<div class="no-result-search"> 
				<p>No se encontraron resultados. Ingresa otro término de búsqueda.</p>
			</div>	

		<?php endif;
		?>
			</div>
	 </main>
	 </section> 

<?php  get_template_part('template-parts/footer'); ?>
<?php get_footer(); ?>