<?php global $tDir; ?> 
<div class="container-general">
	<div class="header-sancho">
		<div class="icon-menu-mobile">
			<span  class="tab-collapse-leaders icon-mobile" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu">
			
			</span>
		</div>

		<!-- <div class="menu-mobile">
			<div class="option-menu-mobile">
				<div class="close-menu-mobile">
					<span class="logo-close-mob"></span>
				</div>
				<div class="home-mobile option-top">
					<a href="<?php echo get_home_url(); ?>"><span></span><p>Home</p></a>
				</div>
				<div class="menu-menu-header-container">
					<ul id="menu-header-mobile" class="menu">
					<?php 
						wp_nav_menu(
							array(
								'theme_location' => 'top',
								'menu_id'        => 'top-menu',
							)
						);
					?>
					</ul>
				</div>
			</div>
		</div> -->
		<div class="logo-sancho-mobile">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $tDir;?>/images/sancho.png"></a>
		</div>
		<div class="logo-sancho">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $tDir;?>/images/sancho.png"></a>
		</div>
		<div class="menu-menu-header-container">

		
			<ul id="menu-header-desktop" class="menu">
				<?php 
					wp_nav_menu(
						array(
							'theme_location' => 'top',
							'menu_id'        => 'top-menu',
						)
					);
				?>	
				<?php 
				$args = array( 'post_type' => 'redessociales', 'posts_per_page' => 5, 'post_status' => 'publish' );
				$social_media = new WP_Query( $args ); 				
				?>				
				
			</ul>
			<div class="content-social-icons">
					<?php if ( $social_media->have_posts() ) : ?>
						<?php while ( $social_media->have_posts() ) : $social_media->the_post(); ?>
						<?php 
						$image = get_field('icono');
						$url = get_field('url');
						if( !empty( $image ) ): ?>
						<a href="<?php echo esc_url( $url ); ?> " target="_blank">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
						<?php endif; ?>
							<?php wp_reset_postdata(); ?>		
						<?php endwhile; ?>
					<?php endif; ?>				
			</div>

			<div class="search-container">
				<div class="search-modal-input">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) )  ?>" onsubmit="">
						<input id="input-search" class="input-search" type="text" value="<?php get_search_query() ?>" name="s" id="s" placeholder="<?php if(ICL_LANGUAGE_CODE == "en"){ ?>Search <?php }else {?>Buscar <?php }?>" autocomplete="off"/>
					</form>
					<button class="button-search" type="submit" id="searchsubmit"><i class="search-icon"></i></button>
				</div>
				<?php 
					$argsPosts = array( 'post_type' => 'post', 'limit' => 5 );
					$posts = new WP_Query( $argsPosts ); 				
				?>		
			
				<ul class="list-sugestion" id="list-sugestion">
				<?php if ( $posts->have_posts() ) : ?>
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>										
						<li><a href="#"><?php echo get_the_title(get_the_ID()); ?></a></li>						
					<?php endwhile; ?>
				<?php endif ?>
				</ul>	
			</div>
		</div>
	
		
	</div>

	<div class="collapse" id="collapseMenu">
				<ul id="menu-header-mobile" class="menu">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) )  ?>" onsubmit="">
							<input id="input-search" class="input-search" type="text" value="<?php get_search_query() ?>" name="s" id="s" placeholder="<?php if(ICL_LANGUAGE_CODE == "en"){ ?>Search <?php }else {?>Buscar <?php }?>" autocomplete="off"/>							
							<div class="search-container">
								<span class="button-search"></span>
							</div>
							 
					</form>
					<?php 
						wp_nav_menu(
							array(
								'theme_location' => 'top',
								'menu_id'        => 'top-menu',
							)
						);
					?>	
					<?php ?>
				</ul>

				<?php 
				$args = array( 'post_type' => 'redessociales', 'posts_per_page' => 5 );
				$social_media_mb = new WP_Query( $args ); 				
				?>	
				<div class="content-social-icons mobil">
					<?php if ( $social_media_mb->have_posts() ) : ?>
						<?php while ( $social_media_mb->have_posts() ) : $social_media_mb->the_post(); ?>
						<?php 
						$image = get_field('icono-mobile');
						$url = get_field('url');
						if( !empty( $image ) ): ?>
						<a href="<?php echo esc_url( $url ); ?> " target="_blank">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</a>
						<?php endif; ?>
							<?php wp_reset_postdata(); ?>		
						<?php endwhile; ?>
					<?php endif; ?>				
			</div>
	</div>


