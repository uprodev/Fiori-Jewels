<?php $wl = new YITH_WCWL_Wishlist(1);



?>

<div class="  item-wishlist">
    <h2>WISHLIST</h2>
<!--    <div class="btn-top">-->
<!--        <a href="#friend" class="btn-default fancybox">SEND WISHLIST TO A FRIEND</a>-->
<!--    </div>-->
    <section class="shopping">
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

            <?php foreach  ($wl->get_items() as $item) {
                $product_id = $item['product_id'];
                $product = new WC_Product($product_id);
                ?>
                <div class="item buy">
                <figure>
                    <a href="<?= $product->get_permalink() ?>">
                        <img src="<?= get_the_post_thumbnail_url($product_id, 'large') ?>" alt="">
                    </a>
                </figure>
                <div class="text">
                    <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>


                </div>
                <div class="col-wrap">
                    <div class="input-number ">
                        <div class="btn-count btn-count-plus"><i class="fa fa-plus"></i></div>
                        <input type="text" name="count" value="<?= $item['quantity'] ?>" class="form-control">
                        <div class="btn-count btn-count-minus"><i class="fa fa-minus"></i></div>
                    </div>
                </div>
                <div class="price-wrap">
                    <p><?= $product->get_price_html() ?></p>
                </div>
                <div class="bottom">
                    <a href="#" class="link">Send to a friend <img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt=""></a>
                    <div class="btn-link-wrap">
                        <a class=" remove_from_wishlist" href="<?php echo esc_url( $item->get_remove_url() ); ?>"><img src="<?= get_template_directory_uri() ?>/img/icon-28-2.svg" alt="">Delete</a>
                        <a class="add-to-cart" data-product_id="<?= $product_id ?>" href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-28-3.svg" alt="">Add to bag</a>
                    </div>
                </div>
                <div class="btn-wrap-mob">
                    <a href="#" class="btn-default add-to-cart" data-product_id="<?= $product_id ?>">ADD TO BAG</a>

                    <a href="<?php echo esc_url( $item->get_remove_url() ); ?>" class="remove remove_from_wishlist btn-default btn-border" title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>">REMOVE</a>


                </div>
            </div>
            <?php } ?>
        </div>
<!--        <div class="friend-mob">-->
<!--            <p>Let your friends know!</p>-->
<!--            <a href="#friend" class="fancybox btn-default btn-border">SEND WISHLIST TO A FRIEND</a>-->
<!--        </div>-->
    </section>
</div>
