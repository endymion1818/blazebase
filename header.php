<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php get_template_part('partial/favicons.php');?>
  </head>

    <?php wp_head(); ?>

  <body <?php body_class(); ?>>

    <section class="navbar-wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
              </button>
              <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <img
                  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-header.png"
                  srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-header.svg"
                  alt="<?php bloginfo('description'); ?>"
                  width="200"
                  height="auto"
                >
              </a>
              <nav id="navbar" class="navbar-collapse collapse">
                <?php
                  $args = array(
                    'theme_location' => 'header',
                    'menu' => 'Header Menu', // make sure your menu is named identically
                    'menu_class' => '',
                    'container' => 'false',
                    'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
                  );
                  wp_nav_menu($args);
                  ?>
              </nav>
            </div>
          </div>
        </nav>

      </div>
    </section>
