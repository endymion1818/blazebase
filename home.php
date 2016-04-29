<?php
/**
 * Description: Blog listing template
 *
 * @package    WordPress
 * @subpackage BlazeBase
 */
get_header(); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">

        <header class="page-header">
          <h1><?php wp_title(''); ?></h1>
        </header>
        <article class="post-excerpt">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h2><a href="<?php the_permalink() ;?>"><?php the_title(); ?></a></h2>
          <p><em>
            By <?php the_author(); ?>
            on <?php echo the_time('l, F, jS Y') ;?>
            in <?php the_category(', '); ?>
          </em></p>
          <?php the_excerpt(); ?>
        </article>
        <hr>
      <?php endwhile; endif; ?>
    </div>
    <div class="col-sm-4">
      <?php get_sidebar( 'blog' ); ?>
    </div>
  </div>
  <div class="row">
    <nav class="pagination">
        <?php blaze_paginate($query); ?>
        <br class="clear" />
    </nav>
  </div>
</div>
<?php get_footer(); ?>

  <!-- /END THE FEATURETTES -->
