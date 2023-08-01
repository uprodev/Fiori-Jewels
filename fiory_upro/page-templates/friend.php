<?php
/*
Template Name: Friend
*/
?>

<?php get_header(); ?>

<section class="friend">

	<?php $images = get_field('gallery');
	if($images): ?>

		<div class="bg">

			<?php foreach($images as $image): ?>

				<?= wp_get_attachment_image($image['ID'], 'full') ?>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

	<div class="content-width">
		<div class="content">
			<h5><?php the_title() ?></h5>
			
			<?php if ($field = get_field('content')): ?>
				<?= $field ?>
			<?php endif ?>

			<?php if (get_field('code')): ?>
				<div class="form-wrap">

					<?php if ($field = get_field('code')['text']): ?>
						<?= $field ?>
					<?php endif ?>

					<div class="btn-wrap">

						<?php if ($field = get_field('code')['copied_text']): ?>
							<p class="copy"><?= $field ?></p>
						<?php endif ?>

						<button class="btn-default btn-border copy-code"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-35.svg" alt="">QRIO3478</button>

						<?php if ($field = get_field('code')['link']): ?>
							<a href="#" class="btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-36.svg" alt=""><?= $field ?></a>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>
			
			<?php if ($field = get_field('text')): ?>
				<div class="info"><?= $field ?></div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>