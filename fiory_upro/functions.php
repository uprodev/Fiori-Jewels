<?php

include 'inc/ajax-actions.php'; // ajax
include 'inc/woo.php';          // woocommerce functions


add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap');
	wp_enqueue_style('my-font', get_template_directory_uri() . '/css/font.css');
	wp_enqueue_style('my-fontawesome', get_template_directory_uri() . '/fonts/FA5PRO-master/css/all.css');
	wp_enqueue_style('my-fontawesome-2', get_template_directory_uri() . '/font-awesome-4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('my-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-intlTelInput', get_template_directory_uri() . '/css/intlTelInput.min.css');
	wp_enqueue_style('my-select', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-swiper', get_template_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-rangeSlider', get_template_directory_uri() . '/css/ion.rangeSlider.min.css');
	wp_enqueue_style('my-styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('my-responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('my-style-main', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
    wp_enqueue_script( 'wc-cart-fragments' );
	wp_enqueue_script('my-swiper', get_template_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-rangeSlider', get_template_directory_uri() . '/js/ion.rangeSlider.min.js', array(), false, true);
	wp_enqueue_script('my-mask', get_template_directory_uri() . '/js/jquery.mask.min.js', array(), false, true);
	wp_enqueue_script('my-intlTelInput', get_template_directory_uri() . '/js/intlTelInput.min.js', array(), false, true);
	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), false, true);

    wp_enqueue_script('jqueryvalidation',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', array(), false, 1);

    wp_enqueue_script('actions', get_template_directory_uri() . '/js/actions.js', array(), false, true);
    wp_enqueue_script('add', get_template_directory_uri() . '/js/add.js', array(), false, true);

    wp_localize_script('actions', 'globals',
        array(
            'url' => admin_url('admin-ajax.php'),
            'template' => get_template_directory_uri(),

        )
    );
    wp_localize_script('add', 'php_vars',
        array(
            'diamonds_quiz_result_url' => get_permalink(570),
            'form_step_1_url' => get_permalink(601),
            'form_step_2_url' => get_permalink(605),
        )
    );

}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		//'header' => 'Header menu',
		'footer-1' => 'Footer menu-1',
		'footer-2' => 'Footer menu-2',
		'footer-3' => 'Footer menu-3',
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
} );


add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('home', $type))
    {
        $title = __('Home', 'Fiori');
    }
    return $title;
}
