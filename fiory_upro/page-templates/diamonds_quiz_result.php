<?php
/*
Template Name: Diamonds quiz result
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-complete">
	<div class="content-width">
		<h2>Here are your results <b>the best diamonds according to your taste</b></h2>
		<div class="content-wrap">
			<div class="content">
				<div class="item">
					<figure>
						<img src="img/img-20.png" alt="">
					</figure>
					<div class="info">
						<ul>
							<li>
								<p>Cut </p>
								<p><b>Ideal</b></p>
							</li>
							<li>
								<p>Clarity</p>
								<p><b>VS2</b></p>
							</li>
							<li>
								<p>Color </p>
								<p><b>I</b></p>
							</li>
							<li>
								<p>Carat</p>
								<p><b>0.94</b></p>
							</li>
						</ul>
					</div>
					<div class="cost">
						<p>$1058</p>
					</div>
					<div class="btn-wrap">
						<a href="#" class="btn-default">SELECT</a>
					</div>
					<div class="link">
						<a href="#">More diamond details</a>
					</div>
				</div>
				<div class="item">
					<figure>
						<img src="img/img-20.png" alt="">
					</figure>
					<div class="info">
						<ul>
							<li>
								<p>Cut </p>
								<p><b>Ideal</b></p>
							</li>
							<li>
								<p>Clarity</p>
								<p><b>VS2</b></p>
							</li>
							<li>
								<p>Color </p>
								<p><b>I</b></p>
							</li>
							<li>
								<p>Carat</p>
								<p><b>0.94</b></p>
							</li>
						</ul>
					</div>
					<div class="cost">
						<p>$1058</p>
					</div>
					<div class="btn-wrap">
						<a href="#" class="btn-default">SELECT</a>
					</div>
					<div class="link">
						<a href="#">More diamond details</a>
					</div>
				</div>
				<div class="item">
					<figure>
						<img src="img/img-20.png" alt="">
					</figure>
					<div class="info">
						<ul>
							<li>
								<p>Cut </p>
								<p><b>Ideal</b></p>
							</li>
							<li>
								<p>Clarity</p>
								<p><b>VS2</b></p>
							</li>
							<li>
								<p>Color </p>
								<p><b>I</b></p>
							</li>
							<li>
								<p>Carat</p>
								<p><b>0.94</b></p>
							</li>
						</ul>
					</div>
					<div class="cost">
						<p>$1058</p>
					</div>
					<div class="btn-wrap">
						<a href="#" class="btn-default">SELECT</a>
					</div>
					<div class="link">
						<a href="#">More diamond details</a>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<a href="#" class="link-img">Retake the quiz <img src="img/arrow.svg" alt=""></a>
			<p>OR</p>
			<a href="#" class="cursive">Speak to diamond expert</a>
		</div>
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
							<div class="item">
								<input type="checkbox" name="select-1" id="select-1">
								<label for="select-1">
									<img src="img/filter-1-1.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-2" id="select-2">
								<label for="select-2">
									<img src="img/filter-1-2.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-3" id="select-3">
								<label for="select-3">
									<img src="img/filter-1-3.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-4" id="select-4">
								<label for="select-4">
									<img src="img/filter-1-4.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-5" id="select-5">
								<label for="select-5">
									<img src="img/filter-1-5.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-6" id="select-6">
								<label for="select-6">
									<img src="img/filter-1-6.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-7" id="select-7">
								<label for="select-7">
									<img src="img/filter-1-7.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-8" id="select-8">
								<label for="select-8">
									<img src="img/filter-1-8.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-9" id="select-9">
								<label for="select-9">
									<img src="img/filter-1-9.svg" alt="">
								</label>
							</div>
							<div class="item">
								<input type="checkbox" name="select-10" id="select-10">
								<label for="select-10">
									<img src="img/filter-1-10.svg" alt="">
								</label>
							</div>
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
								<label for="filter-1-1"><img src="img/filter-1-1.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-2" id="filter-1-2">
								<label for="filter-1-2"><img src="img/filter-1-2.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-3" id="filter-1-3">
								<label for="filter-1-3"><img src="img/filter-1-3.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-4" id="filter-1-4">
								<label for="filter-1-4"><img src="img/filter-1-4.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-5" id="filter-1-5">
								<label for="filter-1-5"><img src="img/filter-1-5.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-6" id="filter-1-6">
								<label for="filter-1-6"><img src="img/filter-1-6.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-7" id="filter-1-7">
								<label for="filter-1-7"><img src="img/filter-1-7.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-8" id="filter-1-8">
								<label for="filter-1-8"><img src="img/filter-1-8.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-9" id="filter-1-9">
								<label for="filter-1-9"><img src="img/filter-1-9.svg" alt=""></label>
							</li>
							<li>
								<input type="checkbox" name="filter-1-10" id="filter-1-10">
								<label for="filter-1-10"><img src="img/filter-1-10.svg" alt=""></label>
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
								<div class="col col-7"><img src="img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-1">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="img/h-1.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-2.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-3.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-5.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-4.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
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
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="img/icon-9.svg" alt=""></a>
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
								<div class="col col-7"><img src="img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-2">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="img/h-1.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-2.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-3.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-5.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-4.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
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
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="img/icon-9.svg" alt=""></a>
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
								<div class="col col-7"><img src="img/icon-18.svg" alt=""></div>
							</div>
							<div class="detail">
								<div class="img-line">
									<figure>
										<img src="img/img-19.jpg" alt="">
										<div class="like-wrap">
											<a href="#"><i class="far fa-heart"></i></a>
										</div>
									</figure>
									<div class="slider-wrap">
										<div class="swiper slider-p-3">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<img src="img/h-1.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-2.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-3.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-5.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
													</div>
												</div>
												<div class="swiper-slide">
													<img src="img/h-4.png" alt="">
													<div class="product-img">
														<img src="img/p-1.svg" alt="">
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
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>COLOR: <span>I</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CLARITY: <span>VS2</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
									<li>
										<p>CERTIFICATE: <span>Fiori Diamond Certificate</span></p>
										<a href="#"><img src="img/icon-19.svg" alt=""></a>
									</li>
								</ul>
								<div class="btn-wrap">
									<a href="#" class="link">Speak to diamond expert <img src="img/icon-9.svg" alt=""></a>
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