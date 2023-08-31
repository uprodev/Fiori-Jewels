<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>
    <h2>MY ORDERS</h2>


    <h6>orders information</h6>
			<?php
			foreach ( $customer_orders->orders as $customer_order ) {
				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
				?>


                <div class="order-item">
                    <div class="total-order">
                        <div class="data data-1">
                            <h5>ORDER NUMBER №<?= $order->get_id() ?></h5>
                            <p>From <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></p>
                        </div>
                        <div class="data data-2">
                            <h4>On <?= $order->get_formatted_order_total() ?></h4>
                            <p><?= sprintf( _n( '%1$s item', '%1$s items', $item_count, 'woocommerce' ), $item_count) ?></p>
                        </div>
                        <div class="data data-3">
                            <p class="order-done order-total-info"><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></p>
                        </div>
                    </div>
                    <div class="info-order">
                        <?php
                        foreach ( $order->get_items() as $item_id => $item ) {
				            $product = $item->get_product();
                        ?>
                        <div>
                            <figure>
                                <a href="<?= $product->get_permalink() ?>">
                                    <?= $product->get_image() ?>
                                </a>
                            </figure>
                            <div class="text">
                                <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>

                                <?php
                                foreach ( $item->get_all_formatted_meta_data() as $meta_id => $meta ) {
                                    ?>
                                    <p><?= ( $meta->display_key ) ?>: <span><?= strip_tags($meta->display_value) ?></span></p>
                                    <?php
                                } ?>
                            </div>
                            <div class="price-wrap">
                                <h6><?= $item->get_quantity() ?></h6>
                                <p><?= wc_price($item['total'])?></p>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="total-wrap">
                            <div class="total-line">
                                <p>SUBTOTAL</p>
                                <p><b><?= wc_price($order->get_subtotal()) ?></b></p>
                            </div>
                            <div class="total-line">
                                <p>SHIPPING </p>
                                <p><b><?= wc_price($order->get_shipping_total()) ?></b></p>
                            </div>
                            <div class="total-line">
                                <p>TAXES </p>
                                <p><b><?= wc_price($order->get_total_tax()) ?></b></p>
                            </div>
                            <div class="total-line">
                                <h6>ORDER TOTAL</h6>
                                <p><b><?= $order->get_formatted_order_total() ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>


				<?php
			}
			?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>



<?php else : ?>

	<?php wc_print_notice( esc_html__( 'No order has been made yet.', 'woocommerce' ) . ' <a class="woocommerce-Button button' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
