<?php
/*
Template Name: Appointment
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="expert">
	<div class="content-width">

		<?php if ($title = get_field('title') ?: get_the_title()): ?>
		<h1><?= $title ?></h1>
	<?php endif ?>

	<?php if( have_rows('items') ): ?>

		<div class="content">

			<?php while( have_rows('items') ): the_row(); ?>

				<div class="item">
					<div class="wrap">

						<?php if ($field = get_sub_field('image')): ?>
							<figure>
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							</figure>
						<?php endif ?>

						<div class="text-wrap">
							<div class="text">

								<?php if ($field = get_sub_field('title')): ?>
									<h5><?= $field ?></h5>
								<?php endif ?>

								<?php if ($field = get_sub_field('text')): ?>
									<p><?= $field ?></p>
								<?php endif ?>

							</div>

							<?php if ($field = get_sub_field('link')): ?>
								<div class="btn-wrap">
									<a href="<?= get_permalink(601) ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
								</div>
							<?php endif ?>

						</div>
					</div>
				</div>

				<?php if (get_row_index() == 1): ?>
					<div class="or">
						<p>
							<span><?php _e('OR', 'Fiori') ?></span>
						</p>
					</div>
				<?php endif ?>

			<?php endwhile; ?>

		</div>

	<?php endif; ?>

</div>
</section>

<?php get_footer(); ?>
