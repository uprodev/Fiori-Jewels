<?php


$actions = [
    'ajax_registration',
    'ajax_login',
    'ajax_reset',
    'qty_cart',
    'remove_item_from_cart',
    'apply_coupon',
    'order_viewed',
    'save_personal_data',
    'add_ticket',
    'add_to_fav',
    'add_to_cart',
    'filter_quiz'

];
foreach ($actions as $action) {
    add_action("wp_ajax_{$action}", $action);
    add_action("wp_ajax_nopriv_{$action}", $action);
}


function ajax_registration()
{

    // First check the nonce, if it fails the function will break
      check_ajax_referer( 'ajax-registration-nonce', 'security' );

    if (!filter_var($_POST['billing_email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array(
            'update' => false,
            'status' => '<p class="error">Email address ' . $_POST['billing_email'] . ' is incorrect</p>',
        ));
        wp_die();
    }

    if ($_POST['billing_email']  ) {

        $login = $_POST['billing_email'];
        $email = $_POST['billing_email'];
        $password = $_POST['password'];
        $role = $_POST['role'] ?: 'subscriber';
        $user = get_user_by('email', $email);


        if (empty($user)) {

            $userdata = [
                'user_login' => $login,
                'user_pass'  => trim($password),
                'user_email' => $login,
            ];

            $user_id = wp_insert_user( $userdata ) ;
        //    wp_new_user_notification( $user_id, 'both' );

            if ($user_id) {
                $data = array(
                    'update' => true,
                    'status' => '<p class="success">' . __('Registration successful', 'sage') . '</p>',
                    'redirect' => get_permalink(12),
                    'user_id' => $_POST,
                );
                $fields = ['billing_email', 'billing_first_name', 'billing_last_name', 'billing_phone'];

                foreach ($fields as $field)
                    update_field($field, $_POST[$field], 'user_' . $user_id);

                $auth = wp_authenticate($email, $password);
                wp_set_current_user($auth->ID);
                wp_set_auth_cookie($auth->ID, true);


             //   print_r($_POST);
            }

        } else {
            $data = array(
                'update' => false,
                'status' => '<p class="error">' . __('Пользователь с таким E-mail уже существует<br><br>', 'sage') . '</p>',
            );
        }
    } else {
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Email and password fields are required', 'sage') . '</p>',
        );
    }

    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknow error', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();
}

function ajax_login()
{

    // First check the nonce, if it fails the function will break
   // check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
    $email = $_POST['login'];
    $password = $_POST['password'];

    $auth = wp_authenticate($email, $password);

    if (is_wp_error($auth)) {
        $data = array(
            'update' => false,
            't' => $password,
            'status' => '<p class="error">' . __('Incorrect login data', 'sage') . '</p>',
        );
    } else {


        //asdsd@dsdddd.dd
//        wp_set_current_user($auth->ID);


        wp_clear_auth_cookie();
        wp_set_current_user($auth->ID);
        wp_set_auth_cookie($auth->ID, true, false);
        update_user_caches( $auth );

//        do_action('wp_login', $auth->user_login, $auth);
        $data = array(
            'update' => true,
            'status' => '<p class="success">' . __(' Please wait...', 'sage') . '</p>',
            'redirect' => get_permalink(12),
            'auth' => $auth
        );
    }

    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknown error', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();
}

function validate_email()
{
    if (($_GET['email'])) {
        if (!email_exists($_GET['email']))
            echo "true";
        else
            echo "false";

    }

    die();
}

function ajax_reset()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-reset-nonce', 'security');

    if ($_POST['login']) {

        if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array(
                'update' => false,
                'status' => '<p class="error">Email address ' . $_POST['login'] . ' is incorrect</p>',
            ));
            wp_die();
        }

        if ($user = get_user_by('email', $_POST['login'])) {

            $pass = wp_generate_password();

            wp_mail($_POST['login'], 'Reset password', 'New password ' . $pass);

            $data = array(
                'update' => true,
                'status' => '<p>New password has been sent to email</p>',
                'data' => $user
            );


            wp_send_json($data);

        } else {
            $data = array(
                'update' => false,

                'status' => '<p class="error">' . sprintf(__('User with email %s does not exist', 'sage'), $_POST['email']) . '</p>',
            );
        }

    }


    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknow email', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();

}

