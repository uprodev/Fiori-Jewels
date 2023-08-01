<?php 
$wp_query = new WP_Query(array('post_type' => 'product', 'posts_per_page' => get_field('number_of_products_5') > 0 ? get_field('number_of_products_5') : -1, 'paged' => get_query_var('paged')));
if($wp_query->have_posts()): ?>

	<section class="slider-progress-block">
		<div class="content-width">

			<?php if ($field = get_field('title_5')): ?>
				<div class="title"><?= $field ?></div>
			<?php endif ?>
			
			<div class="slider-wrap">

				<?php if ($field = get_field('link_5')): ?>
					<div class="link-rotate">
						<a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
					</div>
				<?php endif ?>
				
				<div class="swiper slider-progress">
					<div class="swiper-wrapper">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="swiper-slide">
								
								<?php get_template_part('parts/content', 'product') ?>

							</div>	

							<?php 
						endwhile; 
						wp_reset_query();
						?>

					</div>
				</div>
			</div>
			<div class="swiper-pagination progress-pagination"></div>
		</div>
	</section>

	<?php endif ?>