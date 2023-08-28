<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="item">
    <div class="product-item-button product-big-item">
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'large') ?>" alt="">
            </a>
        </figure>
        <div class="text-wrap">
            <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>
            <p class="cost"><?= $product->get_price_html() ?></p>
            <div class="like-wrap">
                <a href="#"><i class="far fa-heart"></i></a>
            </div>
        </div>
        <div class="wrap-hover">
            <div class="btn-wrap">
                <a href="#" class="btn-default">ADD TO BAG</a>
            </div>
        </div>
    </div>
</div>



