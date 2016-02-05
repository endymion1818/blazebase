<?php
/**
 * Template name: Full Width Page Template
 *
 * @package    WordPress
 * @subpackage BlazeBase
 */
get_header(); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>
          <?php the_content(); ?>

        <? endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>

  <!-- /END THE FEATURETTES -->
