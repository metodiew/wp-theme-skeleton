<?php

/**
 * Theme Styles
 */

function theme_styles() {
	wp_register_style(
		'theme-style',
		get_template_directory_uri() . '/style.css',
		'all'
	);

	// enqueing:
	wp_enqueue_style( 'theme-style' );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );


/**
 * Theme Scripts
*/

function theme_scripts() {
	wp_enqueue_script(
		'theme-main-js',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Default content Width
*/

if ( ! isset( $content_width ) ) {
	// Set your content width here
	$content_width = 960;
}


/**
 * Menus
 */

function register_theme_menus() {
	register_nav_menus(
		array(
		'header-menu' 	=> __( 'Header Menu', 'textdomain' )
	));
}

add_action( 'init', 'register_theme_menus' );


/**
 * Sidebar
 */

register_sidebar( array(
	'name' => __( 'Sidebar Name' ),
	'id' => 'sidebar-id',
	'description' => __( 'Widgets in this area will be shown on the sidebar.' ),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'
));


/**
 * Theme Support
 */

/* Featured Images */
add_theme_support( 'post-thumbnails' );

/* Feeds */
add_theme_support( 'automatic-feed-links' );
