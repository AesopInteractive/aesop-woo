<?php
/**
*
*	Plugin Name: Aesop Woo
* 	Plugin URI:        https://github.com/aesopinteractive/aesop-woo
* 	Description:       Open-sourced suite of components that empower interactive storytelling.
* 	Version:           1.0
* 	Author:            Nick Haskins
* 	Author URI:        http://aesopstoryengine.com
* 	License:           GPL-2.0+
* 	License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* 	GitHub Plugin URI: https://github.com/aesopinteractive/aesop-woo
*   Github Branch:     dev
*/

/*
*
*	1. install aesop
*	2. Make Woo FullWidth - Settings--->Layout--->Main Layout--->Full Width (first option)
*	3. Add CSS to force 100% width
*/


// Set some constants
define('AESOP_WOO_VERSION', '1.0');
define('AESOP_WOO_DIR', plugin_dir_path( __FILE__ ));
define('AESOP_WOO_URL', plugins_url( '', __FILE__ ));

/**
*	Enqueue a stylesheet
*/
add_action('wp_enqueue_scripts', 'aesop_woo_assets');
function aesop_woo_assets(){

	wp_enqueue_style('aesop-woo-css', AESOP_WOO_URL.'/aesop-woo.css', AESOP_WOO_VERSION, true );
}

/**
*	Add extended style support for Aesop components
*/
add_action('after_setup_theme', 'aesop_woo_extended_styles');
function aesop_woo_extended_styles(){
	add_theme_support("aesop-component-styles", array("parallax", "image", "quote", "gallery", "content", "video", "audio", "collection", "chapter", "document", "character", "map", "timeline" ) );
}

/**
*
*	Filter the class that the chapter nav watches
*/
add_filter('aesop_chapter_scroll_container', 'aesop_woo_chapter_scroll_container');
function aesop_woo_chapter_scroll_container($class){

	$class = '.entry';

	return $class;
}

/**
*
*	Filter the class that the timeline watches
*/
add_filter('aesop_timeline_scroll_container', 'aesop_woo_timeline_scroll_container');
function aesop_woo_timeline_scroll_container($class){

	$class = '.entry';

	return $class;
}