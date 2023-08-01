<?php get_header(); ?>

<section class="block-404">
	<div class="content-width">

		<?php if ($field = get_field('title_1_404', 'option')): ?>
			<h4><?= $field ?></h4>
		<?php endif ?>
		
		<div class="title-wrap">

			<?php if ($field = get_field('title_2_404', 'option')): ?>
				<h1><?= $field ?></h1>
			<?php endif ?>
			
			<?php if ($field = get_field('text_1_404', 'option')): ?>
				<div class="info"><?= $field ?></div>
			<?php endif ?>
			
		</div>
		<div class="content">
			
			<?php if ($field = get_field('image_404', 'option')): ?>
				<figure>
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</figure>
			<?php endif ?>
			
			<?php if ($field = get_field('text_2_404', 'option')): ?>
				<?= $field ?>
			<?php endif ?>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>