<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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



if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>



    <?php
    /**
     * Hook: woocommerce_before_single_product.
     *
     * @hooked woocommerce_output_all_notices - 10
     */
    do_action( 'woocommerce_before_single_product' );

    woocommerce_breadcrumb();

    ?>


    <section class="product-block">
        <div class="content-width">

            <?php woocommerce_show_product_thumbnails() ?>

            <div class="text">
                <?php woocommerce_template_single_title() ?>
                <div class="stars-wrap">
                    <div class="wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
<!--                    <a href="#reviews" class="scroll-to">(14)</a>-->
                </div>
                <div class="info">
                    <p><?= $product->get_short_description() ?></p>
                </div>
                <div class="cost-wrap">
                    <p class="cost">
                        <?= woocommerce_template_single_price() ?>
                    </p>
                    <p><a href="#">Size guide</a></p>
                </div>

                <?php woocommerce_template_single_add_to_cart() ?>
                <div action="#">




                    <div class="details details-text">
                        <h6>Details</h6>
                        <div class="content-details">
                            <div>
                                <?php the_content() ?>

                            </div>
                        </div>
                    </div>





                </div>

                <?php woocommerce_output_related_products() ?>

            </div>
        </div>
    </section>







<?php do_action( 'woocommerce_after_single_product' ); ?>
