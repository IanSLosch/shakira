<?php
/**
 *
 */

function theme_setup() 
{

	// Set content-width.
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1200;
	}

	$theme_supports = array(
		'html5' => array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'),
		'title-tag' => '',
		'post-thumbnails' => '',
		'responsive-embeds' => '',
		'align-wide' => '',
		'editor-styles' => '',
		'wp-block-styles' => ''
	);

	foreach ($theme_supports as $theme_support => $args) {
		if (!empty($args) && is_array($args)) {
			add_theme_support($theme_support, $args);
		} else {
			add_theme_support($theme_support);
		}
	}

	register_nav_menu('navbar-menu', __('Navbar Menu', '45p-theme'));
	register_nav_menu('footer-menu', __('Footer Menu', '45p-theme'));

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(
			array(
				'page_title' => 'Site Options',
				'menu_title' => 'Site Options',
				'menu_slug' => 'site_options',
				'capability' => 'manage_options',
				'redirect' => false
			)
		);
	}
}

add_action('after_setup_theme', 'theme_setup');

/**
 * Enqueue Scripts
 *
 * @return void
 */
function theme_scripts()
{
	wp_enqueue_style('45p-theme', get_template_directory_uri() . '/dist/css/style.min.css', [

	], null);
	wp_enqueue_script('jquery');

	wp_enqueue_script('45p-theme', get_template_directory_uri() . '/dist/js/bundle.min.js', [
		'jquery',
	], null, true);

	wp_localize_script('45p-theme', 'wp', array(
		'ajax_url' => admin_url('admin-ajax.php')
	)
	);
}

add_action('wp_enqueue_scripts', 'theme_scripts');

function get_youtube_id($youtube_url)
{
	preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $youtube_url, $matches);
	return $matches[0];
}
