<?php


add_action('template_redirect', function(){
    if (is_account_page() && !is_user_logged_in()) {
        wp_redirect('/');
    }

    if ( is_account_page() && empty( WC()->query->get_current_endpoint() ) ) {
      //  wp_safe_redirect( wc_get_account_endpoint_url( 'edit-address' ) );
      //  exit;

//        echo 1123123123;
//        echo WC()->query->get_current_endpoint() ;


    }
});

add_filter( 'woocommerce_account_menu_items', 'bbloomer_myaccount_remove_orders_tab', 9999 );

function bbloomer_myaccount_remove_orders_tab( $items ) {
    unset( $items['dashboard'] );
    unset( $items['orders'] );
    unset( $items['downloads'] );
    unset( $items['edit-account'] );
    unset( $items['customer-logout'] );
    unset( $items['payment-methods'] );


    $items['edit-address'] = 'PERSONAL DATA ';
    $items['shipping'] = 'ADDRESSES';
    $items['orders'] = 'MY ORDERS';
    $items['wishlist'] = 'WISHLIST';
    $items['customer-logout'] = 'Log out';
    return $items;
}

add_action('init', function() {
    add_rewrite_endpoint('shipping', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('wishlist', EP_ROOT | EP_PAGES);
});
function my_custom_query_vars( $vars ) {
    $vars[] = 'shipping';
    $vars[] = 'wishlist';
    return $vars;
}

add_filter( 'query_vars', 'my_custom_query_vars', 0 );

add_action('woocommerce_account_shipping_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user
    wc_get_template('myaccount/shipping.php', [
        'shipping' => $endpoint
    ]);
});
add_action('woocommerce_account_wishlist_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user
    wc_get_template('myaccount/wishlist.php', [
        'wishlist' => $endpoint
    ]);
});


function add_points_widget_to_fragment( $fragments ) {
    $fragments['.btn-card span'] =  '<span>'.  WC()->cart->get_cart_contents_count() . '</span>';

    ob_start();
    woocommerce_mini_cart();
    $fragments['.mini-cart'] = ob_get_clean();



    return $fragments;
}
add_filter('add_to_cart_fragments', 'add_points_widget_to_fragment');

remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('woocommerce_payment_placement', 'woocommerce_checkout_payment', 20);
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
//add_action('woocommerce_login_placement', 'woocommerce_checkout_login_form', 20);


//add_shortcode('vc_row' ,'vc_column_text');
//add_shortcode('vc_column' ,'vc_column_text');
//add_shortcode('vc_column_text' ,'vc_column_text');
//function vc_column_text($attr, $content, $tag) {
//    return $content;
//}



add_action( 'init', 'remove_and_strip_shortcode' );
function remove_and_strip_shortcode() {

    // удаляем
    remove_shortcode( 'myshortcode' );

    $fn__strip_myshortcode = function( $content ){
        // вырежет: [myshortcode] и [myshortcode ids="132,2154,548"]
        $content = preg_replace( '~\[vc_column_text[^\]]*\]~', '', $content );
        $content = preg_replace( '~\[vc_column[^\]]*\]~', '', $content );
        $content = preg_replace( '~\[vc_row[^\]]*\]~', '', $content );


        // вырежет: [myshortcode] data [/myshortcode]
        $content = str_replace( '[/vc_column_text]', '', $content );
        $content = str_replace( '[/vc_column]', '', $content );
        $content = str_replace( '[/vc_row]', '', $content );


        return $content;
    };

    // вырезаем
    add_filter( 'the_content', $fn__strip_myshortcode, 5 );
}


add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

add_filter( 'add_hook_custom_size_chart_position', function($f){
    return 'woocommerce_size_chart_position';
} );



if ( ! function_exists( 'yith_wcwl_berocket_filters_compatibility' ) ) {
    function yith_wcwl_berocket_filters_compatibility() {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
				jQuery( function( $ ) {
					$(document).on( 'berocket_ajax_products_loaded', function() { $(document).trigger('yith_wcwl_init') } );
				} );
			"
        );
    }
    add_action( 'wp_enqueue_scripts', 'yith_wcwl_berocket_filters_compatibility' );
}
