<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
* Theme assets
*/
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
  wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  wp_enqueue_script('sage/slick.min.js', get_stylesheet_directory_uri() . '/assets/scripts/slick.min.js', ['jquery'], null, true);
  //wp_enqueue_style('sage/shame.css', get_stylesheet_directory_uri() . '/assets/shame/shame.css', false, null);
  //wp_enqueue_script('sage/shame.js', get_stylesheet_directory_uri() . '/assets/shame/shame.js', ['jquery'], null, true);
  wp_enqueue_script('sage/filter.js', get_stylesheet_directory_uri() . '/assets/scripts/filter.js', ['jquery'], null, true);


}, 100);

/**
* Preload Stylesheet files
*/
add_action('style_loader_tag', function($html, $handle, $href, $media) {
  $styles = [
    'sage/main.css'
  ];

  if (in_array($handle, $styles)) {
    return '<link rel="preload" href="'.$href.'" as="style">
    <link rel="stylesheet" href="'.$href.'" media="'.$media.'">';
  } else {
    return $html;
  }
}, 10, 4);

/**
* Defer JavaScript files
*/
add_action('script_loader_tag', function($tag, $handle, $src) {
  $scripts = [
    'sage/main.js',
    'sage/shame.js',
  ];

  if (in_array($handle, $scripts)) {
    return '<script src="'.$src.'" defer></script>';
  }

  return $tag;
}, 10, 3);

/**
* Theme setup
*/
add_action('after_setup_theme', function () {
  /**
  * Enable features from Soil when plugin is activated
  * @link https://roots.io/plugins/soil/
  */
  add_theme_support('soil-clean-up');
  //add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-relative-urls');

  /**
  * Enable plugins to manage the document title
  * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
  */
  add_theme_support('title-tag');

  /**
  * Register navigation menus
  * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
  */

  register_nav_menus([
    'footer_navigation_c' => __('Footer', 'sage')
  ]);


  /// Header Type B
  register_nav_menus([
    'primary_type_b_left' => __('Left Navigation Type B', 'sage')
  ]);

  register_nav_menus([
    'primary_type_b_right' => __('Right Navigation Type B', 'sage')
  ]);


  /**
  * Enable post thumbnails
  * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  */
  add_theme_support('post-thumbnails');

  /**
  * Enable HTML5 markup support
  * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
  */
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  /**
  * Enable selective refresh for widgets in customizer
  * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
  */
  add_theme_support('customize-selective-refresh-widgets');

  /**
  * Use main stylesheet for visual editor
  * @see resources/assets/styles/layouts/_tinymce.scss
  */
  add_theme_support('editor-styles');
  add_editor_style(asset_path('styles/main.css'));
  wp_enqueue_script('sage/shame.js', get_stylesheet_directory_uri() . '/assets/shame/shame.js', ['jquery'], null, true);
}, 20);





/**
* Register sidebars
*/
add_action('widgets_init', function () {
  $config = [
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ];
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
      'name'          => __('Footer', 'sage'),
      'id'            => 'sidebar-footer'
      ] + $config);
    });

    /**
    * Updates the `$post` variable on each iteration of the loop.
    * Note: updated value is only available for subsequently loaded views, such as partials
    */
    add_action('the_post', function ($post) {
      sage('blade')->share('post', $post);
    });

    /**
    * Setup Sage options
    */
    add_action('after_setup_theme', function () {
      /**
      * Add JsonManifest to Sage container
      */
      sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
      });

      /**
      * Add Blade to Sage container
      */
      sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
          wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
      });

      /**
      * Create @asset() Blade directive
      */
      sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
      });
    });
