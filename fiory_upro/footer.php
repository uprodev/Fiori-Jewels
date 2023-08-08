</main>

<footer>
  <div class="content-width">

    <?php if ($field = get_field('logo_footer', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </a>
      </div>
    <?php endif ?>

    <nav class="footer-menu">

      <?php $locations = get_nav_menu_locations() ?>
      <?php if ($locations): ?>
        <div class="menu">

          <?php foreach ($locations as $index => $footer_menu): ?>

            <?php if (str_contains($index, 'footer')): ?>

              <?php wp_nav_menu( array(
                'theme_location'  => $index,
                'container'       => '',
                'items_wrap'      => '<ul class="footer__menu"><li><h6>' . wp_get_nav_menu_object($locations[$index])->name . '</h6></li>%3$s</ul>'
              ) ); ?>

            <?php endif ?>

          <?php endforeach ?>

        </div>
      <?php endif ?>

      <?php if (get_field('form_footer', 'option')['form']): ?>
        <div class="form-block">

          <?php if ($field = get_field('form_footer', 'option')['title']): ?>
            <h3><?= $field ?></h3>
          <?php endif ?>
          
          <?php if ($field = get_field('form_footer', 'option')['text']): ?>
            <?= $field ?>
          <?php endif ?>
          
          <?php if ($field = get_field('form_footer', 'option')['form']): ?>
            <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="form-subscribe"]') ?>
          <?php endif ?>
          
        </div>
      <?php endif ?>
      
    </nav>

    <?php if ($field = get_field('copyright_footer', 'option')): ?>
      <div class="bottom">
        <p><?= $field ?></p>
      </div>
    <?php endif ?>
    
  </div>
</footer>

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
    <form action="#">
      <div class="slider-wrap">
        <div class="swiper test-slider">
          <div class="swiper-wrapper">

            <?php 
            $terms = get_terms( [
              'taxonomy' => 'pa_shape',
              'hide_empty' => false,
            ] ); 
            ?>

            <?php if ($terms): ?>
              <div class="swiper-slide">
                <h3><?php _e('Choose the shape you like the most', 'Fiori') ?></h3>

                <div class="chose-wrap chose-wrap-1">

                  <?php foreach ($terms as $index => $term): ?>
                    <div class="input-wrap">
                      <input type="radio" name="test-1" id="test-1-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
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
                  <input type="radio" name="test-2" id="test-2-1" min-price="0" max-price="999">
                  <label for="test-2-1">
                    <span class="data">< $1000</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <input type="radio" name="test-2" id="test-2-2" min-price="1000" max-price="2999">
                  <label for="test-2-2">
                    <span class="data">$1000</span>
                    -
                    <span class="data">$3000</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <input type="radio" name="test-2" id="test-2-3" min-price="3000" max-price="4999">
                  <label for="test-2-3">
                    <span class="data">$3000</span>
                    -
                    <span class="data">$5000</span>
                  </label>
                </div>
                <div class="input-wrap">
                  <input type="radio" name="test-2" id="test-2-4" min-price="5000" max-price="100000000000">
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
              'taxonomy' => 'pa_importance',
              'hide_empty' => false,
            ] ); 
            ?>

            <?php if ($terms): ?>
              <div class="swiper-slide">
                <h3><?php _e('What matters most to you?', 'Fiori') ?></h3>
                <div class="chose-wrap chose-wrap-3">

                  <?php foreach ($terms as $index => $term): ?>
                    <div class="input-wrap">
                      <input type="radio" name="test-3" id="test-3-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
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

<?php wp_footer(); ?>
</body>
</html>