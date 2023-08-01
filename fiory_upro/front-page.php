<?php get_header(); ?>

<?php 
for ($i = 1; $i <= 8; $i++) { 
	get_template_part('parts/sections/home/section_' . $i);
} 
?>

<?php get_footer(); ?>