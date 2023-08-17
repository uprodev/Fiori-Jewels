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
                    <a href="#reviews" class="scroll-to">(14)</a>
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
                <form action="#">
                    <div class="metal-wrap item">
                        <h6><b>Metal:</b>18K White Gold</h6>
                        <div class="select-wrap">
                            <div class="input-wrap">
                                <input type="radio" name="select-1" id="select-1-1" checked>
                                <label for="select-1-1"><img src="<?= get_template_directory_uri() ?>/img/icon-26-1.png" alt=""></label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-1" id="select-1-2">
                                <label for="select-1-2"><img src="<?= get_template_directory_uri() ?>/img/icon-26-2.png" alt=""></label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-1" id="select-1-3">
                                <label for="select-1-3"><img src="<?= get_template_directory_uri() ?>/img/icon-26-3.png" alt=""></label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-1" id="select-1-4">
                                <label for="select-1-4"><img src="<?= get_template_directory_uri() ?>/img/icon-26-4.png" alt=""></label>
                            </div>
                        </div>
                    </div>

                    <div class="carat-wrap item">
                        <h6><b>Total Carat Weight:</b>1/4 ct. tw</h6>
                        <div class="select-wrap">
                            <div class="input-wrap">
                                <input type="radio" name="select-2" id="select-2-1" checked>
                                <label for="select-2-1">1/10</label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-2" id="select-2-2" >
                                <label for="select-2-2">1/6</label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-2" id="select-2-3" >
                                <label for="select-2-3">1/4</label>
                            </div>
                            <div class="input-wrap">
                                <input type="radio" name="select-2" id="select-2-4" >
                                <label for="select-2-4">1/3</label>
                            </div>
                        </div>
                    </div>

                    <div class="size-wrap">
                        <label class="form-label" for="select-3-1"></label>
                        <select id="select-3-1">
                            <option value="0" >12</option>
                            <option value="1">14</option>
                            <option value="2">16</option>
                            <option value="3">18</option>
                        </select>
                        <p class="mob-size"><a href="#">Size guide</a></p>
                    </div>
                    <div class="btn-wrap like-wrap">
                        <button type="submit" class="btn-default">ADD TO BAG</button>
                        <a href="#" class=""><i class="far fa-heart"></i></a>
                    </div>

                    <div class="delivery-wrap">
                        <p><span><img src="<?= get_template_directory_uri() ?>/img/icon-27-1.svg" alt=""></span>Free shipping worldwide</p>
                        <p><span><img src="<?= get_template_directory_uri() ?>/img/icon-27-2.svg" alt=""></span>Order now and your order ships by Friday, March 3 </p>
                    </div>

                    <div class="details details-text">
                        <h6>Details</h6>
                        <div class="content-details">
                            <div>
                                <?php the_content() ?>

                            </div>
                        </div>
                    </div>
                    <div class="details details-mob-reviews">
                        <h6>REviews</h6>
                        <div class="content-details">
                            <div>
                                <p class="no-login">Also want to leave a comment? <a href="#">Log In</a></p>
                                <p class="login"><a href="#add-reviews" class="fancybox">Write a view <img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt=""></a></p>
                                <div class="total">
                                    <div class="total-left">
                                        <div class="top-wrap">
                                            <div class="big">4.5</div>
                                        </div>
                                        <div class="stars-wrap">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                        </div>
                                        <p>(14 reviews)</p>
                                    </div>

                                    <div class="sort">
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
                                    </div>
                                </div>

                                <div class="mob-reviews">
                                    <div class="item">
                                        <div class="name-line">
                                            <h6>Katie</h6>
                                            <p>March 24, 2023</p>
                                        </div>
                                        <div class="stars-wrap">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                        </div>
                                        <div class="text-wrap">
                                            <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="name-line">
                                            <h6>Katie</h6>
                                            <p>March 24, 2023</p>
                                        </div>
                                        <div class="stars-wrap">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                        </div>
                                        <div class="text-wrap">
                                            <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="name-line">
                                            <h6>Katie</h6>
                                            <p>March 24, 2023</p>
                                        </div>
                                        <div class="stars-wrap">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                                        </div>
                                        <div class="text-wrap">
                                            <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                                        </div>
                                    </div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-default btn-border">LOAD MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php woocommerce_output_related_products() ?>


                </form>

            </div>
        </div>
    </section>

    <section class="add-reviews">
        <div class="content-width">
            <h3>Write a view</h3>
            <form action="#" class="form-default form-flex">
                <div class="input-wrap input-wrap-50">
                    <label for="name">YOUR NAME</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="input-wrap input-wrap-50">
                    <label for="email-1">YOUR EMAIL</label>
                    <input type="email" name="email" id="email-1" placeholder="Email">
                </div>

                <div class="input-wrap-50">
                    <div class="input-wrap ">
                        <label for="city">WHERE DO YOU LIVE?</label>
                        <input type="email" name="city" id="city" placeholder="City,Country">
                    </div>
                    <div class="flex">
                        <div class="input-wrap-check">
                            <h6>CHOOSE YOUR AGE</h6>
                            <div class="wrap">
                                <input type="radio" name="select-1" id="select-1">
                                <label for="select-1">18-25</label>
                            </div>
                            <div class="wrap">
                                <input type="radio" name="select-1" id="select-2">
                                <label for="select-2">35-45</label>
                            </div>
                            <div class="wrap">
                                <input type="radio" name="select-1" id="select-3">
                                <label for="select-3">25-35</label>
                            </div>
                            <div class="wrap">
                                <input type="radio" name="select-1" id="select-4">
                                <label for="select-4">>45</label>
                            </div>
                        </div>
                        <div class="select-stars">
                            <h6>LEAVE YOUR SCORE</h6>
                            <div class="star">
                                <input type="radio" name="stars-1" id="stars-1">
                                <label for="stars-1"><img src="<?= get_template_directory_uri() ?>/img/star-grey.png" alt=""></label>
                            </div>
                            <div class="star">
                                <input type="radio" name="stars-1" id="stars-2">
                                <label for="stars-2"><img src="<?= get_template_directory_uri() ?>/img/star-grey.png" alt=""></label>
                            </div>
                            <div class="star">
                                <input type="radio" name="stars-1" id="stars-3">
                                <label for="stars-3"><img src="<?= get_template_directory_uri() ?>/img/star-grey.png" alt=""></label>
                            </div>
                            <div class="star">
                                <input type="radio" name="stars-1" id="stars-4">
                                <label for="stars-4"><img src="<?= get_template_directory_uri() ?>/img/star-grey.png" alt=""></label>
                            </div>
                            <div class="star">
                                <input type="radio" name="stars-1" id="stars-5">
                                <label for="stars-5"><img src="<?= get_template_directory_uri() ?>/img/star-grey.png" alt=""></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-wrap input-wrap-50">
                    <label for="message">YOUR VIEW</label>
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                </div>
                <div class="input-wrap-submit">
                    <button type="submit" class="btn-default
