<?php global $tDir; ?>
<?php /* Template Name: Contact page */ ?>
<?php get_header(); ?>
<?php  get_template_part('template-parts/part-header');
global $wp_query;
?>

<?php
    $direccion = get_field('direccion', $wp_query->post->ID); 
    $telefono = get_field('telefono', $wp_query->post->ID); 
    $email = get_field('correo', $wp_query->post->ID); 
?>
<div class="contact-desk">
    <div class="row">
        <div class="first-section col-xs-1 col-md-3 offset-md-1 order-last order-md-1">
            <div class="contact-info">
                <p><?php echo $direccion; ?></p>
                <p><?php echo $telefono ?></p>
                <p>Contacto</p>
                <p><?php echo $email ?></p>
            </div>
            <div class="form-contact">
                <h3>Contáctanos</h3>
                <?php echo do_shortcode('[contact-form-7 id="2680" title="Contact form 1"]'); ?>
            </div>
        </div>

        <div class="col-xs-1 col-md-8 order-first order-md-2">
            <div class="location-contact">
                <img src="<?php echo get_template_directory_uri() ?>/images/location.PNG" alt="">
            </div>
        </div>
    </div>

    <div class="aliados-container">
        <h3>Conoce las agencias del Grupo Sancho</h3>    
        	<!-- INICIO ALIADOS -->
			<div id="galery_company" class="container-company">
				<?php $aliados = get_field('aliados', $wp_query->post->ID); ?>
				<?php foreach ($aliados as $key => $value): ?>											
						<div class="two-company">
						
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
						
						</div>
						
				<?php endforeach ?>	
				
    </div>
</div>

<?php get_template_part('template-parts/part-footer'); ?> 
<?php get_footer(); ?>