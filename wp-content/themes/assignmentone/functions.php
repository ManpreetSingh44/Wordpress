<?php
function mychildtheme_theme_setup() {
  register_nav_menus( array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
  ) );
}
add_action( 'after_setup_theme', 'mychildtheme_theme_setup' );
// Add Featured image support to our posts
add_theme_support( 'post-thumbnails' );
?>