<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<section class="shopping checkout">
    <div class="content-width">
        <div class="steps-wrap">
            <ul>
                <li class="is-active is-complete">
                    <p>CART</p>
                </li>
                <li class="is-active">
                    <p>SHIPPING</p>
                </li>
                <li>
                    <p>PAYMENT</p>
                </li>
            </ul>
        </div>

        <div class="mob-change-block">
            <h6><span>HIDE ORDER SUMMARY</span> <span>SHOW ORDER SUMMARY</span></h6>

        </div>
        <form name="checkout" method="post" action="#" class="form-default checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
            <div class="checkout-content">
                <div class="left">

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

                        <div class="checkout-item">
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
                            <div class="text-wrap">
                                <div class="info">
                                    <h6><?= $_product->get_name() ?></h6>
                                </div>
                                <div class="cost">
                                    <p><?php
                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?></p>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    <?php } ?>

                    <?php if ( wc_coupons_enabled() ) { ?>

                        <div class="apply-code">
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                            <label for="code"></label>
                            <input type="text" name="code" id="code" placeholder="Gift card or discount code">
                            <button type="submit" name="apply_coupon_chekout"  value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" class="btn-default">APPLY</button>
                        </div>
                    <?php } ?>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>




                </div>
                <div class="right">
                    <div class="item-border">
                        <h6>EXPRESS CHECKOUT</h6>
                        <div class="item-border-content">
                            <a href="#" class="btn-default"><img src="<?= get_template_directory_uri() ?>/img/icon-29-1.svg" alt=""></a>
                            <a href="#" class="btn-default"><img src="<?= get_template_directory_uri() ?>/img/icon-29-2.svg" alt=""></a>
                            <a href="#" class="btn-default btn-yellow"><img src="<?= get_template_directory_uri() ?>/img/icon-29-3.svg" alt=""></a>
                            <a href="#" class="btn-default"><img src="<?= get_template_directory_uri() ?>/img/icon-29-4.svg" alt=""></a>
                        </div>
                    </div>

                    <div class="mob-wrap">
                        <div class="or">
                            <p>or</p>
                        </div>

                        <?php if (!is_user_logged_in()) { ?>
                        <p class="no-login">Already have an account? <a href="/login/">Log In</a></p>
                        <?php } ?>

                        <?php do_action('woocommerce_login_placement') ?>

                        <div class="item-info-checkout label-block">

                            <h6>Billing information</h6>
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>

                            <h6>Shipping information</h6>
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                        </div>


                        <div class="delivery-block">
                            <h6>DELIVERY</h6>

                            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                            <?php wc_cart_totals_shipping_html(); ?>

                            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

                        </div>

                        <div class="pay-method">
                            <h6>Payment Method</h6>
                            <?php do_action('woocommerce_payment_placement') ?>
                        </div>


                        <div class="total-btn">
                            <a href="#" class="link"><i class="fas fa-chevron-left"></i>Back to Cart</a>
                            <button type="submit" class="btn-default">NEXT STEP</button>
                        </div>

                    </div>


                </div>
            </div>
        </form>
    </div>
</section>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
