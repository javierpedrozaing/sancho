<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()):?>
<ul>
	
	<?php while (have_posts()) : the_post(); ?>
		<?php $image_related = get_field('image_related_article'); ?>
		<?php if ($image_related):?>
		<li>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<!-- <img src="<?#php the_field('image_related_article'); ?>" alt="">	 -->		
				<?php echo wp_get_attachment_image($image_related, full); ?>			
				<p><?php echo the_field("origen"); ?></p>
				<h2><?php echo the_title(); ?></h2>
			</a>
		</li>
		<?php endif; ?>
	<?php endwhile; ?>
</ul>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
