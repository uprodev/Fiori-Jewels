<div class="test-popup" id="test-popup" style="display: none">
    <div class="main">
        <div class="steps-wrap">
            <ul>
                <li class="is-active">
                    <p><?php _e('STEP 1', 'Fiori') ?></p>
                </li>
                <li>
                    <p><?php _e('STEP 2', 'Fiori') ?></p>
                </li>
                <li>
                    <p><?php _e('STEP 3', 'Fiori') ?></p>
                </li>
            </ul>
        </div>
        <form action="<?= get_permalink(570) ?>">
            <div class="slider-wrap">
                <div class="swiper test-slider">
                    <div class="swiper-wrapper">

                        <?php
                        $terms = get_terms( [
                            'taxonomy' => 'pa_shape',
                            'hide_empty' => 1,
                        ] );
                        ?>

                        <?php if ($terms): ?>
                            <div class="swiper-slide">
                                <h3><?php _e('Choose the shape you like the most', 'Fiori') ?></h3>

                                <div class="chose-wrap chose-wrap-1">

                                    <?php foreach ($terms as $index => $term): ?>
                                        <div class="input-wrap">
                                            <input type="radio" name="pa_shape" id="test-1-<?= $index + 1 ?>" value="<?= $term->slug ?>">
                                            <label for="test-1-<?= $index + 1 ?>">

                                                <?php if ($field = get_field('icon', 'term_' . $term->term_id)): ?>
                                                    <span class="img">
                                                        <?= wp_get_attachment_image($field['ID'], 'full') ?>
                                                      </span>
                                                <?php endif ?>

                                                <?= mb_strtoupper($term->name) ?>
                                            </label>
                                        </div>
                                    <?php endforeach ?>

                                </div>
                                <div class="btn-wrap disabled">
                                    <a href="#" class="next-step btn-default"><?php _e('APPLY', 'Fiori') ?></a>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="swiper-slide">
                            <h3><?php _e('How much are you willing to spend?', 'Fiori') ?></h3>
                            <div class="chose-wrap chose-wrap-2">
                                <div class="input-wrap">
                                    <input type="radio" name="price" id="test-2-1" value="0-999" min-price="0" max-price="999">
                                    <label for="test-2-1">
                                        <span class="data">< $1000</span>
                                    </label>
                                </div>
                                <div class="input-wrap">
                                    <input type="radio" name="price" id="test-2-2" value="1000-2999" min-price="1000" max-price="2999">
                                    <label for="test-2-2">
                                        <span class="data">$1000</span>
                                        -
                                        <span class="data">$3000</span>
                                    </label>
                                </div>
                                <div class="input-wrap">
                                    <input type="radio" name="price" value="3000-4999" id="test-2-3" min-price="3000" max-price="">
                                    <label for="test-2-3">
                                        <span class="data">$3000</span>
                                        -
                                        <span class="data">$5000</span>
                                    </label>
                                </div>
                                <div class="input-wrap">
                                    <input type="radio" name="price" value="5000-1000000" id="test-2-4" min-price="5000" max-price="100000000000">
                                    <label for="test-2-4">
                                        <span class="data">> $5000</span>
                                    </label>
                                </div>
                            </div>
                            <div class="btn-wrap disabled">
                                <a href="#" class="next-step btn-default"><?php _e('APPLY', 'Fiori') ?></a>
                                <a href="#" class="back-slide"> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-22.svg" alt=""><?php _e('Back', 'Fiori') ?></a>
                            </div>
                        </div>

                        <?php
                        $terms = get_terms( [
                            'taxonomy' => 'pa_cut',
                            'hide_empty' => false,
                        ] );


                        ?>

                        <?php if ($terms): ?>
                            <div class="swiper-slide">
                                <h3><?php _e('What matters most to you?', 'Fiori') ?></h3>
                                <div class="chose-wrap chose-wrap-3">

                                    <?php foreach ($terms as $index => $term): ?>
                                        <div class="input-wrap">
                                            <input type="radio" name="pa_cut" id="test-3-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
                                            <label for="test-3-<?= $index + 1 ?>">

                                                <?php if ($field = get_field('icon', 'term_' . $term->term_id)): ?>
                                                    <span class="img">
                                                        <?= wp_get_attachment_image($field['ID'], 'full') ?>
                                                      </span>
                                                <?php endif ?>

                                                <?= $term->name ?>
                                            </label>
                                        </div>
                                    <?php endforeach ?>

                                    <div class="btn-wrap disabled">
                                        <button type="submit" class="final btn-default" id="diamonds_quiz_end"><?php _e('APPLY', 'Fiori') ?></button>
                                        <a href="#" class="back-slide"> <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-22.svg" alt=""><?php _e('Back', 'Fiori') ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
