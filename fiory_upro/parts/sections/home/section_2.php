<?php
$wp_query = new WP_Query(array('post_type' => 'product', 'posts_per_page' => -1, 'meta_key' => 'is_new', 'meta_value' => true, 'paged' => get_query_var('paged')));
if($wp_query->have_posts()): ?>

	<section class="product-slider-block woocommerce">
		<div class="content-width">
			<div class="top">
				<div class="wrap">

					<?php if ($field = get_field('title_products')): ?>
						<div class="title">
							<h2><?= $field ?></h2>
						</div>
					<?php endif ?>

					<?php if ($field = get_field('text_products')): ?>
						<div class="text">
							<?= $field ?>
						</div>
					<?php endif ?>

				</div>
				<div class="nav-wrap">
					<div class="swiper-button-prev product-prev"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-10-1.svg" alt=""></div>
					<div class="swiper-button-next product-next"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-10-2.svg" alt=""></div>
				</div>
			</div>
			<div class="slider-wrap">
				<div class="swiper product-slider">
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

			<?php if ($field = get_field('link_products')): ?>
				<div class="line-link-wrap">
					<a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""></a>
				</div>
			<?php endif ?>

		</div>
	</section>

	<?php endif ?>
