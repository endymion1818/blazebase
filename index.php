<?php
/**
 * Description: Catch all template
 *
 * @package    WordPress
 * @subpackage BlazeBase
 */
get_header(); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <header class="page-header">
            <h1><?php the_title(); ?></h1>
          </header>
          <?php the_content(); ?>

        <?php endwhile; endif; ?>
    </div>
    <div class="col-sm-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
