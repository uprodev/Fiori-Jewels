<?php
/*
Template Name: Meeting Duration
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="duration">
	<div class="content-width">
		<div class="left">

			<?php if ($field = get_field('title')): ?>
				<h1><?= $field ?></h1>
			<?php endif ?>
			
			<div class="item">

				<?php if (has_post_thumbnail()): ?>
					<figure>
						<?php the_post_thumbnail('full') ?>
					</figure>
				<?php endif ?>
				
				<?php if ($field = get_field('text')): ?>
					<div class="text">
						<?= $field ?>
					</div>
				<?php endif ?>
				
			</div>
		</div>
		<div class="right">
			<h2><?= mb_strtoupper(get_the_title()) ?></h2>

			<?php if ($content = get_the_content()): ?>
				<?= $content ?>
			<?php endif ?>
			
			<?php if( have_rows('items') ): ?>

				<form action="#" class="form-default">

					<?php while( have_rows('items') ): the_row(); ?>

						<div class="input-wrap-check">
							<input type="radio" name="radio-1" id="radio-<?= get_row_index() ?>">
							<label for="radio-<?= get_row_index() ?>">

								<?php if ($field = get_sub_field('title')): ?>
									<span class="title">
										<span class="h6"><?= $field ?></span>
									</span>
								<?php endif ?>
								
								<span class="wrap">

									<?php if ($field = get_sub_field('time')): ?>
										<span><b><?= $field ?></b></span>
									<?php endif ?>

									<?php if ($field = get_sub_field('text')): ?>
										<span><?= $field ?></span>
									<?php endif ?>

								</span>
							</label>
						</div>

					<?php endwhile; ?>

				</form>

			<?php endif; ?>

			<div class="btn-wrap">
				<a href="#" class="link"><i class="fas fa-chevron-left"></i>Back to Address</a>
				<button type="submit" class="btn-default">NEXT STEP</button>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>