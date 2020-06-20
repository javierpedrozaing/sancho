<?php //$args = array('child_of' => 9);
	  //$categories = get_categories( $args ); var_dump($categories); return; ?>
<?php global $tDir; ?>
<?php /* Template Name: Oportunidades page */ ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); 
global $wp_query;

?>
    <div class="oportunities">
        <h3>Trabaja con Nosotros</h3>
        <hr>
            <?php 
                $args = array( 'post_type' => 'vacantes', 'posts_per_page' => 50,  'orderby' => array( 'date' => 'DESC') );
                $the_query = new WP_Query( $args );		
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php						                        
                        $city = get_field('city');
                        $intro = get_field('introduction');
                        $description = get_field('description');
                        $email = get_field('email');
                    ?>												            
                    
                    <div class="container-opotunity">
                        <div class="intro-content">
                            <h4 class="title-oportunity"><?php the_title(); ?></h4>
                            <p class="city-oportunity"><?php echo $city; ?></p> 
                            <p class="intro-oportunity"><?php echo $intro ?></p>
                            <p class="email-oportunity"><?php echo $email; ?></p>            
                        </div>

                        

                        <div id="description-<?php echo get_the_id()?>" class="collapse">                    
                            <p class="description-oportunity"><?php echo $description; ?></p>                        
                        </div>

                        <a class="read-more collapsed" data-toggle="collapse" data-target="#description-<?php echo get_the_id() ?>">Ver más  </a><span class="read-more-icon fa"></span>
                    </div>
                    <hr>
                    <?php endwhile; ?>
                <?php endif; ?>	

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
 
