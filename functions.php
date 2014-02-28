<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

require_once('opciones.php');
require_once('wp_bootstrap_navwalker.php');

define ( 'TEMPPATH', get_bloginfo('stylesheet_directory') );
define ( 'IMAGES', TEMPPATH. "/img" );

add_theme_support ('nav-menus');
add_theme_support('automatic-feed-links');
add_theme_support ('post-thumbnails');
add_action('init', 'im_pagination'); //

add_image_size('large', 800, '', 330); // Thumbnail Grande
add_image_size('medium', 400, '', true); // Thumbnail Medio
add_image_size('small', 150, '', true); // Thumbnail Chico
add_image_size('custom-size', 800, 330, true); // Thumbnail Customizado - Indicar el tamaño con: the_post_thumbnail('custom-size');


if (function_exists('register_nav_menus'));
	register_nav_menus( array(
			'main' => 'Main nav'
	) );


if ( function_exists('register_sidebar'))
	register_sidebars ( array(
	'name' 			=> __('Primary Sidebar', 'primary-sidebar'),
	'id'   			=> 'primary-widget-area',
	'description'	=> __('The primary widget area', 'dir'),
	'before_widget' => '<div class="widget>',
	'after_widget'	=> '</div>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
	)
);

function im_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'    => '?paged=%#%',
        'current'   => 0,
        'show_all'  => True,
        'prev_next'    => True,
        'prev_text' => __('&larr;'),
        'next_text' => __('&rarr;'),
        'type'      => 'list',
        'total'     => $wp_query->max_num_pages
    ));
}

function wp_im_bootstrap_pagination( $query=null ) {

  global $wp_query;

  $query = $query ? $query : $wp_query;

  $big = 999999999;

  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );
  if ($query->max_num_pages > 1) :
?>
<ul class="pagination">
  <?php
  foreach ( $paginate as $page ) {
    echo '<li>' . $page . '</li>';
  }
  ?>
</ul>
<?php
  endif;
}

function remove_admin_bar() {
    return false;
}

function im_bootstrap_nav() {
    wp_nav_menu( array(

		'theme_location'  => '',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
		'depth'           => 0,
      	'walker' => new wp_bootstrap_navwalker())
    );
}

function im_wp_excerpt_index($length) {
    return 60;
}

function im_custom_post($length) {
    return 40;
}

function im_wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}
?>



