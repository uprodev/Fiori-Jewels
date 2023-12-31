<?php
/*
Template Name: Login
*/
?>

<?php get_header(); ?>

<section class="login">
    <div class="content-width">
        <h1>Login <b>or</b><br>
            Create a New Account</h1>
        <div class="content">
            <div class="tabs">
                <ul class="tabs-menu">
                    <li><span>LOGIN</span></li>
                    <li><span>CREATE ACCOUNT</span></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-item">
                        <form action="#" class="form-default loginform">
                            <div class="input-wrap">
                                <label for="email-1"></label>
                                <input type="email" name="login"  id="email-1" placeholder="Email" required>
                            </div>
                            <div class="input-wrap">
                                <label for="password"></label>
                                <input type="password" name="password" id="password" placeholder="Password" required    >
                            </div>
                            <div class="input-wrap-check">
                                <div class="wrap">
                                    <input type="checkbox" id="check" name="check">
                                    <label for="check">Remember me</label>
                                </div>
                                <a href="#" class="lost">Forgot password?</a>
                            </div>
                            <div class="input-wrap-submit">
                                <button class="btn-default" type="submit">SIGN IN </button>
                            </div>

                            <input type="hidden" name="action" value="ajax_login">
                            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                            <div class="result-login"></div>

                        </form>

                        <form action="#" class="form-default lostpasswordform" style="display: none">
                            <br>
                            <div class="input-wrap">
                                <label for="email-1"></label>
                                <input type="email" name="login"  id="email-1" placeholder="Email" required>
                            </div>


                            <div class="input-wrap-submit">
                                <button class="btn-default" type="submit">RESET </button>
                            </div>

                            <input type="hidden" name="action" value="ajax_reset">
                            <?php wp_nonce_field( 'ajax-reset-nonce', 'security' ); ?>
                            <div class="result-reset"></div>

                        </form>

                    </div>
                    <div class="tab-item">
                        <form action="#" class="form-default registerform">
                            <div class="input-wrap">
                                <label for="name"></label>
                                <input type="text" name="billing_first_name" id="name" placeholder="First name" required>
                            </div>
                            <div class="input-wrap">
                                <label for="last-name"></label>
                                <input type="text" name="billing_last_name" id="last-name" placeholder="Last name" required>
                            </div>
                            <div class="input-wrap">
                                <label for="tel"></label>
                                <input type="text" name="billing_phone" id="tel" placeholder="Phone" class="tel" required>
                            </div>
                            <div class="input-wrap">
                                <label for="email-2"></label>
                                <input type="email" data-rule-equalto="#email-3" name="billing_email" id="email-2" placeholder="Email" required>
                            </div>
                            <div class="input-wrap">
                                <label for="email-3"></label>
                                <input type="email" name="billing_email2" id="email-3" placeholder="Confirm Email" required>
                            </div>
                            <div class="input-wrap">
                                <label for="password-1"></label>
                                <input data-rule-equalto="#password-2" type="password" name="password" id="password-1" placeholder="Password" required>
                            </div>
                            <div class="input-wrap">
                                <label for="password-2"></label>
                                <input type="password" name="password2" id="password-2" placeholder="Confirm Password" required>
                            </div>
                            <div class="input-wrap-check">
                                <div class="wrap">
                                    <input type="checkbox" id="check-1" name="check">
                                    <label for="check-1">Register to our newsletter</label>
                                </div>

                            </div>
                            <div class="input-wrap-submit">
                                <button class="btn-default" type="submit">CREATE ACCOUNT</button>
                            </div>
                            <input type="hidden" name="action" value="ajax_registration">
                            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                            <div class="result-register"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
