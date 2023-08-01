<?php if( have_rows('hero_slider') ): ?>

	<section class="home-banner-slider">
		<div class="content-width">
			<div class="slider-wrap">
				<div class="swiper banner-slider">
					<div class="swiper-wrapper">

						<?php while( have_rows('hero_slider') ): the_row(); ?>

							<div class="swiper-slide">
								<div class="left">

									<?php if ($field = get_sub_field('left')['picture']): ?>
										<figure>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>

											<?php if ($icon = get_sub_field('left')['icon']): ?>
												<div class="icon-wrap">
													<?= wp_get_attachment_image($icon['ID'], 'full') ?>
												</div>
											<?php endif ?>
											
										</figure>
									<?php endif ?>
									
									<div class="text">
										<div class="wrap">
											<?php if ($field = get_sub_field('left')['title']): ?>
												<h1 class="title"><?= $field ?></h1>
											<?php endif ?>

											<?php if ($field = get_sub_field('left')['subtitle']): ?>
												<p><?= $field ?></p>
											<?php endif ?>

										</div>

										<?php if ($field = get_sub_field('left')['link']): ?>
											<div class="btn-wrap">
												<a href="<?= $field ?>" class="btn-default btn-border"><?php _e('EXPLORE', 'Fiori') ?></a>
											</div>
										<?php endif ?>

									</div>
								</div>

								<div class="right">

									<?php if ($field = get_sub_field('right')['picture']): ?>
										<figure>
											<?= wp_get_attachment_image($field['ID'], 'full') ?>

											<?php if ($icon = get_sub_field('right')['icon']): ?>
												<div class="icon-wrap">
													<?= wp_get_attachment_image($icon['ID'], 'full') ?>
												</div>
											<?php endif ?>

										</figure>
									<?php endif ?>
									
									<div class="wrap">

										<?php if ($field = get_sub_field('right')['title']): ?>
											<h2><?= $field ?></h2>
										<?php endif ?>

										<?php if ($field = get_sub_field('right')['subtitle']): ?>
											<h3><?= $field ?></h3>
										<?php endif ?>

									</div>

									<?php if ($field = get_sub_field('right')['link']): ?>
										<div class="btn-wrap">
											<a href="<?= $field ?>" class="btn-default btn-border"><?php _e('EXPLORE', 'Fiori') ?></a>
										</div>
									<?php endif ?>

								</div>
							</div>

						<?php endwhile; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>