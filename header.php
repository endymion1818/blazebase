<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php include('partial-favicons.php');?>
  </head>

    <?php wp_head(); ?>

  <body <?php body_class(); ?>>

    <section class="navbar-wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span>Toggle navigation </span>
                <div class="hamburger">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </div>
              </button>
              <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <img
                  src="<?php echo get_stylesheet_directory_uri(); ?>assets/img/logo.png"
                  srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg"
                  alt="<?php bloginfo('description'); ?>"
                >
              </a>
            </div>
            <nav id="navbar" class="navbar-collapse collapse">
              <?php
                $args = array(
                  'theme_location' => 'header',
                  'menu' => 'header menu',
                  'menu_class' => '',
                  'container' => 'false',
                  'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
                );
                wp_nav_menu($args);
                ?>
            </nav>
          </div>
        </nav>

      </div>
    </section>