function save_personal_data()
{

    check_ajax_referer( 'ajax-profile-nonce', 'security' );

    $user_id = $_POST['user_id'];
    $pass =  $_POST['password'];
    if ($user_id > 0 ) {


        //meta
        update_user_meta($user_id, 'newsletter', sanitize_text_field( $_POST['newsletter'] ));
        if (!empty($_POST['meta']))
            foreach ($_POST['meta'] as $key => $value) {
                update_user_meta($user_id, $key, sanitize_text_field( $value ));
                if ($key == 'billing_email') {
                    wp_update_user(['ID' => $user_id, 'user_email' => $value]);
                }
            }


        //dates
        if (!empty($_POST['dates']))
            foreach ($_POST['dates'] as $key => $value) {
                $date = [
                    'day' =>  $value['day'],
                    'month' =>  $value['month'],
                    'year' =>  $value['year'],
                ];

                update_field($key, $date, 'user_' . $user_id);
//                update_user_meta($user_id, $key . '_' . 'day', sanitize_text_field( $value['day'] ));
//                update_user_meta($user_id, $key . '_' . 'month', sanitize_text_field( $value['month'] ));
//                update_user_meta($user_id, $key . '_' . 'year', sanitize_text_field( $value['year'] ));

            }

        if ($user_id > 0 && $pass) {

                wp_update_user([
                    'ID' => $user_id,
                    'user_pass' => $pass
                ]);

            }

    }

    ob_start();
    $type = $_POST['type'] ? $_POST['type'] : 'billing';
    get_template_part('parts/account', $type , ['user_id' => $user_id]);
    $personal = ob_get_clean();



    wp_send_json(
        [
            'status' => 'Information updated',
            'personal' => $personal,
            'data' => $_POST
        ]
    );
    die();
}



function qty_cart()
{

    $cart_item_key = $_POST['hash'];
    $product_values = WC()->cart->get_cart_item($cart_item_key);
    $product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity);


    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $product_quantity, true);
    }

    die();
}

function remove_item_from_cart()
{
    $cart_item_keys = $_POST['hash'];

    foreach ($cart_item_keys as $cart_item_key) {
        WC()->cart->remove_cart_item($cart_item_key);
        $count = WC()->cart->get_cart_contents_count();
    }

    WC_AJAX::get_refreshed_fragments();
    wp_send_json(
        [
            'count' => $count,
        ]
    );
    die();
}


function apply_coupon()
{
    $coupon = $_POST['coupon'];

    WC()->cart->apply_coupon( $coupon );


    wp_send_json(
        [
            'coupon' => $coupon,
        ]
    );
    die();
}


function order_viewed()
{


    $user_id = $_GET['user_id'];
    $orderby = $_GET['order'];
    $viewed = get_field('viewed', 'user_'.$user_id);


    if ($viewed)
        $viewed = json_decode($viewed, true);

    $post__in = array_keys($viewed);

    if ( 'price' === $orderby ) {
        $rlv_wc_order = 'asc';
    }
    if ( 'price-desc' === $orderby ) {
        $rlv_wc_order = 'desc';
    }

    if ( in_array( $orderby, array( 'price', 'price-desc' ), true ) ) {
        $orderby = 'meta_value_num';
        $meta_key = '_price';
    }

    if ( 'date' === $orderby ) {
        $orderby = 'post__in';
    }
    if ( 'popularity' === $orderby ) {

        $orderby = 'meta_value_num';
        $rlv_wc_order = 'desc';
        $meta_key = 'total_sales';
    }



    $args = [
        'post_type' => 'product',
        'post__in' => $post__in,
        'posts_per_page' => 30,
        'orderby' => $orderby,
        'order' => $rlv_wc_order,
        'meta_key' => $meta_key

    ];

    $q = new WP_query($args);

    ob_start();

    if ($q->have_posts() ) {
        while ($q->have_posts()) {
            $q->the_post();
            wc_get_template_part('content', 'product');
        }
    } else {
        get_template_part( 'parts/account/empty', 'viewed' );
    }



    $html = ob_get_clean();

    wp_send_json(
        [
            'result' => $html,
            'found' => $q->found_posts
        ]
    );
    die();
}




/**
 * add_to_cart
 */


function add_to_cart()
{

    $product_id = (int)$_GET['product_id'];
    $variation_id = (int)$_GET['variation_id'];
    $qty = $_GET['qty'] > 0 ? (int)$_GET['qty'] : 1;
    $added = WC()->cart->add_to_cart($product_id, $qty, $variation_id);



    $count = WC()->cart->get_cart_contents_count();

    wp_send_json_success(
        [
            'count' => $count,
        ]
    );

    //   WC_AJAX::get_refreshed_fragments();
    wp_die();
}


/**
 * filter_quiz
 */


function filter_quiz() {
    wp_send_json([
        'data' => $_GET
    ]);
}

