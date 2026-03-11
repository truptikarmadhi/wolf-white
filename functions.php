<?php
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Theme setting',
      'menu_title' => 'Theme setting',
      'menu_slug' => 'theme-setting',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}

// case_studies
add_action('init', 'case_studies');
function case_studies()
{
  register_post_type(
    'case_studies',
    array(
      'labels' => array(
        'name' => __("Case studies", 'textdomain'),
        'singular_name' => __("Case studies", 'textdomain'),
        'add_new' => __("Add case study"),
        'add_new_item' => __("Add case study"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'case_study', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
  register_taxonomy(
    'case_studies_cat',
    'case_studies',
    array(
      'labels' => array(
        'name'              => 'Case studies category',
        'singular_name'     => 'Case studies category',
        'search_items'      => 'Search Case studies category',
        'all_items'         => 'All Case studies category',
        'parent_item'       => 'Parent category Group',
        'parent_item_colon' => 'Parent category Group:',
        'edit_item'         => 'Edit Case studies category',
        'update_item'       => 'Update Case studies category',
        'add_new_item'      => 'Add New Case studies category',
        'new_item_name'     => 'New Case studies category Name',
        'menu_name'         => 'Case studies category',
        'back_to_items'     => '← Go to Case studies category'
      ),
      'hierarchical'      => true,
      'public'            => true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_rest'      => true,
      'rewrite'           => array('slug' => 'case-studies-cat'),
    )
  );
}


add_action('init', 'services');
function services()
{
  register_post_type(
    'services',
    array(
      'labels' => array(
        'name' => __("Services", 'textdomain'),
        'singular_name' => __("Services", 'textdomain'),
        'add_new' => __("Add service"),
        'add_new_item' => __("Add service"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'service', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
}


add_action('init', 'teams');
function Teams()
{
  register_post_type(
    'teams',
    array(
      'labels' => array(
        'name' => __("Teams", 'textdomain'),
        'singular_name' => __("Teams", 'textdomain'),
        'add_new' => __("Add team"),
        'add_new_item' => __("Add team"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'team', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
}


add_filter('wpcf7_autop_or_not', '__return_false');

add_image_size( 'gallery-thumb', 400, 0, true );
add_image_size( 'medium', 1200, 0, true );
add_image_size( 'fullscreen', 2700, 0, true );


function enqueue_custom_scripts() {

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'custom-ajax',
        get_template_directory_uri() . '/resources/assets/scripts/parts/handlebar.js',
        ['jquery'],
        '1.0',
        true
    );

    wp_localize_script('custom-ajax', 'ajax_params', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// Case Study
function load_case()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'case_studies',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
  ];

   if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'case_studies_cat',
        'field' => 'slug',
        'terms' => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $cases = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $case_id = get_the_ID();

      $categories = get_the_terms($case_id, 'case_studies_cat');
      $category_data = [];

      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $cat) {
          $category_data[] = [
            'name' => $cat->name,
            'slug' => $cat->slug,
          ];
        }
      }

      $cases[] = [
        'link'               => get_permalink($case_id),
        'image'              => get_the_post_thumbnail_url($case_id, 'medium_large'),
        'title'              => get_the_title(),
        'content'            => get_the_excerpt($case_id),
        'categories'         => $category_data,
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success([
    'posts' => $cases,
  ]);
}

add_action('wp_ajax_load_case', 'load_case');
add_action('wp_ajax_nopriv_load_case', 'load_case');



// Service
function load_services()
{
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'services',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
  ];

  $query = new WP_Query($args);
  $services = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $service_id = get_the_ID();
      

      $services[] = [
        'link'               => get_permalink($service_id),
        'image'              => get_the_post_thumbnail_url($service_id, 'medium_large'),
        'title'              => get_the_title(),
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success([
    'posts' => $services,
  ]);
}

add_action('wp_ajax_load_services', 'load_services');
add_action('wp_ajax_nopriv_load_services', 'load_services');


// Posts
function load_posts()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : -1;

  $args = [
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
  ];

 if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $news = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_id = get_the_ID();

      $categories = get_the_terms($post_id, 'category');
      $category_data = [];

      $news_group = get_field('news_group', $post_id);

      $reading_time = '';
      if(!empty($news_group)){
          $reading_time = get_full_group_reading_time($news_group);
      }

      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $cat) {
          $category_data[] = [
            'name' => $cat->name,
            'slug' => $cat->slug,
          ];
        }
      }

      $news[] = [
        'link'               => get_permalink($post_id),
        'image'              => get_the_post_thumbnail_url($post_id, 'medium_large'),
        'title'              => get_the_title($post_id),
        'content'            => get_the_excerpt($post_id),
        'categories'         => $category_data,
        'reading_time'       => $reading_time,
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success([
    'posts' => $news,
  ]);
}

add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');


function get_full_group_reading_time($data) {

    $text = '';

    // Recursive function
    $extract_text = function($value) use (&$extract_text, &$text) {

        if (is_array($value)) {
            foreach ($value as $item) {
                $extract_text($item);
            }
        } elseif (is_string($value)) {
            $text .= ' ' . $value;
        }
    };

    $extract_text($data);

    // Clean content
    $text = do_shortcode($text);
    $word_count = str_word_count(strip_tags($text));

    $reading_time = ceil($word_count / 200);

    return max(1, $reading_time);
}


add_filter('wpcf7_autop_or_not', '__return_false');
require_once get_template_directory() . '/url-embed-function.php';