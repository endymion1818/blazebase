<?php
/**
 * Description: Front Page template
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
    <aside class="col-sm-4">
      <?php get_sidebar(); ?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>
