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

//$page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );
$user_id = get_current_user_id();
$user = get_userdata($user_id);


do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<h2>PERSONAL DATA</h2>
<div class="no-edit" style="">
    <h6>Personal information</h6>

    <ul class="personal-data">
    <?php get_template_part('parts/account', 'billing' , ['user_id' => $user_id]) ?>
    </ul>

    <a href="#" class="edit-personal-data">UPDATE INFO <img src="<?= get_template_directory_uri() ?>/img/icon-10-2.svg" alt=""></a>
</div>
<div class="edit" style="display:none;">
    <form action="#" class="form-default personal-data-form">
        <h6 class="mob-1">EDIT ACCOUNT</h6>
        <div class="mob-wrap-edit-1 mob-wrap-edit">
            <div>
                <div class="input-wrap">
                    <label for="name">FIRST NAME*</label>
                    <input type="text" name="meta[billing_first_name]" value="<?= get_field('billing_first_name', 'user_' . $user_id) ?>" id="name" placeholder="Name" required>
                </div>
                <div class="input-wrap">
                    <label for="name-last">LAST NAME*</label>
                    <input type="text" name="meta[billing_last_name]" value="<?= get_field('billing_last_name', 'user_' . $user_id) ?>" id="name-last" placeholder="Last name" required>
                </div>
                <div class="input-wrap">
                    <label for="city">CITY, COUNTRY*</label>
                    <input type="text" name="meta[billing_city]" value="<?= get_field('billing_city', 'user_' . $user_id) ?>" id="city" placeholder="City,Country" required>
                </div>

                <?php

                $selects = [
                    'birthday' => ['DATE OF BIRTH', 'field_64cb826bbc654'],
                    'relationship' => ['relationship anniversary', 'field_64cb8273bc658'],
                    'engagement' => ['engagement anniversary', 'field_64cb8278bc659'],
                    'wedding' => ['wedding anniversary', 'field_64cb8288bc65a']
                ];

                foreach ($selects as $key => $select) {
                    $i++;
                    $value = get_field($select[1], 'user_' . $user_id);


                    ?>
                    <div class="select-wrap">
                        <h5><?= $select[0] ?></h5>
                        <label class="form-label" for="select-<?= $i ?>-1"></label>
                        <select id="select-<?= $i ?>-1" name="dates[<?= $key ?>][day]">
                            <option value="00" data-display="Day" disabled selected></option>
                            <?php foreach (range(1, 31) as $k) { ?>
                                <option <?php selected($k , $value['day']) ?> value="<?= $k ?>"><?= $k ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="select-<?= $i ?>-2"></label>
                        <select id="select-<?= $i ?>-2" name="dates[<?= $key ?>][month]">
                            <option value="00" data-display="Month" disabled selected></option>
                            <?php foreach (range(1, 12) as $k) { ?>
                                <option <?php selected($k , $value['month']) ?> value="<?= $k ?>"><?= $k ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="select-<?= $i ?>-3"></label>
                        <select id="select-<?= $i ?>-3" name="dates[<?= $key ?>][year]">
                            <option value="00" data-display="Year" disabled selected></option>
                            <?php foreach (range(1950, date('Y') - 18) as $k) { ?>
                                <option <?php selected($k , $value['year']) ?> value="<?= $k ?>"><?= $k ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                }

                ?>

                <div class="input-wrap">
                    <label for="code-tel">PHONE*</label>
                    <input type="text" name="meta[billing_phone]" value="<?= get_field('billing_phone', 'user_' . $user_id) ?>" id="code-tel" placeholder="0 000 0000" class="tel-code">
                </div>
                <div class="input-wrap-check">
                    <input type="checkbox" name="meta[newsletter]" <?php checked(1, get_field('newsletter', 'user_' . $user_id)) ?> id="check-1" checked>
                    <label for="check-1">Register to our newsletter</label>
                </div>
                <!--                                    <div class="input-wrap-check">-->
                <!--                                        <input type="checkbox" name="check-2" id="check-2">-->
                <!--                                        <label for="check-2">I accept the terms and conditions of Fiory.com</label>-->
                <!--                                    </div>-->
                <!--                                    <div class="input-wrap-check">-->
                <!--                                        <input type="checkbox" name="check-3" id="check-3">-->
                <!--                                        <label for="check-3">Consent for profiling</label>-->
                <!--                                    </div>-->
            </div>

        </div>


        <h6 class="mob-2">EDIT ACCOUNT</h6>
        <div class="mob-wrap-edit-2 mob-wrap-edit">
            <div>
                <div class="input-wrap">
                    <label for="email-p">PLEASE ENTER YOUR EMAIL</label>
                    <input type="email" name="meta[billing_email]" value="<?= get_field('billing_email', 'user_' . $user_id) ? get_field('billing_email', 'user_' . $user_id) : $user->user_email ?>" id="email-p" placeholder="Email">
                </div>
                <div class="input-wrap">
                    <label for="password-1">PLEASE ENTER YOUR PASSWORD</label>
                    <input data-rule-equalto="#password-2" type="password" name="password" id="password-1" placeholder="PASSWORD">
                </div>
                <div class="input-wrap">
                    <label for="password-2">CONFIRM PASSWORD</label>
                    <input type="password" name="password-2" id="password-2" placeholder="CONFIRM PASSWORD">
                </div>
                <h5>All form fields are mandatory*</h5>
                <div class="input-wrap-submit">
                    <button type="submit" class="btn-default">DONE</button>
                </div>
            </div>
        </div>

        <input type="hidden" name="action" value="save_personal_data">
        <input type="hidden" name="user_id" value="<?= get_current_user_id() ?>">
        <?php wp_nonce_field( 'ajax-profile-nonce', 'security' ); ?>
        <div class="result-personal"></div>

    </form>
</div>


<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
