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
            <?php 
                $args = array( 'post_type' => 'vacantes', 'posts_per_page' => 50,  'orderby' => array( 'date' => 'DESC') );
                $the_query = new WP_Query( $args );		
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php						
                        $title = the_title();
                        $city = get_field('city');
                        $intro = get_field('introduction');
                        $description = get_field('description');
                        $email = get_field('email');
                            ?>												            
                    <hr>
                    <h4 class="title-oportunity"><?php echo $title; ?></h4>
                    <p class="city-oportunity"><?php echo $city; ?></p> 
                    <p class="intro-oportunity"><?php echo $intro ?></p>
                    <p class="description-oportunity"><?php echo $description; ?></p>
                    <p class="email-oportunity"><?php echo $email; ?></p>            

                    <?php endwhile; ?>
                <?php endif; ?>	
    </div>


<?php  get_template_part('template-parts/part-footer'); ?>
<?php get_footer(); ?>
 
