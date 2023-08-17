<?php
/**
 * Wishlist pages template; load template parts basing on the url
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Templates\Wishlist
 * @version 3.0.0
 */

/**
 * Template Variables:
 *
 * @var $template_part string Sub-template to load
 * @var $var array Array of attributes that needs to be sent to sub-template
 */

if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly
?>
<section class="cabinet">
    <div class="content-width">
        <div class="tab-content">
            <div class="tab-item item-data">

                <?php wc_get_template('myaccount/wishlist.php'); ?>

            </div>
        </div>
    </div>
</section>
