<?php
// this theme is translateable
load_theme_textdomain( 'EchBase', get_template_directory() . '/languages' );

// CSS
function theme_styles() {
  // local styles
  wp_enqueue_style('theme_css', get_template_directory_uri() . '/assets/css/styles.min.css');
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

// JavaScript
function theme_js() {

  // Conditionals for legacy IE browsers
  global $wp_scripts;

  wp_register_script('html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
  wp_register_script('respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

  $wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
  $wp_scripts->add_data('respond_js', 'conditional', 'lt IE 9');

  // Theme JS and jQuery
    wp_enqueue_script('theme_critical_js', get_template_directory_uri() . '/assets/js/project-criticalscripts.min.js', array('jquery'), '', true);

    // non-critical scripts enqueued in the footer using Javascript

}
add_action('wp_enqueue_scripts', 'theme_js');


// Add SVG capabilities

function blaze_svg_mime_type( $mimes = array() ) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'blaze_svg_mime_type' );

// Turn off Contact Form 7 styles
add_filter( 'wpcf7_load_css', '__return_false' );

// Additional menus

add_theme_support('menus');

function register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'footer-menu' => __('Footer Menu')
    )
  );
}
add_action('init', 'register_theme_menus');

// Turns on featured image option in custom post types
function blaze_theme_images() {
  add_theme_support( 'post-thumbnails' );
  // Custom image sizes
  // add_image_size( 'testimonialimage', 56, 56, true );
}
add_action( 'after_setup_theme', 'blaze_theme_images' );


// Breadcrumbs - see https://github.com/rachelbaker/bootstrapwp-Twitter-Bootstrap-for-WordPress

function bootstrapwp_breadcrumbs() {
	$home   = 'Home'; // text for the 'Home' link
	$before = '<li class="active">'; // tag before the current crumb
	$after  = '</li>'; // tag after the current crumb

	// return early for home.
	if ( is_home() && is_front_page() ) {
		return;
	}

	echo '<ol class="breadcrumb">';

	global $post, $wp_query;

	$homeLink = esc_url( home_url() );

	echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ';

	if ( is_category() ) {
		$cat_obj   = $wp_query->get_queried_object();
		$thisCat   = $cat_obj->term_id;
		$thisCat   = get_category( $thisCat );
		$parentCat = get_category( $thisCat->parent );
		if ( $thisCat->parent != 0 ) {
			echo get_category_parents( $parentCat, true );
		}
		echo $before . 'Archive by category "' . single_cat_title( '', false ) . '"' . $after;
	}
	elseif ( is_day() ) {
		echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time(
				'Y'
			) . '</a></li> ';
		echo '<li><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time(
				'F'
			) . '</a></li> ';
		echo $before . get_the_time( 'd' ) . $after;
	}
	elseif ( is_month() ) {
		echo '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time(
				'Y'
			) . '</a></li> ';
		echo $before . get_the_time( 'F' ) . $after;
	}
	elseif ( is_year() ) {
		echo $before . get_the_time( 'Y' ) . $after;
	}
	elseif ( is_single() && ! is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object( get_post_type() );
			$slug      = $post_type->rewrite;
			echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
			echo $before . get_the_title() . $after;
		}
		else {
			$cat = get_the_category();
			$cat = $cat[0];
			echo '<li>' . get_category_parents( $cat, true, '' ) . '</li>';
			echo $before . get_the_title() . $after;
		}
	}
	elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
		$post_type = get_post_type_object( get_post_type() );
		echo $before . $post_type->labels->singular_name . $after;
	}
	elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat    = get_the_category( $parent->ID );
		$cat    = $cat[0];
		echo get_category_parents( $cat, true, '' );
		echo '<li><a href="' . get_permalink(
				$parent
			) . '">' . $parent->post_title . '</a></li> ';
		echo $before . get_the_title() . $after;

	}
	elseif ( is_page() && ! $post->post_parent ) {
		echo $before . get_the_title() . $after;
	}
	elseif ( is_page() && $post->post_parent ) {
		$parent_id   = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page          = get_page( $parent_id );
			$breadcrumbs[] = '<li><a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';
			$parent_id     = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		foreach ( $breadcrumbs as $crumb ) {
			echo $crumb;
		}
		echo $before . get_the_title() . $after;
	}
	elseif ( is_search() ) {
		echo $before . 'Search results for "' . get_search_query() . '"' . $after;
	}
	elseif ( is_tag() ) {
		echo $before . 'Posts tagged "' . single_tag_title( '', false ) . '"' . $after;
	}
	elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata( $author );
		echo $before . 'Articles posted by ' . $userdata->display_name . $after;
	}
	elseif ( is_404() ) {
		echo $before . 'Error 404' . $after;
	}

	echo '</ol>';
}


// Pagination

function blaze_paginate($query = '') {

    global $wp_query;
    if(isset($query)) {
        $total = $query->max_num_pages;
    } else {
        $total = $wp_query->max_num_pages;
    }
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $total,
                'prev_next' => true,
                'type' => 'list'
        ) );

}

// Remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// REMOVE ALL THE comments
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

?>
