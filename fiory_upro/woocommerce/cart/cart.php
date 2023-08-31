<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>


<section class="shopping">
    <div class="content-width">
        <div class="steps-wrap">
            <ul>
                <li class="is-active">
                    <p>CART</p>
                </li>
                <li>
                    <p>SHIPPING</p>
                </li>
                <li>
                    <p>PAYMENT</p>
                </li>
            </ul>
        </div>
        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <div class="content">
                <div class="title">
                    <div class="data data-1">
                        <p>PRODUCT</p>
                    </div>
                    <div class="data data-2">
                        <p>QUANITY</p>
                    </div>
                    <div class="data data-3">
                        <p>PRICE</p>
                    </div>
                </div>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    /**
                     * Filter the product name.
                     *
                     * @since 2.1.0
                     * @param string $product_name Name of the product in the cart.
                     * @param array $cart_item The product in the cart.
                     * @param string $cart_item_key Key for the product in the cart.
                     */
                    $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>

                        <div class="item">
                            <figure>
                                <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail; // PHPCS: XSS ok.
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                }
                                ?>
                            </figure>
                            <div class="text">
                                <h6><a href="<?= $product_permalink ?>"><?= $_product->get_name() ?></a></h6>
                                <?php
                                do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                                echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok
                                //
                                 ?>
                            </div>
                            <div class="col-wrap">
                                <div class="input-number ">
                                    <div class="btn-count btn-count-plus"><i class="fa fa-plus"></i></div>
                                    <input  type="text" name="<?= "cart[{$cart_item_key}][qty]" ?>" value="<?= $cart_item['quantity'] ?>" class="form-control qty"/>
                                    <div class="btn-count btn-count-minus"><i class="fa fa-minus"></i></div>
                                </div>
                            </div>
                            <div class="price-wrap">
                                <p><?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                    ?>
                                </p>
                            </div>
                            <div class="bottom delete-item">
        <!--                        <a href="#"><img src="--><?//= get_template_directory_uri() ?><!--/img/icon-28-1.svg" alt=""></a>-->
                                <a data-hash="<?= $cart_item_key ?>" href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-28-2.svg" alt="">Delete</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>

            </div>



                <?php
                /**
                 * Cart collaterals hook.
                 *
                 * @hooked woocommerce_cross_sell_display
                 * @hooked woocommerce_cart_totals - 10
                 */
                do_action( 'woocommerce_cart_collaterals' );
                ?>



        </form>
    </div>
</section>


<?php do_action( 'woocommerce_after_cart' ); ?>
