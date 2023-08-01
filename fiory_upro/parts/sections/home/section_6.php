<?php if( have_rows('showrooms_6') ): ?>

	<section class="showrooms">
		<div class="content-width">

			<?php if ($field = get_field('title_6')): ?>
				<div class="title">
					<h2><?= $field ?></h2>
				</div>
			<?php endif ?>
			
			<div class="content">
				<div class="left">
					<ul class="accordion">

						<?php while( have_rows('showrooms_6') ): the_row(); ?>

							<li class="accordion-item<?php if(get_row_index() == 1) echo ' is-active' ?>">

								<?php if ($field = get_sub_field('title')): ?>
									<div class="accordion-thumb">
										<h5><?= $field ?></h5>
									</div>
								<?php endif ?>
								
								<div class="accordion-panel">
									<div class="wrap">

										<?php if ($field = get_sub_field('address')): ?>
											<div class="item">
												<h6><?php _e('Address', 'Fiori') ?></h6>
												<p><?= $field ?></p>
											</div>
										<?php endif ?>

										<?php if ($field = get_sub_field('phone')): ?>
											<div class="item">
												<h6><?php _e('Phone', 'Fiori') ?></h6>
												<p><a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a></p>
											</div>
										<?php endif ?>

										<?php if ($field = get_sub_field('image')): ?>
											<div class="img-wrap">
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											</div>
										<?php endif ?>
										
									</div>

								</div>
							</li>

						<?php endwhile; ?>

					</ul>
				</div>
				<figure>

					<?php while( have_rows('showrooms_6') ): the_row(); ?>

						<?php if ($field = get_sub_field('image')): ?>
							<?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'img-' . get_row_index())) ?>
						<?php endif ?>

					<?php endwhile; ?>
					
				</figure>
			</div>
		</div>
	</section>

	<?php endif; ?>