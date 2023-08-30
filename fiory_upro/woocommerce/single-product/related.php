<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) { ?>

    <div class="details details-slider">
        <h6>Complete the look</h6>

        <div class="content-details">
            <div>
                <div class="swiper slider-inner-product">
                    <div class="swiper-wrapper">
                        <?php foreach ( $related_products as $related_product ) {
                            $product = new WC_Product($related_product);
                            $default_attributes = $product->get_default_attributes();
                            if ($product->is_type( 'variable' )) {
                                $product = new WC_Product_Variable($related_product);
                                foreach ($product->get_available_variations() as $variation_values) {
                                    foreach ($variation_values['attributes'] as $key => $attribute_value) {
                                        $attribute_name = str_replace('attribute_', '', $key);
                                        $default_value = $product->get_variation_default_attribute($attribute_name);
                                        if ($default_value == $attribute_value) {
                                            $is_default_variation = true;
                                        } else {
                                            $is_default_variation = false;
                                            break;
                                        }
                                    }
                                    if ($is_default_variation) {
                                        $variation_id = $variation_values['variation_id'];
                                        break;
                                    }
                                }
                            }
                            ?>
                            <div class="swiper-slide">
                                <div class="product-item-button ">
                                    <figure>
                                        <a href="<?= $product->get_permalink() ?>">
                                            <?= $product->get_image() ?>
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>
                                        <p class="cost"><?= $product->get_price_html() ?></p>

                                    </div>
                                    <div class="wrap-hover">
                                        <div class="btn-wrap">
                                            <?php woocommerce_template_loop_add_to_cart()  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>

                <div class="nav-wrap">
                    <div class="swiper-button-next inner-product-next">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt="">
                    </div>
                    <div class="swiper-button-prev inner-product-prev">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-10-1.svg" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

 <?php }
wp_reset_postdata();
