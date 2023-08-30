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
?>


    <div class="img-wrap">
        <figure class="full">
            <a href="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="fancybox">
                <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'large') ?>" alt="">
            </a>
        </figure>
        <?php
        if ( $attachment_ids && $product->get_image_id() ) {
            foreach ( $attachment_ids as $attachment_id ) { ?>
                <figure>
                    <a href="<?= get_the_post_thumbnail_url($attachment_id, 'full') ?>" class="fancybox">
                    <?php echo   wp_get_attachment_image( $attachment_id, 'large' )   ;   ?>
                    </a>
                </figure>
        <?php }
        }?>

        <div class="slider-wrap">
            <div class="swiper slider-p-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?= get_template_directory_uri() ?>/img/h-1.png" alt="">
                        <div class="product-img">
                            <img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= get_template_directory_uri() ?>/img/h-2.png" alt="">
                        <div class="product-img">
                            <img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= get_template_directory_uri() ?>/img/h-3.png" alt="">
                        <div class="product-img">
                            <img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= get_template_directory_uri() ?>/img/h-5.png" alt="">
                        <div class="product-img">
                            <img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= get_template_directory_uri() ?>/img/h-4.png" alt="">
                        <div class="product-img">
                            <img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-wrap">
                    <p>Lighter</p>
                <div class="swiper-scrollbar swiper-scrollbar-1"></div>
                <p>Darker</p>
            </div>
        </div>
    </div>
    <div class="mob-block">
        <div class="swiper mob-product-img">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?= get_the_post_thumbnail_url(get_the_id()) ?>" alt="">
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
            <a href="#"><i class="far fa-heart"></i></a>
        </div>
    </div>


<?php

