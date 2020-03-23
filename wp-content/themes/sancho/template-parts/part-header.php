<?php global $tDir; ?> 
<div class="container-general">
	<div class="header-sancho">
		<div class="icon-menu-mobile">
			<span class="icon-mobile"></span>
		</div>
		<div class="menu-mobile">
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
		</div>
		<div class="logo-sancho-mobile">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $tDir;?>/images/sancho_mobile.png"></a>
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
				$args = array( 'post_type' => 'redessociales', 'posts_per_page' => 5 );
				$the_query = new WP_Query( $args ); 				
				?>				
				
			</ul>
			<div class="content-social-icons">
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
					$tags_array = get_tags( $args );
				?>
				<ul class="list-sugestion" id="list-sugestion">
					<?php foreach ($tags_array as $key => $value): ?>
						<?php if ($key < 3): ?>
							<li><a href="#"><?php echo $value->name ?></a></li>
						<?php endif ?>	    			
					<?php endforeach ?>
				</ul>	
			</div>
		</div>
	
		
	</div>


