<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="content-width mini-cart">
    <div class="product-wrap">
        <h5>YOUR BAG</h5>
        <?php if ( ! WC()->cart->is_empty() ) {  ?>
            <div class="grid">
                <?php
                do_action( 'woocommerce_before_mini_cart_contents' );

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    /**
                     * This filter is documented in woocommerce/templates/cart/cart.php.
                     *
                     * @since 2.1.0
                     */
                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
                    <div class="product-item-button">
                        <figure>
                            <div class="delete-like delete-item">
                                <a data-hash="<?= $cart_item_key ?>" href="#"><img src="<?= get_template_directory_uri() ?>/img/close-small.svg" alt=""></a>
                            </div>
                            <?php if ( empty( $product_permalink ) ) : ?>
                                <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                        </figure>
                        <div class="text-wrap">
                            <h6><a href="<?php echo esc_url( $product_permalink ); ?>"><?= $product_name ?></a></h6>
                            <p class="cost"><?= $product_price ?></p>
                        </div>

                    </div>
                    <?php } ?>
                <?php } ?>

            </div>
        <?php }  else { ?>
            <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
        <?php } ?>
    </div>
    <div class="cart-wrap">
        <div class="cart-content">
            <h5>ORDER SUMMARY</h5>
            <div class="info-cart">
                <p><span>QUANITY OF ITEMS</span> <span><?= WC()->cart->get_cart_contents_count() ?></span></p>
            </div>
        </div>
        <div class="total-cart">
            <h6><span>ORDER TOTAL</span> <span><?php wc_cart_totals_order_total_html(); ?></span></h6>
        </div>
        <div class="btn-wrap">
            <a href="<?php the_permalink(10) ?>" class="btn-default">CART</a>
        </div>
        <div class="or">
            <p><span>OR</span></p>
        </div>
        <div class="btn-wrap">
            <a href="<?php the_permalink(11) ?>" class="btn-default">CHECKOUT</a>
        </div>
    </div>
    <a href="#" class="close-like">
        <img src="<?= get_template_directory_uri() ?>/img/close-small.svg" alt="">
    </a>
</div>



