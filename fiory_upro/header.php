<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php if( have_rows('top_header', 'option') ): ?>

    <div class="black-line">
      <div class="content-width">

        <?php while( have_rows('top_header', 'option') ): the_row(); ?>

          <?php if (get_sub_field('link') || get_sub_field('text')): ?>
          <div class="item">

            <?php if (($field = get_sub_field('link')) && get_sub_field('type') == 'Link'): ?>
            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          <?php endif ?>

          <?php if (($field = get_sub_field('text')) && get_sub_field('type') == 'Text'): ?>
          <h6><?= $field ?></h6>
        <?php endif ?>

      </div>
    <?php endif ?>

  <?php endwhile; ?>

</div>
</div>

<?php endif; ?>

<header>

  <?php get_search_form() ?>

  <?php if (get_field('user_line_header', 'option')): ?>
    <div class="user-line">
      <div class="content-width">
        <div class="title">
          <div class="wrap">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7.svg" alt="">
          </div>

          <?php if ($field = get_field('user_line_header', 'option')['link']): ?>
            <div class="close-user-line">
              <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?><img src="<?= get_stylesheet_directory_uri() ?>/img/close-small.svg" alt=""></a>
            </div>
          <?php endif ?>

        </div>

        <?php if (get_field('user_line_header', 'option')['links']): ?>
          <div class="user-content">
            <ul>

              <?php foreach (get_field('user_line_header', 'option')['links'] as $item): ?>

                <?php if ($item['link']): ?>
                  <li>
                    <h6>
                      <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
                    </h6>

                    <?php if ($item['description']): ?>
                      <p>
                        <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['description'] ?></a>
                      </p>
                    <?php endif ?>

                  </li>
                <?php endif ?>

              <?php endforeach ?>

            </ul>
          </div>
        <?php endif ?>

      </div>
    </div>
  <?php endif ?>

  <div class="like-line">
    <?php woocommerce_mini_cart(); ?>
  </div>

  <div class="top-line">
    <div class="content-width">
      <div class="logo-line">
        <div class="left">
          <div class="nice-select0">
            <?= do_shortcode('[woo_multi_currency]') ?>
          </div>
        </div>

        <?php if ($field = get_field('logo_header', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>


        <div class="right ">

          <?php if (!is_user_logged_in()) { ?>
            <a href="<?= get_permalink(515) ?>">
              <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt="">
              Sign in
            </a>
          <?php } else { ?>
            <a href="<?= get_permalink(12) ?>">
              <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt="">
            </a>
          <?php } ?>
        </div>



      </div>
      <nav class="top-menu">
        <div class="btn-search">
          <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""><?php _e('Search', 'Fiori') ?></a>
        </div>

        <?php if( have_rows('menu_header', 'option') ): ?>

          <ul>

            <?php while( have_rows('menu_header', 'option') ): the_row(); ?>

              <li>

                <?php if ($field = get_sub_field('link')): ?>
                  <a href="<?= $field['url'] ?>"<?php if(get_sub_field('is_popup')) echo ' class="fancybox"' ?><?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                <?php endif ?>

                <?php if (get_sub_field('is_sub_menu') && have_rows('sub_menu')): ?>
                  <div class="sub-menu">
                    <div class="content-width">

                      <?php if ($field = get_sub_field('title')): ?>
                        <div class="title-wrap">
                          <h2><?= $field ?></h2>
                        </div>
                      <?php endif ?>

                      <div class="content">
                        <div class="wrap">

                          <?php while( have_rows('sub_menu') ): the_row(); ?>

                            <ul>

                              <?php if ($field = get_sub_field('title')): ?>
                                <li>
                                  <h6><?= $field ?></h6>
                                </li>
                              <?php endif ?>

                              <?php if( have_rows('menu') ): ?>
                                <?php while( have_rows('menu') ): the_row(); ?>

                                  <?php if ($link = get_sub_field('link')): ?>
                                    <li>
                                      <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>>

                                        <?php if ($icon = get_sub_field('icon')): ?>
                                          <div class="wrap-img">
                                            <?= wp_get_attachment_image($icon['ID'], 'full') ?>
                                          </div>
                                        <?php endif ?>

                                        <?php if (get_sub_field('is_bold')): ?>
                                          <b>
                                          <?php endif ?>

                                          <span><?= $link['title'] ?></span>

                                          <?php if (get_sub_field('is_bold')): ?>
                                          </b>
                                        <?php endif ?>

                                      </a>
                                    </li>
                                  <?php endif ?>

                                <?php endwhile; ?>
                              <?php endif; ?>

                            </ul>

                          <?php endwhile; ?>

                        </div>

                        <?php if( have_rows('gallery') ): ?>

                          <div class="img-wrap">

                            <?php while( have_rows('gallery') ): the_row(); ?>

                              <?php if (get_sub_field('image') || get_sub_field('text')): ?>
                              <div class="img">

                                <?php if ($field = get_sub_field('image')): ?>
                                  <figure>
                                    <?= wp_get_attachment_image($field['ID'], 'full') ?>
                                  </figure>
                                <?php endif ?>

                                <?php if ($field = get_sub_field('text')): ?>
                                  <p><?= $field ?></p>
                                <?php endif ?>

                              </div>
                            <?php endif ?>

                          <?php endwhile; ?>

                        </div>

                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              <?php endif ?>

            </li>

          <?php endwhile; ?>

        </ul>

      <?php endif; ?>

      <div class="btn-wrap right-btn">
        <a href="<?php the_permalink(380) ?>" class="btn-like"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""><span>1</span></a>
        <a href="#" class="btn-card"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt="">
          <span><?= WC()->cart->get_cart_contents_count() ?></span>
        </a>
      </div>
    </nav>
  </div>
</div>
<div class="mob-line">
  <div class="content-width">
    <div class="left">
      <div class="item item-1">
        <div class="open-menu">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
        <div class="calendar-wrap">
          <a href="#">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-14.svg" alt="">
          </a>
        </div>
      </div>
      <div class="item item-2">
        <div class="btn-search">
          <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""><?php _e('Search', 'Fiori') ?></a>
        </div>
      </div>
    </div>

    <?php if ($field = get_field('logo_mobile_header', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </a>
      </div>
    <?php endif ?>

    <div class="right">
      <div class="item item-1">
        <a href="#" class="btn-like"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""><span></span></a>
        <a href="#" class="btn-card"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt=""><span></span></a>
      </div>
      <div class="item item-2">
        <div class="nice-select">
          <span class="current">AED</span>
          <ul class="list">
            <li class="option selected">AED</li>
            <li class="option">USD</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
  <div class="top">

    <?php if ($field = get_field('logo_mobile_header', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </a>
      </div>
    <?php endif ?>

    <div class="open-menu-mob is-active">
      <a href="#">
        <img src="<?= get_stylesheet_directory_uri() ?>/img/close-small.svg" alt="">
      </a>
    </div>
  </div>
  <div class="wrap">
    <div class="item item-1">
      <div class="btn-search">
        <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt=""><?php _e('Search', 'Fiori') ?></a>
      </div>
      <div class="nice-select">
        <span class="current">AED</span>
        <ul class="list">
          <li class="option selected">AED</li>
          <li class="option">USD</li>
        </ul>
      </div>
    </div>

    <?php if( have_rows('menu_header', 'option') ): ?>

      <nav class="mob-menu">
        <ul>

          <?php while( have_rows('menu_header', 'option') ): the_row(); ?>

            <li>

              <?php if ($field = get_sub_field('link')): ?>
                <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
              <?php endif ?>

              <span></span>
              <div class="sub-menu">

                <?php if ($field = get_sub_field('title')): ?>
                  <h5><?= $field ?></h5>
                <?php endif ?>

                <?php if( have_rows('sub_menu') ): ?>

                  <ul>

                    <?php while( have_rows('sub_menu') ): the_row(); ?>

                      <?php if ($field = get_sub_field('title')): ?>
                        <li>
                          <h6><?= $field ?></h6>
                        </li>
                      <?php endif ?>

                      <?php if( have_rows('menu') ): ?>
                        <?php while( have_rows('menu') ): the_row(); ?>

                          <?php if ($link = get_sub_field('link')): ?>
                            <li>
                              <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>>

                                <?php if ($icon = get_sub_field('icon')): ?>
                                  <?= wp_get_attachment_image($icon['ID'], 'full') ?>
                                <?php endif ?>

                                <?php if (get_sub_field('is_bold')): ?>
                                  <b>
                                  <?php endif ?>

                                  <?= $link['title'] ?>

                                  <?php if (get_sub_field('is_bold')): ?>
                                  </b>
                                <?php endif ?>

                              </a>
                            </li>
                          <?php endif ?>

                        <?php endwhile; ?>
                      <?php endif; ?>

                    <?php endwhile; ?>

                  </ul>

                <?php endif; ?>

              </div>
            </li>

          <?php endwhile; ?>

        </ul>
      </nav>

    <?php endif; ?>

    <?php if( have_rows('links_mobile_1_header', 'option') ): ?>

      <div class="item item-2">
        <ul>

          <?php while( have_rows('links_mobile_1_header', 'option') ): the_row(); ?>

            <?php if ($link = get_sub_field('link')): ?>
              <li>
                <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>>

                  <?php if ($icon = get_sub_field('icon')): ?>
                    <?= wp_get_attachment_image($icon['ID'], 'full') ?>
                  <?php endif ?>

                  <?= $link['title'] ?>
                </a>
              </li>
            <?php endif ?>

          <?php endwhile; ?>

        </ul>
      </div>

    <?php endif; ?>

    <?php if( have_rows('links_mobile_2_header', 'option') ): ?>

      <div class="item item-3">
        <ul>

          <?php while( have_rows('links_mobile_2_header', 'option') ): the_row(); ?>

            <?php if ($link = get_sub_field('link')): ?>
              <li>
                <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
              </li>
            <?php endif ?>

          <?php endwhile; ?>

        </ul>
      </div>

    <?php endif; ?>

  </div>
</div>

<main>
