<?php
$terms = get_field('categories_4');
if($terms): ?>

	<section class="categories">
		<div class="content-width">

			<?php if ($field = get_field('title_4')): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>
			
			<div class="content">

				<?php foreach($terms as $term): ?>
					<div class="item">
						<a href="<?= get_term_link($term->term_id) ?>">

							<?php if ($thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true)): ?>
								<figure>
									<?= wp_get_attachment_image($thumbnail_id, 'full') ?>
								</figure>
							<?php endif ?>
							
							<h6><?= $term->name ?></h6>

							<?php $query = new WP_Query(array('people' => 'product', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $term->term_id)))) ?>

							<p><?= $query->found_posts ?> <?php _e('items', 'Fiori') ?></p>
							<div class="icon-wrap">
								<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-12-1.svg" alt="">
							</div>
						</a>
					</div>
				<?php endforeach; ?>

			</div>

			<?php if ($field = get_field('link_4')): ?>
				<div class="line-link-wrap">
					<a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt=""></a>
				</div>
			<?php endif ?>
			
		</div>
	</section>

	<?php endif; ?>