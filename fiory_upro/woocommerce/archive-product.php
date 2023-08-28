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
                    <h1>Engagement Rings</h1>
                    <p> They are crafted from the most beautiful and precious materials to reflect your mutual feelings</p>
                </div>
                <div class="filter-line">
                    <div class="wrap wrap-1">
                        <a href="#" class="filter-btn">FILTERS <span></span></a>
                    </div>
                    <div class="wrap wrap-2">
                        <div class="nice-select">
                            <b>SORT BY:</b>
                            <span class="current">All</span>
                            <ul class="list">
                                <li class="option selected">All</li>
                                <li class="option ">New arrivals</li>
                                <li class="option">New to old </li>
                                <li class="option">Old to new</li>
                                <li class="option">Low to high </li>
                                <li class="option">High to low </li>
                            </ul>
                        </div>
                        <a href="#sort-popup" class="mob-fancybox fancybox">SORT BY:<span class="current">All</span></a>
                    </div>
                    <div class="filter-block">
                        <form action="#" class="form-default">
                            <div class="filter-wrap">
                                <div class="close-wrap">
                                    <a href="#" class="close-filter-block"><img src="<?= get_template_directory_uri() ?>/img/close-small.svg" alt=""></a>
                                </div>
                                <div class="filter-item">
                                    <h6>BY STYLE</h6>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-1" id="check-20-1">
                                        <label for="check-20-1">Solitaire</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-2" id="check-20-2">
                                        <label for="check-20-2">Halo </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-3" id="check-20-3">
                                        <label for="check-20-3">Three Stone </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-4" id="check-20-4">
                                        <label for="check-20-4">Hidden Halo </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-5" id="check-20-5">
                                        <label for="check-20-5">Two Stone </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-6" id="check-20-6">
                                        <label for="check-20-6">Accents</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-20-7" id="check-20-7">
                                        <label for="check-20-7">Cathedral</label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <h6>BY SHAPE</h6>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-1" id="check-21-1">
                                        <label for="check-21-1"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-1.svg" alt=""></span>Round</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-2" id="check-21-2">
                                        <label for="check-21-2"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-2.svg" alt=""></span>Oval </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-3" id="check-21-3">
                                        <label for="check-21-3"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-3.svg" alt=""></span>Pear  </label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-4" id="check-21-4">
                                        <label for="check-21-4"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-4.svg" alt=""></span>Heart</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-5" id="check-21-5">
                                        <label for="check-21-5"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-5.svg" alt=""></span>Marquise</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-6" id="check-21-6">
                                        <label for="check-21-6"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-6.svg" alt=""></span>Princess</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-7" id="check-21-7">
                                        <label for="check-21-7"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-7.svg" alt=""></span>Cushion</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-8" id="check-21-8">
                                        <label for="check-21-8"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-8.svg" alt=""></span>Emerland</label>
                                    </div>
                                    <div class="input-wrap-check">
                                        <input type="checkbox" name="check-21-9" id="check-21-9">
                                        <label for="check-21-9"><span><img src="<?= get_template_directory_uri() ?>/img/filter-1-9.svg" alt=""></span>Modified Emerland</label>
                                    </div>
                                </div>
                                <div class="filter-item">
                                    <h6>METAL</h6>
                                    <div class="input-wrap-check input-wrap-color">
                                        <input type="checkbox" name="check-22-1" id="check-22-1">
                                        <label for="check-22-1"><img src="<?= get_template_directory_uri() ?>/img/icon-20-1.svg" alt="">White Gold </label>
                                    </div>
                                    <div class="input-wrap-check input-wrap-color">
                                        <input type="checkbox" name="check-22-2" id="check-22-2">
                                        <label for="check-22-2"><img src="<?= get_template_directory_uri() ?>/img/icon-20-2.svg" alt="">Yellow Gold</label>
                                    </div>
                                    <div class="input-wrap-check input-wrap-color">
                                        <input type="checkbox" name="check-22-3" id="check-22-3">
                                        <label for="check-22-3"><img src="<?= get_template_directory_uri() ?>/img/icon-20-3.svg" alt="">Platinum </label>
                                    </div>
                                    <div class="input-wrap-check input-wrap-color">
                                        <input type="checkbox" name="check-22-4" id="check-22-4">
                                        <label for="check-22-4"><img src="<?= get_template_directory_uri() ?>/img/icon-20-4.svg" alt="">Rose Gold </label>
                                    </div>
                                </div>
                                <div class="filter-item filter-item-price">
                                    <h6>PRICE</h6>
                                    <div class="range-slider">
                                        <label for="range2"></label>
                                        <input type="text" class="js-range-slider-2" value="" id="range2"/>
                                    </div>
                                    <div class="wrap range-info">
                                        <div>
                                            <label for="from2">from</label>
                                            <input type="text" value="300" class="inp js-from-2 money" id="from2" />
                                        </div>

                                        <div>
                                            <label for="to2">to</label>
                                            <input type="text" value="2430000" class="inp js-to-2 money" id="to2"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrap">
                                    <button type="reset" class="btn-default btn-border">CLEAR ALL</button>
                                    <button type="submit" class="btn-default">APPLY</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="share-line">
                    <h6>SHAPE</h6>
                    <div class="wrap">
                        <form action="#" class="form">
                            <ul>
                                <li>
                                    <input type="checkbox" name="shape-1" id="shape-1">
                                    <label for="shape-1"><img src="<?= get_template_directory_uri() ?>/img/filter-1-1.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-2" id="shape-2">
                                    <label for="shape-2"><img src="<?= get_template_directory_uri() ?>/img/filter-1-2.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-3" id="shape-3">
                                    <label for="shape-3"><img src="<?= get_template_directory_uri() ?>/img/filter-1-3.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-4" id="shape-4">
                                    <label for="shape-4"><img src="<?= get_template_directory_uri() ?>/img/filter-1-4.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-5" id="shape-5">
                                    <label for="shape-5"><img src="<?= get_template_directory_uri() ?>/img/filter-1-5.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-6" id="shape-6">
                                    <label for="shape-6"><img src="<?= get_template_directory_uri() ?>/img/filter-1-6.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-7" id="shape-7">
                                    <label for="shape-7"><img src="<?= get_template_directory_uri() ?>/img/filter-1-7.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-8" id="shape-8">
                                    <label for="shape-8"><img src="<?= get_template_directory_uri() ?>/img/filter-1-8.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-9" id="shape-9">
                                    <label for="shape-9"><img src="<?= get_template_directory_uri() ?>/img/filter-1-9.svg" alt=""></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="shape-10" id="shape-10">
                                    <label for="shape-10"><img src="<?= get_template_directory_uri() ?>/img/filter-1-10.svg" alt=""></label>
                                </li>
                            </ul>
                        </form>

                    </div>
                </div>
                <div class="content-product content-product-main">
                    <?php

                    if (woocommerce_product_loop()) {
                        while (have_posts()) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action('woocommerce_shop_loop');

                            wc_get_template_part('content', 'product');
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
                        <a href="#" class="more-link">MORE..</a>
                    </div>
                    <div class="nav">
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-10-1.svg" alt=""></a>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php


get_footer( 'shop' );
