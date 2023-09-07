<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

    <?php //woocommerce_breadcrumb(); ?>

    <section class="catalog-product">
        <div class="content-width">
            <div class="content">
                <div class="top">
                    <h1><?php woocommerce_page_title(); ?></h1>
                    <p><?php woocommerce_product_archive_description() ?></p>
                </div>
                <div class="filter-line">
                    <div class="wrap wrap-1">
                        <a href="#" class="filter-btn">FILTERS <span></span></a>
                    </div>
                    <div class="wrap wrap-2">
                        <div class="nice-select0">

                            <?php woocommerce_catalog_ordering() ?>
<!--                            <span class="current">All</span>-->
<!--                            <ul class="list">-->
<!--                                <li class="option selected">All</li>-->
<!--                                <li class="option ">New arrivals</li>-->
<!--                                <li class="option">New to old </li>-->
<!--                                <li class="option">Old to new</li>-->
<!--                                <li class="option">Low to high </li>-->
<!--                                <li class="option">High to low </li>-->
<!--                            </ul>-->
                        </div>
<!--                        <a href="#sort-popup" class="mob-fancybox fancybox">SORT BY:<span class="current">All</span></a>-->
                    </div>
                    <div class="filter-block">
                        <div action="#" class="form-default">
                            <div class="filter-wrap">
                                <div class="close-wrap">
                                    <a href="#" class="close-filter-block"><img src="<?= get_template_directory_uri() ?>/img/close-small.svg" alt=""></a>
                                </div>

                                <?= do_shortcode('[br_filters_group group_id=13686]') ?>

                                <div class="btn-wrap">

                                    <?= do_shortcode('[br_filter_single filter_id=17423]') ?>
                                    <?= do_shortcode('[br_filter_single filter_id=17420]') ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="share-line">

                    <div class="wrap">
                        <div action="#" class="form">
                            <?php global $shape; $shape = 1 ?>
                            <?= do_shortcode('[br_filter_single filter_id=17421]') ?>
                        </div>

                    </div>
                </div>
                <div class="content-product content-product-main">
                    <?php

                    global $loop;
                    if (woocommerce_product_loop()) {
                        while (have_posts()) {
                            the_post();
                            $loop++;

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action('woocommerce_shop_loop');

                            wc_get_template_part('content', 'product', ['loop' => $loop]);
                        }
                    }  else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action( 'woocommerce_no_products_found' );
                    }
                    ?>
                </div>
                <div class="pagination-wrap">
                    <div class="more">
                       <?php woocommerce_pagination() ?>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php


get_footer(   );
