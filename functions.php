<?php


add_theme_support('menus');
add_theme_support('post-thumbnails');


function stylesheet()
{
    wp_register_style('style', get_template_directory_uri() . '/assets/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'stylesheet');


function script()
{
  wp_register_script('customjs', get_template_directory_uri() . '/script.js', '', 1, true);
  wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'script');


register_nav_menus(
  array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
  )
);
