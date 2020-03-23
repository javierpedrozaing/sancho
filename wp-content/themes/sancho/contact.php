<?php global $tDir; ?>
<?php /* Template Name: Contact page */ ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header'); ?>
<main id="main" class="site-main" role="main">

		<?php 
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		 ?>
	</main><!-- .site-main -->
<?php get_template_part('template-parts/part-footer'); ?> 
<?php get_footer(); ?>