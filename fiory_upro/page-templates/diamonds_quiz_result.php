<?php
/*
Template Name: Diamonds quiz result
*/
?>

<?php
if ($_GET['price']) {
    $curr = get_woocommerce_currency();
    $price = explode('-', $_GET['price']);

    if ($curr == 'AED') {
        $price[0] = $price[0] / 0.27;
        $price[1] = $price[1] / 0.27;
    }



    $q = new WP_Query([
        'post_type' => 'product',
        'post_status' => 'publish',
        //'pa_shape' => $_GET['pa_shape'],
        'posts_per_page' => 3,
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'pa_shape',
                'include_children' => true,
                'operator' => 'IN',
                'terms' => $_GET['pa_shape'],
                'field' => 'slug',
            ],
            [
                'taxonomy' => 'pa_cut',
                'include_children' => true,
                'operator' => 'IN',
                'terms' => $_GET['pa_cut'],
                'field' => 'slug',
            ]

        ],
        'meta_query' => [
            [
                'key' => '_price',
                'value' => [(int)$price[0], (int)$price[1]],
                'compare' => 'BETWEEN',
                'type' => 'numeric'
            ]
        ]
    ]);
}
?>


<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-complete">
	<div class="content-width">
        <?php if ($_GET['price'] && $q->have_posts()) { ?>
            <h2>Here are your results <b>the best diamonds according to your taste</b></h2>
            <div class="content-wrap">
                <div class="content">


                    <?php while ($q->have_posts()) {
                        $q->the_post();
                        $product = new WC_Product(get_the_id())?>
                        <div class="item">
                            <figure>

                                    <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'large') ?>" alt="">

                            </figure>
                            <div class="info">
                                <ul>
                                    <?php
                                    $taxonomies = [
                                        'pa_cut', 'pa_clarity', 'pa_color', 'pa_carat'
                                    ];

                                    foreach ($taxonomies as $tax) {
                                        $taxonomy = get_taxonomy($tax);
                                        $terms = get_the_terms(get_the_id(), $tax);
                                        if (empty($terms))
                                            continue;

                                    ?>

                                    <li>
                                        <p><?= str_replace('Product ', '', $taxonomy->label) ?> </p>
                                        <p><b><?= $terms[0]->name ?></b></p>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="cost">
                                <p><?= $product->get_price_html() ?></p>
                            </div>
                            <div class="btn-wrap">
                                <a href="<?= $product->get_permalink() ?>" class="btn-default">SELECT</a>
                            </div>
                            <div class="link">
                                <a href="<?= $product->get_permalink() ?>">More diamond details</a>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
            <div class="bottom">
                <a href="#" class="link-img">Retake the quiz <img src="<?= get_template_directory_uri() ?>/img/arrow.svg" alt=""></a>
                <p>OR</p>
                <a href="#" class="cursive">Speak to diamond expert</a>
            </div>
        <?php } ?>
	</div>
</section>

<section class="catalog ">
	<div class="content-width">
		<div class="content">
			<div class="filter-wrap">
				<div action="#" id="filter-quiz">
					<div class="filter-item filter-item-1">

                        <?= do_shortcode('[br_filters_group group_id=17543]') ?>


					</div>

				</div>
			</div>
			<div class="content-wrap">
				<div class="top">
					<h1>All diamonds</h1>
                    <div style="display: none !important;">
                    <form class="woocommerce-ordering" method="get" >
                        <select name="orderby" class="orderby" aria-label="Shop order" style="display: none;">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                            <option value="pa_cut">Sort by cut DESC</option>

                        </select>
                        <input type="hidden" name="paged" value="<?= get_query_var('paged') ?>">

                    </form>
                    </div>
				</div>

				<div class="filter-line">
					<a href="#filter-popup" class="fancybox open-filter">FILTERS</a>
					<a href="#sort-popup" class="fancybox open-sort">SORT BY: <span>All</span></a>
				</div>
				<div class="scroll-line">
					<h6>SHAPE</h6>
					<div class="wrap">
						<ul>
							<li>
								<input type="checkbox" name="filter-1-1" id="filter-1-1">
								<label for="filter-1-1"><img src="<?= get_template_directory_uri() ?>/img/filter-1-1.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-2" id="filter-1-2">
								<label for="filter-1-2"><img src="<?= get_template_directory_uri() ?>/img/filter-1-2.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-3" id="filter-1-3">
								<label for="filter-1-3"><img src="<?= get_template_directory_uri() ?>/img/filter-1-3.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-4" id="filter-1-4">
								<label for="filter-1-4"><img src="<?= get_template_directory_uri() ?>/img/filter-1-4.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-5" id="filter-1-5">
								<label for="filter-1-5"><img src="<?= get_template_directory_uri() ?>/img/filter-1-5.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-6" id="filter-1-6">
								<label for="filter-1-6"><img src="<?= get_template_directory_uri() ?>/img/filter-1-6.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-7" id="filter-1-7">
								<label for="filter-1-7"><img src="<?= get_template_directory_uri() ?>/img/filter-1-7.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-8" id="filter-1-8">
								<label for="filter-1-8"><img src="<?= get_template_directory_uri() ?>/img/filter-1-8.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-9" id="filter-1-9">
								<label for="filter-1-9"><img src="<?= get_template_directory_uri() ?>/img/filter-1-9.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-10" id="filter-1-10">
								<label for="filter-1-10"><img src="<?= get_template_directory_uri() ?>/img/filter-1-10.svg" alt=""></label>
							</li>
						</ul>
					</div>
				</div>

				<div class="table-wrap">
					<form class="table-row table-head quiz-ordering">
                        <input type="hidden" name="paged" value="1">
                        <input type="hidden" name="filters" value="price[7821_18180]">
						<div class="col col-1">
							<p>SHAPE</p>
						</div>
						<div class="col col-2">
                            <p>CARAT</p>

						</div>
						<div class="col col-3">
                            <p>CLARITY</p>

						</div>
						<div class="col col-4">
                            <p>COLOR</p>

						</div>
						<div class="col col-5">
                            <p>CUT</p>

						</div>
						<div class="col col-6">
							<input <?php checked('price-desc', $_GET['orderby']) ?> type="checkbox" name="orderby" value="price" id="selectCol-6">
							<label for="selectCol-6">PRICE</label>
						</div>
						<div class="col col-7"></div>
					</form>


					<div class="table-row content-product-main">

                        <?php


                            $meta_query = array(

                                'price' => array(
                                    'key' => '_price',
                                ),

                            )
                           ;
                            $orderby =   'meta_value_num';
                            $order =    $_GET['orderby'] == 'price-desc' ? 'ASC' : 'DESC';




                        $args =  [
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => 20,
                            'product_cat' => 'loose-diamonds',
                            'paged' => get_query_var('paged'),
                            'tax_query' => [
                                'relation' => 'AND',
                                [
                                    'taxonomy' => 'pa_shape',
                                    'operator' => 'EXISTS',

                                ],
                                [
                                    'taxonomy' => 'pa_cut',
                                    'operator' => 'EXISTS',
                                ]

                            ],
                            'meta_query' => $meta_query,
                            'orderby' => $orderby,
                            'order' => $order,

                        ];



                        $args = berocket_filter_query_vars_hook($args);

                        $wp_query = new WP_query($args);

                        while ($wp_query->have_posts()) {
                            $wp_query->the_post();
                            $loop++;
                            $image = get_the_post_thumbnail_url(get_the_id(), 'large')  ?: wc_placeholder_img_src();

                            ?>

                        <div class="product-line">
                            <div class="info">
                                <?php
                                $taxonomies = [
                                   'pa_shape', 'pa_carat', 'pa_clarity', 'pa_color', 'pa_cut',
                                ];
                                $i = 0;
                                foreach ($taxonomies as $tax) {
                                    $i++;
                                    $taxonomy = get_taxonomy($tax);
                                    $terms = get_the_terms(get_the_id(), $tax);

                                    ?>
                                    <div class="col col-<?= $i ?>"><?= $terms[0]->name ?></div>

                                <?php } ?>


                                <div class="col col-6"><?= $product->get_price_html() ?></div>
                                <div class="col col-7"><img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></div>
                            </div>
                            <div class="detail">
                                <div class="img-line">
                                    <figure>
                                        <img src="<?= $image ?>" alt="">
                                        <div class="like-wrap">
                                            <?= do_shortcode('[yith_wcwl_add_to_wishlist]') ?>
                                        </div>
                                    </figure>
                                    <div class="slider-wrap">
                                        <div class="swiper slider-p-3">
                                            <?php get_template_part('parts/hand'); ?>
                                        </div>
                                        <div class="scroll-wrap">
                                            <p>Lighter</p>
                                            <div class="swiper-scrollbar swiper-scrollbar-3"></div>
                                            <p>Darker</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>

                                    <?php
                                    $taxonomies = [
                                        'pa_cut', 'pa_color',  'pa_carat', 'pa_clarity', 'pa_certificate-number',
                                    ];
                                    $i = 0;
                                    foreach ($taxonomies as $tax) {
                                        $i++;
                                        $taxonomy = get_taxonomy($tax);
                                        $terms = get_the_terms(get_the_id(), $tax);

                                        ?>


                                        <li>
                                            <p><?= str_replace('Product ', '', $taxonomy->label) ?> <span><?= $terms[0]->name ?></span></p>
                                        </li>



                                    <?php } ?>



                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="link">Speak to diamond expert <img src="<?= get_template_directory_uri() ?>/img/icon-9.svg" alt=""></a>
                                    <a href="<?= $product->get_permalink() ?>" class="btn-default">SELECT</a>
                                </div>
                            </div>


                        </div>
                        <?php


                        }
                        ?>

                        <div class="pagination-wrap">
                            <div class="more">
                                <nav class="woocommerce-pagination">
                                    <?php

                                    $total   = $wp_query->max_num_pages;
                                    $current = get_query_var('paged');
                                    $base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
                                    $format  = isset( $format ) ? $format : '';

                                    echo paginate_links(
                                        apply_filters(
                                            'woocommerce_pagination_args',
                                            array( // WPCS: XSS ok.
                                                'base'      => $base,
                                                'format'    => $format,
                                                'add_args'  => false,
                                                'current'   => max( 1, $current ),
                                                'total'     => $total,
                                                'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                                                'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                                                'type'      => 'list',
                                                'end_size'  => 3,
                                                'mid_size'  => 3,
                                            )
                                        )
                                    );
                                    ?>
                                </nav>
                            </div>

                        </div>

					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
