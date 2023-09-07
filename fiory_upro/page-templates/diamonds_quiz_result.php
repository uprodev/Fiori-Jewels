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
        <?php if ($q->have_posts()) { ?>
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
				<form action="#">
					<div class="filter-item filter-item-1">
						<h6>SHAPE</h6>
						<div class="wrap">

                            <?php
                            $terms = get_terms( [
                                'taxonomy' => 'pa_shape',
                                'hide_empty' => 1,
                            ] );
                            ?>
                            <?php foreach ($terms as $index => $term) {

                                $field = get_field('icon', 'term_' . $term->term_id);
//                                if (!$field)
//                                    continue;
                                ?>

                                <div class="item">
                                    <input type="checkbox" name="select-1" id="select-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
                                    <label for="select-<?= $index + 1 ?>">

                                    <?php if ($field = get_field('icon', 'term_' . $term->term_id)) { ?>
                                        <?= wp_get_attachment_image($field['ID'], 'full') ?>
                                    <?php } else {

                                        echo $term->name;
                                    } ?>


                                    </label>
                                </div>
                            <?php } ?>

						</div>
					</div>
					<div class="filter-item filter-item-2">
						<h6>CARAT</h6>
						<div class="range-slider">
							<label for="range"></label>
							<input type="text" class="js-range-slider" value="" id="range"/>
						</div>
						<div class="wrap range-info">
							<div>
								<label for="from">from</label>
								<input type="text" value="0.05" class="inp js-from" id="from" />
							</div>
							<div>
								<label for="to">to</label>
								<input type="text" value="11" class="inp js-to" id="to"/>
							</div>
						</div>

					</div>
					<div class="filter-item filter-item-3">
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
					<div class="filter-item filter-item-4">
						<h6>CUT</h6>
						<div class="wrap">
							<div class="range-slider">
								<label for="range3"></label>
								<input type="text" class="js-range-slider-3" value="" id="range3"/>
							</div>
							<div class="label-range label-4">
								<div>
									<p>Excellent</p>
									<p>Ideal</p>
									<p>Ideal+Hearts</p>
								</div>
							</div>
						</div>

					</div>
					<div class="filter-item filter-item-5">
						<h6>CLARITY</h6>
						<div class="wrap">
							<div class="range-slider">
								<label for="range4"></label>
								<input type="text" class="js-range-slider-4" value="" id="range4"/>
							</div>
							<div class="label-range label-5">
								<div>
									<p>SI</p>
									<p>VS</p>
									<p>VVS</p>
								</div>
							</div>
						</div>

					</div>
					<div class="filter-item filter-item-6">
						<h6>COLOR</h6>
						<div class="wrap">
							<div class="range-slider">
								<label for="range5"></label>
								<input type="text" class="js-range-slider-5" value="" id="range5"/>
							</div>
							<div class="label-range label-6">
								<div>
									<p>Slight Color <br>(JKL)</p>
									<p>Near Colorless <br>(GHI)</p>
									<p>Colorless <br>(DEF)</p>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
			<div class="content-wrap">
				<div class="top">
					<h1>All diamonds</h1>
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
					<div class="table-row table-head">
						<div class="col col-1">
							<p>SHAPE</p>
						</div>
						<div class="col col-2">
							<input type="checkbox" name="selectCol-2" id="selectCol-2">
							<label for="selectCol-2">CARAT</label>
						</div>
						<div class="col col-3">
							<input type="checkbox" name="selectCol-3" id="selectCol-3">
							<label for="selectCol-3">CLARITY</label>
						</div>
						<div class="col col-4">
							<input type="checkbox" name="selectCol-4" id="selectCol-4">
							<label for="selectCol-4">COLOR</label>
						</div>
						<div class="col col-5">
							<input type="checkbox" name="selectCol-5" id="selectCol-5">
							<label for="selectCol-5">CUT</label>
						</div>
						<div class="col col-6">
							<input type="checkbox" name="selectCol-6" id="selectCol-6">
							<label for="selectCol-6">PRICE</label>
						</div>
						<div class="col col-7"></div>
					</div>

					<div class="table-row">
						<div class="product-line">
							<div class="info">
								<div class="col col-1">Round</div>
								<div class="col col-2">0.94</div>
								<div class="col col-3">VS2</div>
								<div class="col col-4">I</div>
								<div class="col col-5">Ideal</div>
								<div class="col col-6">$862</div>
								<div class="col col-7"><img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="<?= get_template_directory_uri() ?>/img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-1">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-1.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-2.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-3.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-5.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-4.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
											</div>
										</div>
										<div class="scroll-wrap">
											<p>Lighter</p>
											<div class="swiper-scrollbar swiper-scrollbar-1"></div>
											<p>Darker</p>
										</div>
									</div>
								</div>
								<ul>
									<li>
										<p>Cut: <span>Ideal</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="<?= get_template_directory_uri() ?>/img/icon-9.svg" alt=""></a>
									<a href="#" class="btn-default">SELECT</a>
								</div>
							</div>

						</div>
						<div class="product-line">
							<div class="info">
								<div class="col col-1">Round</div>
								<div class="col col-2">0.94</div>
								<div class="col col-3">VS2</div>
								<div class="col col-4">I</div>
								<div class="col col-5">Ideal</div>
								<div class="col col-6">$862</div>
								<div class="col col-7"><img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="<?= get_template_directory_uri() ?>/img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-2">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-1.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-2.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-3.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-5.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-4.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
											</div>
										</div>
										<div class="scroll-wrap">
											<p>Lighter</p>
											<div class="swiper-scrollbar swiper-scrollbar-2"></div>
											<p>Darker</p>
										</div>
									</div>
								</div>
								<ul>
									<li>
										<p>Cut: <span>Ideal</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="<?= get_template_directory_uri() ?>/img/icon-9.svg" alt=""></a>
									<a href="#" class="btn-default">SELECT</a>
								</div>
							</div>

						</div>
						<div class="product-line">
							<div class="info">
								<div class="col col-1">Round</div>
								<div class="col col-2">0.94</div>
								<div class="col col-3">VS2</div>
								<div class="col col-4">I</div>
								<div class="col col-5">Ideal</div>
								<div class="col col-6">$862</div>
								<div class="col col-7"><img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="<?= get_template_directory_uri() ?>/img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-3">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-1.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-2.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-3.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-5.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="<?= get_template_directory_uri() ?>/img/h-4.png" alt="">
													<div class="product-img">
														<img src="<?= get_template_directory_uri() ?>/img/p-1.svg" alt="">
													</div>
												</div>
											</div>
										</div>
										<div class="scroll-wrap">
											<p>Lighter</p>
											<div class="swiper-scrollbar swiper-scrollbar-3"></div>
											<p>Darker</p>
										</div>
									</div>
								</div>
								<ul>
									<li>
										<p>Cut: <span>Ideal</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="<?= get_template_directory_uri() ?>/img/icon-9.svg" alt=""></a>
									<a href="#" class="btn-default">SELECT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
