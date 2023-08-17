<?php
/*
Template Name: Form (Step 1)
*/
?>

<?php get_header(); ?>

<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-wrap">
	<div class="content-width">
		
		<?php get_template_part('parts/steps') ?>

		<h1><?= mb_strtoupper(get_the_title()) ?></h1>

		<?php the_content() ?>

		<div class="calendar">
			<!-- Calendly inline widget begin -->
			<div class="calendly-inline-widget" data-url="https://calendly.com/vcslvperminov/30min" style="min-width:320px;height:700px;"></div>
			<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
			<!-- Calendly inline widget end -->
		</div>

		<div class="btn-wrap">
			<a href="#" class="btn-default" id="form_step_1_button_next"><?php _e('NEXT STEP', 'Fiori') ?></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>