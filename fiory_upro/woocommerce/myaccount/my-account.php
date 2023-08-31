<?php


/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>



<div class="breadcrumb breadcrumb-mob">
    <div class="content-width">
        <ul>
            <li><a href="#">Home </a><span>/</span></li>
            <li><a href="#">MY ACCOUNT </a><span>/</span></li>
            <li><?=  WC()->query->get_current_endpoint();  ?></li>
        </ul>
    </div>
</div>

<section class="cabinet">
    <div class="content-width">



        <div class="tabs-flex">
            <div class="menu-wrap">
                <h1>MY ACCOUNT</h1>

                <?php
                do_action( 'woocommerce_account_navigation' ); ?>

            </div>
            <div class="tab-content">
                <div class="tab-item item-data">


                    <?php
                    /**
                     * My Account content.
                     *
                     * @since 2.6.0
                     */
                    do_action( 'woocommerce_account_content' );
                    ?>




                </div>

            </div>

        </div>
    </div>
</section>





