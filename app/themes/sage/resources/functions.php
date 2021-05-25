<?php

/**
* Do not edit anything in this file unless you know what you're doing
*/

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
* Helper function for prettying up errors
* @param string $message
* @param string $subtitle
* @param string $title
*/
$sage_error = function ($message, $subtitle = '', $title = '') {
  $title = $title ?: __('Sage &rsaquo; Error', 'sage');
  $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
  $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
  wp_die($message, $title);
};

/**
* Ensure compatible version of PHP is used
*/
if (version_compare('7.1', phpversion(), '>=')) {
  $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
* Ensure compatible version of WordPress is used
*/
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
  $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
* Ensure dependencies are loaded
*/
if (!class_exists('Roots\\Sage\\Container')) {
  if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
    $sage_error(
      __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
      __('Autoloader not found.', 'sage')
    );
  }
  require_once $composer;
}

/**
* Sage required plugins
*/
if ( file_exists(dirname( __DIR__ ) . '/app/activation.php') ) {
  require_once dirname( __DIR__ ) . '/app/activation.php';
}

/**
* Sage required files
*
* The mapped array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*/
array_map(function ($file) use ($sage_error) {
  $file = "../app/{$file}.php";
  if (!locate_template($file, true, true)) {
    $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
  }
}, ['helpers', 'setup', 'filters', 'admin', 'plugins', 'media', 'acf', 'gf', 'shortcodes', 'post-types']);



/**
* Here's what's happening with these hooks:
* 1. WordPress initially detects theme in themes/sage/resources
* 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
* 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
*
* We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
* But functions.php, style.css, and index.php are all still located in themes/sage/resources
*
* This is not compatible with the WordPress Customizer theme preview prior to theme activation
*
* get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
* get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
* locate_template()
* ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
* └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
*/
array_map(
  'add_filter',
  ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
  array_fill(0, 4, 'dirname')
);
Container::getInstance()
->bindIf('config', function () {
  return new Config([
    'assets' => require dirname(__DIR__).'/config/assets.php',
    'theme' => require dirname(__DIR__).'/config/theme.php',
    'view' => require dirname(__DIR__).'/config/view.php',
  ]);
}, true);

function mytheme_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Add class to next and previous links
function add_class_next_post_link($html){
  $html = str_replace('<a','<a class="next-post"',$html);
  return $html;
}

add_filter('next_post_link','add_class_next_post_link',10,1);
function add_class_previous_post_link($html){
  $html = str_replace('<a','<a class="prev-post"',$html);
  return $html;
}
add_filter('previous_post_link','add_class_previous_post_link',10,1);

//
///
///remove excerpt link to read more on blog posts
function custom_excerpt_more( $excerpt ) {
  return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/// Ensures all plugins
add_filter('wp_php_error_message',function( $message, $error ) {return
  '<h1>Something is wrong:</h1><br>
  Please contact your Web Admin for assistance: <br>Telephone: (000) 000-0000 <br> Website: BigRigMedia.com/support
  <br>
  <h1>If this is a Initial Theme Activation Error</h1> Please ensure all Required Plugins are installed. <ul><li>Advanced Custom Fields</li><li>Advanced Custom Fields RGBA Color Picker</li></ul>
  Please refere to your <a href="/wp/wp-admin/index.php">Dashboard</a> for more information.'

  ; }, 10,2);

//
///
///Include Exapnd button for guttenberg backend
add_action('admin_head', 'gutenberg_menu_expand');

function gutenberg_menu_expand() {
  echo '
  <a class="open-sidebar button button--primary" onclick="openWin()">Expand Toolbar</a>';
}


//
///
//// Remove stock blocks / Add Custom Blocks
add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
function misha_allowed_block_types( $allowed_blocks ) {
  return array(
    'acf/hero',
    'acf/rv-hero',
    'acf/full-col',
    'acf/two-col',
    'acf/col-builder',
    'acf/testimonials',
    'acf/home-sale',
    'acf/rates-a',
    'core/block' // add this for reusable block
  );
}
//
///
//// Registers Block Category for Gutenberg
function my_blocks_plugin_block_categories( $categories ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'general_blocks',
        'title' => __( 'General Blocks', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'hero_blocks',
        'title' => __( 'Hero', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'column_blocks',
        'title' => __( 'Columns', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'sale_blocks',
        'title' => __( 'Home For Sale', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'test_blocks',
        'title' => __( 'Testimonials', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'news_social_blocks',
        'title' => __( 'Newsletter Social', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'contact_blocks',
        'title' => __( 'Footer Contact Component', 'brm' ),
        'icon'  => 'wordpress',
      ),
    )
  );
}
add_filter( 'block_categories', 'my_blocks_plugin_block_categories', 10, 2 );


//// Includes and moves Property Number on WP Properry listing

add_filter('manage_homes-for-sale_posts_columns' , 'add_properties_columns');

function add_properties_columns($columns) {
  array_merge ( $columns, array (
    'listing_number' => __ ( 'Listing Number' )
  ) );
  $new = array();
  foreach($columns as $key => $title) {
    if ($key=='taxonomy-status') // Put the Thumbnail column before the Author column
    $new['listing_number'] = 'Listing Number';
    $new[$key] = $title;
  }
  return $new;
}

/*
* Add columns to Property post list
*/
function properties_custom_column ( $column, $post_id ) {
  switch ( $column ) {
    case 'listing_number':
    echo get_post_meta ( $post_id, 'listing_number', true );
    break;
  }
}
add_action ( 'manage_homes-for-sale_posts_custom_column', 'properties_custom_column', 10, 2 );
