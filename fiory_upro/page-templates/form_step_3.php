<?php
/*
Template Name: Form (Step 3)
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-wrap ">
	<div class="content-width">

		<?php get_template_part('parts/steps') ?>

		<h1><?php the_title() ?></h1>

		<div class="step-3-content">

			<?php if (has_post_thumbnail()): ?>
				<figure>
					<?php the_post_thumbnail() ?>
				</figure>
			<?php endif ?>
			
			<div class="text">

				<?php if( have_rows('address') ): ?>
					<?php while( have_rows('address') ): the_row(); ?>

						<?php if ($field = get_sub_field('title')): ?>
							<h4><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-23-1.svg" alt=""><?= $field ?></h4>
						<?php endif ?>

						<?php if ($field = get_sub_field('text')): ?>
							<?= $field ?>
						<?php endif ?>

					<?php endwhile; ?>
				<?php endif; ?>

				<?php if ($field = get_field('date')): ?>
					<h3><img src="<?= get_stylesheet_directory_uri() ?>//img/icon-23-2.svg" alt=""><?= $field ?></h3>
				<?php endif ?>
				
				<?php if ($field = get_field('time')): ?>
					<h4><img src="<?= get_stylesheet_directory_uri() ?>//img/icon-23-3.svg" alt=""><?= $field ?></h4>
				<?php endif ?>
				
				<?php if( have_rows('links') ): ?>

					<ul>

						<?php while( have_rows('links') ): the_row(); ?>

							<?php if ($link = get_sub_field('link')): ?>
								<li>
									<a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>>

										<?php if ($icon = get_sub_field('icon')): ?>
											<?= wp_get_attachment_image($icon['ID'], 'full') ?>
										<?php endif ?>
										
										<?= $link['title'] ?>
									</a>
								</li>
							<?php endif ?>					

						<?php endwhile; ?>

					</ul>

				<?php endif; ?>

				<?php if( have_rows('buttons') ): ?>

					<div class="btn-wrap">

						<?php while( have_rows('buttons') ): the_row(); ?>

							<?php if ($field = get_sub_field('link')): ?>
								<a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
							<?php endif ?>					

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>