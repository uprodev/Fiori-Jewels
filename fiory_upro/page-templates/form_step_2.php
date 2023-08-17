<?php
/*
Template Name: Form (Step 2)
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-wrap ">
	<div class="content-width">

		<?php get_template_part('parts/steps') ?>

		<div class="step-2-content">
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
					
					<?php if ($content = get_the_content()): ?>
						<div class="text">
							<?= $content ?>
						</div>
					<?php endif ?>
					
				</div>
			</div>
			<div class="right">
				<h2><?= mb_strtoupper(get_the_title()) ?></h2>

				<?php if ($field = get_field('form')): ?>
					<?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="form-default"]') ?>
				<?php endif ?>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>