">DONE</button>
                </div>
            </form>
        </div>
    </section>


    <section class="testimonials" id="reviews">
        <div class="content-width">
            <div class="top">
                <h2>WHY PEOPLE <b>LOVE US</b></h2>
                <div class="info">
                    <p>Also want to leave a comment? <a href="#">Log In</a></p>
                </div>
            </div>
            <div class="info-block">
                <div class="total">
                    <div class="top-wrap">
                        <div class="big">4.5</div>
                        <p>(14 reviews)</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                </div>
                <div class="sort">
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
                </div>
            </div>
            <div class="content">
                <div class="item">
                    <div class="name-line">
                        <h6>Katie</h6>
                        <p>March 24, 2023</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                    <div class="text-wrap">
                        <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                    </div>
                </div>
                <div class="item">
                    <div class="name-line">
                        <h6>Katie</h6>
                        <p>March 24, 2023</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                    <div class="text-wrap">
                        <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                    </div>
                </div>
                <div class="item">
                    <div class="name-line">
                        <h6>Katie</h6>
                        <p>March 24, 2023</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                    <div class="text-wrap">
                        <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                    </div>
                </div>
                <div class="item">
                    <div class="name-line">
                        <h6>Katie</h6>
                        <p>March 24, 2023</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                    <div class="text-wrap">
                        <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                    </div>
                </div>
                <div class="item">
                    <div class="name-line">
                        <h6>Katie</h6>
                        <p>March 24, 2023</p>
                    </div>
                    <div class="stars-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25.svg" alt="">
                    </div>
                    <div class="text-wrap">
                        <p>I can't believe how beautiful this ring is! The diamonds sparkle so brightly that I can't take my eyes off of them. I feel so happy and special, but at the same time, the ring doesn't seem overly luxurious or bulky. It's just the perfect combination of elegance and brilliance!</p>
                    </div>
                </div>
            </div>
            <div class="btn-wrap">
                <a href="#" class="btn-default btn-border">LOAD MORE</a>
            </div>
        </div>
    </section>





<?php do_action( 'woocommerce_after_single_product' ); ?>
