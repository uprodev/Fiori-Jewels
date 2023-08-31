<?php
$product_id = get_the_ID();
$product = new WC_Product($product_id);
?>

<div class="product-item-button product-big-item">

	<?php if (has_post_thumbnail()): ?>
		<figure>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('full') ?>
			</a>
		</figure>
	<?php endif ?>

	<div class="text-wrap">
		<h6>
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</h6>
		<p><?= wp_get_object_terms(get_the_ID(), 'product_cat')[0]->name ?></p>

		<?php if ($price = $product->sale_price ?: $product->regular_price): ?>
			<p class="cost"><?= get_woocommerce_currency_symbol() ?><?= $price ?></p>
		<?php endif ?>

		<div class="like-wrap">
			<?= do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
		</div>
	</div>
	<div class="wrap-hover">
		<div class="btn-wrap">

			<?php
			echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="btn-default %s product_type_%s ajax_add_to_cart">%s</a>',
					esc_url( $product->add_to_cart_url() ),
					esc_attr( $product->get_id() ),
					esc_attr( $product->get_sku() ),
					$product->is_purchasable() ? 'add_to_cart_button' : '',
					esc_attr( $product->get_type() ),
					__('ADD TO BAG', 'Fiory')
				),
				$product )
				?>

			</div>
		</div>
	</div>
