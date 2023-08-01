<figure>

	<?php if (has_post_thumbnail()): ?>
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('full') ?>
		</a>
	<?php endif ?>
	
</figure>
<div class="text-wrap">
	<p class="date"><?= get_the_date('Y m d') ?></p>
	<h6><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h6>

	<?php if (get_the_excerpt()): ?>
		<p><?php the_excerpt() ?></p>
	<?php endif ?>
	
	<div class="link-wrap">
		<a href="<?php the_permalink() ?>"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-13.svg" alt=""></a>
	</div>
</div>