<section class="img-title">
	<div class="content-width">

		<?php if ($field = get_field('image_3')): ?>
			<figure>
				<?= wp_get_attachment_image($field['ID'], 'full') ?>
			</figure>
		<?php endif ?>
		
		<?php if ($field = get_field('text_3')): ?>
			<div class="text-wrap"><?= $field ?></div>
		<?php endif ?>
		
	</div>
</section>