<?php
/**
 * Description: Front Page template
 *
 * @package    WordPress
 * @subpackage BlazeBase
 */
get_header(); ?>

  <div class="jumbotron">
    <div class="container">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

      <?php endwhile; endif; ?>
    </div>
  </div>

<?php get_footer(); ?>

  <!-- /END THE FEATURETTES -->
