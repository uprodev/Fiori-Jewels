<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
global $loop;

$image = get_the_post_thumbnail_url(get_the_id(), 'large')  ?: wc_placeholder_img_src();

switch ($loop) :
    case 8 :
        $class = 'flex-bottom item-075';
        break;

    case 9 :
        $class = ' pt-110 item-075';
        break;

    case 10 :
        $class = 'item-4x item-black';
        break;

    case 18 :
        $class = 'item-w2x';
        break;

    case 21  :
        $class = 'item-4x';
        break;

    case 22  :
        $class = 'flex-bottom item-075-revers';
        break;

    case 23  :
        $class = 'pt-110 item-075-revers';
        break;

    default:
        $class = '';
endswitch;
?>

<div class="<?= $class ?> item">
    <div class="product-item-button product-big-item">
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= $image ?>" alt="">
            </a>
        </figure>
        <div class="text-wrap">
            <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>
            <p class="cost"><?= $product->get_price_html() ?></p>
            <div class="like-wrap">
                <a href="#"><i class="far fa-heart"></i></a>
            </div>
        </div>
        <div class="wrap-hover">
            <div class="btn-wrap">
                <?php woocommerce_template_loop_add_to_cart() ?>
            </div>
        </div>
    </div>
</div>

<?php if (in_array($loop, [4, 13, 20])) { ?>
    <div class="item item-empty"></div>
<?php } ?>



