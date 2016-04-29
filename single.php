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

        <? endwhile; endif; ?>
    </div>
    <aside class="col-sm-4">
      <!-- Ideally this should be empty to aid user concentration -->
    </aside>
  </div>
</div>
<?php get_footer(); ?>

  <!-- /END THE FEATURETTES -->
