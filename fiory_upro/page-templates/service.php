<?php
/*
Template Name: Service
*/
?>

<?php get_header(); ?>


<?php get_template_part('parts/breadcrumbs') ?>

<section class="test-wrap ">
    <div class="content-width">


        <div class="step-2-content">

            <div class="right">
                <h2>YOUR INFORMATION</h2>
                <div action="#" class="form-default">
                <?= do_shortcode('[contact-form-7 id="613" title="Diamond order"]') ?>
                </div>

            </div>

        </div>
    </div>
</section>





<?php get_footer(); ?>
