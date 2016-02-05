<footer>
  <section class="container footer-top">
  <hr>
    <div class="row">
      <div class="col-sm-4">
        <?php if (dynamic_sidebar( 'footer-left' )); ?>
      </div>
      <div class="col-sm-4">
        <?php if (dynamic_sidebar( 'footer-mid' )); ?>
      </div>
      <div class="col-sm-4">
        <?php if (dynamic_sidebar( 'footer-right' )); ?>
      </div>
    </div>
  </section>
  <section class="container footer-bottom">
    <div class="row">
      <div class="col-sm-2">
        <p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>
      </div>
      <div class="col-sm-8">
        <?php
          $args = array(
            'menu' => 'footer menu',
            'menu_class' => 'nav',
            'container' => 'false',
          );
          wp_nav_menu($args);
          ?>
        </div>
      </div>
    </row>
  </section>
</footer>

</div><!-- /.container -->
<?php wp_footer(); ?>
</body>
</html>
