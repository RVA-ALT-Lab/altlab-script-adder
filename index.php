<?php 
/*
Plugin Name: ALT Lab add script - make custom field named extra-script and write js as normal with <script></script> tags
Plugin URI:  https://github.com/
Description: For stuff that's magical
Version:     1.0
Author:      ALT Lab
Author URI:  http://altlab.vcu.edu
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function load_script_post_body($content){
	global $post;
	if(get_post_meta( $post->ID, 'extra-script' )){
		$script = get_post_meta( $post->ID, 'extra-script', true );	
		return $content . $script;	
	} else {
		return $content;
	}
}

add_filter( 'the_content', 'load_script_post_body' );

//SHOW HIDDEN CUSTOM FIELDS
add_filter( 'is_protected_meta', '__return_false', 999 );


//ACF allow us to see custom fields in editor view
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
