<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$image = get_the_post_thumbnail_url(get_the_id(), 'large')  ?: wc_placeholder_img_src();

?>


    <div class="img-wrap">
        <figure class="full">
            <a href="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" data-fancybox="gallery">
                <img src="<?= $image ?>" alt="">
            </a>
        </figure>
        <?php
        if ( $attachment_ids && $product->get_image_id() ) {
            foreach ( $attachment_ids as $attachment_id ) { ?>
                <figure>
                    <a href="<?= get_the_post_thumbnail_url($attachment_id, 'full') ?>" data-fancybox="gallery">
                        <?php echo   wp_get_attachment_image( $attachment_id, 'large' )   ;   ?>
                    </a>
                </figure>
        <?php }
        }?>

        <?php if (get_field('ring')) { ?>
            <div class="slider-wrap">
            <div class="swiper slider-p-1">
                <?php get_template_part('parts/hand'); ?>

            </div>
            <div class="scroll-wrap">
                    <p>Lighter</p>
                <div class="swiper-scrollbar swiper-scrollbar-1"></div>
                <p>Darker</p>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="mob-block">
        <div class="swiper mob-product-img">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?= $image ?>" alt="">
                </div>
                <?php
                if ( $attachment_ids && $product->get_image_id() ) {
                    foreach ( $attachment_ids as $attachment_id ) { ?>
                        <div class="swiper-slide">
                            <?php echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id );   ?>
                        </div>
                    <?php }
                }?>
            </div>
        </div>
        <div class="swiper-pagination mob-product-pagination"></div>
        <div class="like-wrap">
            <?= do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
        </div>
    </div>


<?php

