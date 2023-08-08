<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

//$page_title = ( 'shipping' === $load_address ) ? esc_html__( 'shipping address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );
$user_id = get_current_user_id();
$user = get_userdata($user_id);


do_action( 'woocommerce_before_edit_account_address_form' ); ?>


<div class="no-edit" style="">
    <h6>ADDRESSES</h6>

    <ul class="personal-data">
        <?php get_template_part('parts/account', 'shipping' , ['user_id' => $user_id]) ?>
    </ul>

    <a href="#" class="edit-personal-data">UPDATE INFO <img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt=""></a>
</div>
<div class="edit" style="display:none;">
    <form action="#" class="form-default personal-data-form">
        <h6 class="mob-1">EDIT ACCOUNT</h6>
        <div class="mob-wrap-edit-1 mob-wrap-edit item-shipping">
            <div>
                <div class="input-wrap">
                    <label for="name">FIRST NAME*</label>
                    <input type="text" name="meta[shipping_first_name]" value="<?= get_field('shipping_first_name', 'user_' . $user_id) ?>" id="name" placeholder="Name" required>
                </div>
                <div class="input-wrap">
                    <label for="name-last">LAST NAME*</label>
                    <input type="text" name="meta[shipping_last_name]" value="<?= get_field('shipping_last_name', 'user_' . $user_id) ?>" id="name-last" placeholder="Last name" required>
                </div>

                <div class="input-wrap input-wrap-margin-top">
                    <label for="address-line-1"></label>
                    <input type="text" name="meta[shipping_address_1]" value="<?= get_field('shipping_address_1', 'user_' . $user_id) ?>" id="address-line-1" placeholder="Address line 1  - e.g Park street 62 *">
                    <p>Street Address, P.O. Box</p>
                </div>

                <div class="input-wrap">
                    <label for="address-line-2"></label>
                    <input type="text" name="meta[shipping_address_2]" value="<?= get_field('shipping_address_2', 'user_' . $user_id) ?>"  name="address-line-2" id="address-line-2" placeholder="Address line 2  - e.g Apt 4, building A ( optional )">
                    <p>Apartment, Suite, Unit, Floor</p>
                </div>

                <div class=" input-wrap input-wrap-margin-top">
                    <label for="shipping_country">COUNTRY*</label>

                    <div class="select-wrap">
                        <?php

                        global $woocommerce;
                        $countries_obj   = new WC_Countries();
                        $countries   = $countries_obj->get_countries();
                        $selected_country = get_field('shipping_country', 'user_' . $user_id);

                        ?>


                        <select name="meta[shipping_country]" id="shipping_country" class="is-selected       " autocomplete="none">
                            <option data-display="<?= __('Country', 'sage');?>"><?= __('Country', 'sage');?></option>
                            <?php foreach ($countries as $key => $country) {?>
                                <option <?php  selected($selected_country, $key) ?> value="<?= $key ?>"><?= $country ?></option>
                            <?php } ?>
                        </select>
                    </div>


                </div>

                <div class="input-wrap">
                    <label for="city">CITY*</label>
                    <input type="text" name="meta[shipping_city]" value="<?= get_field('shipping_city', 'user_' . $user_id) ?>" id="city" placeholder="Dubai">
                </div>

                <div class="input-wrap">
                    <label for="zip">ZIP*</label>
                    <input type="text" name="meta[shipping_postal]" value="<?= get_field('shipping_postal', 'user_' . $user_id) ?>" id="zip" placeholder="ZIP">
                </div>

                <div class="input-wrap">
                    <label for="code-tel">PHONE*</label>
                    <input type="text" name="meta[shipping_phone]" value="<?= get_field('shipping_phone', 'user_' . $user_id) ?>" id="code-tel" placeholder="0 000 0000" class="tel-code">
                </div>

            </div>

            <div class="input-wrap-submit input-wrap-margin-top">
                <a href="#" class="back-info btn-default btn-border">CANCEL</a>
                <button type="submit" class="btn-default">DONE</button>
            </div>

        </div>


        <input type="hidden" name="action" value="save_personal_data">
        <input type="hidden" name="type" value="shipping">
        <input type="hidden" name="user_id" value="<?= get_current_user_id() ?>">
        <?php wp_nonce_field( 'ajax-profile-nonce', 'security' ); ?>
        <div class="result-personal"></div>

    </form>
</div>


<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
