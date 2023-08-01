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
<?php wp_footer(); ?>
</body>
</html>