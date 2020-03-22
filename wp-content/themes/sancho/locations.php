<?php //$args = array('child_of' => 9);
	  //$categories = get_categories( $args ); var_dump($categories); return; ?>
<?php global $tDir; ?>
<?php /* Template Name: Locations */ ?>
<?php get_header(); ?>
<?php  get_template_part('part-header'); ?>

<?php 

global $wp_query;

 ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main page-location" role="main">
		<div class="container-map">
			<div class="map-sancho">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.521875the_ID()7892!2d-74.04209588807342!3d4.678962106087319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a90a643e7a1%3A0x383426df5ca13da8!2zQ2wuIDk4ICM5LTMsIEJvZ290w6E!5e0!3m2!1ses!2sco!4v1513690984835" width="600" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> -->
				<?php echo do_shortcode( '[wpgmza id="1"]' ); ?>
			</div>
		</div>
		<div class="container-contact">
			<div class="info-sancho">
			
				<h1><?php echo get_field('titulo', $wp_query->post->ID); ?></h1>
				<p><?php echo get_field('direccion', $wp_query->post->ID); ?></p>
				<p>Tel: <?php echo get_field('telefono', $wp_query->post->ID); ?></p>
				<p>Contacto:</p>
				<p><?php echo get_field('correo', $wp_query->post->ID); ?></p>
			</div>
			<div class="info-emails">
				<div class="work-us">
					<a href="https://mail.google.com/mail/ca/u/0/#inbox" target="_blank"><p> <?php if(ICL_LANGUAGE_CODE == "en"){ ?> Work with us <?php }else {?>Trabaje con nosotros <?php }?></p></a>
				</div>
				<div class="work-us">
					<a href="https://mail.google.com/mail/ca/u/0/#inbox" target="_blank"><p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Supplier <?php }else {?> Sea proveedor <?php }?></p></a>
				</div>
				<div class="work-us">
					<a href="https://mail.google.com/mail/ca/u/0/#inbox" target="_blank"><p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Future Customer <?php }else {?> Futuro cliente <?php }?></p></a>
				</div>
			</div>
			<!-- INICIO ALIADOS -->
			<div id="galery_company" class="container-company">
				<?php $aliados = get_field('aliados', $wp_query->post->ID); $row_company = 0; $two_company = 0; ?>
				<?php foreach ($aliados as $key => $value): ?>
					<?php 
						$two_company++; 
						$row_company++;
					?>
					<?php if ($row_company == 1): ?>
						<div class="row-company">
					<?php endif ?>

						<?php if ($two_company==1): ?>
							<div class="two-company">
						<?php endif ?>
							<?php if ($value['url_aliado'] != "") : ?>
								<a href="<?php echo $value['url_aliado']; ?>" target="_blank">
									<div class="container-img-company">
										<span class="img-black" style="background: url('<?php echo $value['imagen_gris']['url'];?>') center no-repeat;"></span>
										<span class="img-color" style="background: url('<?php echo $value['imagen_color']['url'];?>') center no-repeat;"></span>
									</div>
								</a>
							<?php else: ?>
								<div class="container-img-company">
									<span class="img-black" style="background: url('<?php echo $value['imagen_gris']['url'];?>') center no-repeat;"></span>
									<span class="img-color" style="background: url('<?php echo $value['imagen_color']['url'];?>') center no-repeat;"></span>
								</div>
							<?php endif; ?>
						<?php if ($two_company==2): $two_company=0;?>
							</div>
						<?php endif ?>

					<?php if ($row_company == 6): $row_company=0;?>
						</div>
					<?php endif ?>
				<?php endforeach ?>	
				<?php if ($two_company==1): ?>
					</div>
				<?php endif ?>
				<?php if (($row_company!=6) AND ($row_company!=0)): ?>
					</div>
				<?php endif ?>			
			
			<!-- FIN ALIADOS -->
			<div class="container-search-ubication">
				<span class="icon-search-ubication"></span>
				<form id="searchform" class="search-form-ubication">
	                <input class="input-search-ubication" type="text" name="s" id="s" placeholder="<?php if(ICL_LANGUAGE_CODE == "en"){ ?> Find other locations <?php }else {?> Buscar otras ubicaciones <?php }?>" autocomplete="off"/>
		        </form>
			</div>

			<div class="container-continent">
				<!-- pestaña -->
				<div class="tab-continent container-nortamerica active-continent" data-tab="nortamerica">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> North America <?php }else {?> Norteamérica <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="nortamerica" class="city-continents active-info-continent">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 9);
	  						$categories = get_categories( $args );
						?>
						<?php foreach ($categories as $key => $value): ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
									    'category_name'    =>  $value->slug
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- pestaña -->
				<div class="tab-continent container-america" data-tab="america">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Latin America <?php }else {?> America latina <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="america" class="city-continents citys-america">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 10);
	  						$categories = get_categories( $args );
	  						
						?>
						
						<?php foreach ($categories as $key => $value): ?>
							<?php //var_dump($value->name); return; ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
									    'category_name'    =>  $value->slug
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo "prueba"; ?></p>
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
								
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- pestaña -->
				<div class="tab-continent container-europa" data-tab="europa">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Europe <?php }else {?> Europa <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="europa" class="city-continents citys-america">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 11);
	  						$categories = get_categories( $args );
	  						
						?>
						<?php foreach ($categories as $key => $value): ?>
							<?php //var_dump($value->name); return; ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
									    'category_name'    =>  $value->slug
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- pestaña -->
				<div class="tab-continent container-africa" data-tab="africa">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Middle East and Africa <?php }else {?> Oriente Medio y África <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="africa" class="city-continents citys-america">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 12);
	  						$categories = get_categories( $args );
	  						//var_dump($categories);
						?>
						<?php foreach ($categories as $key => $value): ?>
							<?php //var_dump($value->name); return; ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
									    'category_name'    =>  $value->slug
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- pestaña -->
				<div class="tab-continent container-asia" data-tab="asia">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Asia <?php }else {?> Asia <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="asia" class="city-continents citys-america">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 13);
	  						$categories = get_categories( $args );
	  						var_dump($categories);
						?>
						<?php foreach ($categories as $key => $value): ?>
							<?php //var_dump($value->name); return; ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
									    'category_name'    =>  $value->slug
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- pestaña -->
				<div class="tab-continent container-australia" data-tab="australia">
					<p><?php if(ICL_LANGUAGE_CODE == "en"){ ?> Australia and New Zealand <?php }else {?> Australia y Nueva Zelanda <?php }?></p>
				</div>
				<!-- contenido -->
				<div id="australia" class="city-continents citys-america">
					<div class="column-city">
						<?php 
							//Sub categorias de norteamerica
							$args = array('child_of' => 14);
	  						$categories = get_categories( $args );
	  						//var_dump($categories);
						?>
						<?php foreach ($categories as $key => $value): ?>
							<?php //var_dump($value->name); return; ?>
							<div class="container-country">
								<h1><?php echo $value->name; ?></h1>
								<?php 
									$args_ofice = array(
									    'post_type'=> 'empresas',
										'category_name'    =>  $value->slug,
										'posts_per_page' => '30'
									    
									);
								?>
								<?php query_posts($args_ofice); ?>
								<?php while ( have_posts() ) : the_post();  ?>
									<div class="company-country">
										<h3><?php echo get_field('nombre'); ?></h3>
										<div class="info-company">
											<p><?php echo get_field('direccion'); ?></p>
											<p><?php echo get_field('ciudad'); ?></p>
											<p><?php echo get_field('url'); ?></p>
											<p><?php echo get_field('telefono'); ?></p>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div id="search_query" class="result-search-ubication">
				
			</div>
		
	</main>
</div>
<?php  get_template_part('part-footer'); ?>
<?php get_footer(); ?>
 
