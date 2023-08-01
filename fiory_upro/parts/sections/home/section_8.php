<?php
$featured_posts = get_field('news_8');
if($featured_posts): ?>

	<section class="news">
		<div class="content-width">
			<div class="title">

				<?php if ($field = get_field('title_8')): ?>
					<h2><?= $field ?></h2>
				<?php endif ?>
				
				<?php if ($field = get_field('link_8')): ?>
					<div class="wrap">
						<div class="line-link-wrap">
							<a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""></a>
						</div>
					</div>
				<?php endif ?>

			</div>
			<div class="slider-wrap">
				<div class="swiper slider-news">
					<div class="swiper-wrapper">

						<?php foreach($featured_posts as $post): 

							setup_postdata($post); ?>
							<div class="swiper-slide">
								<?php get_template_part('parts/content', 'post') ?>
							</div>
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>