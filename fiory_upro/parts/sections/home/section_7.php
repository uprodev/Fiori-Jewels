<?php $images = get_field('gallery_7');
if($images): ?>

	<section class="soc-block">
		<div class="content-width">

			<?php if ($field = get_field('title_7')): ?>
				<h2><?= $field ?></h2>
			<?php endif ?>

			<div class="content">

				<?php foreach($images as $index => $image): ?>

					<div class="item">
						<a href="<?= $image['url'] ?>" data-fancybox="gallery">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						</a>
					</div>

					<?php if (($field = get_field('link_7')) && (round(count($images) / ($index + 1)) == 2)): ?>
					<div class="item-link">
						<a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>>
							<span><?= $field['title'] ?></span>
						</a>
					</div>
				<?php endif ?>

			<?php endforeach; ?>

		</div>
	</div>
</section>

<?php endif; ?>