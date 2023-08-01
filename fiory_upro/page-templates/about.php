<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<section class="about">
	<div class="content-width">

		<?php if (get_the_content()): ?>
			<div class="top"><?php the_content() ?></div>
		<?php endif ?>
		
		<?php if (has_post_thumbnail()): ?>
			<figure>
				<?php the_post_thumbnail('full') ?>
			</figure>
		<?php endif ?>
		
		<?php if ($field = get_field('title_1')): ?>
			<?= $field ?>
		<?php endif ?>
		
		<?php if ($field = get_field('text_1')): ?>
			<div class="text-col-2"><?= $field ?></div>
		<?php endif ?>
		
	</div>
</section>

<section class="our-promise">
	<div class="content-width">
		
		<?php if ($field = get_field('title_2')): ?>
			<?= $field ?>
		<?php endif ?>
		
		<?php $images = get_field('gallery_2');
		if($images): ?>

			<figure>

				<?php foreach($images as $image): ?>

					<?= wp_get_attachment_image($image['ID'], 'full') ?>

				<?php endforeach; ?>

			</figure>

		<?php endif; ?>

		<?php if( have_rows('list_2') ): ?>

			<ol>

				<?php while( have_rows('list_2') ): the_row(); ?>

					<li>

						<?php if ($field = get_sub_field('title')): ?>
							<h6><?= $field ?></h6>
						<?php endif ?>
						
						<?php if ($field = get_sub_field('text')): ?>
							<?= $field ?>
						<?php endif ?>
						
					</li>

				<?php endwhile; ?>

			</ol>

		<?php endif; ?>

	</div>
</section>

<?php get_footer(); ?>