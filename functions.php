<?php
/**
 * 11:11 functions and definitions
 *
 * @link https://developer.wordpress.org/
 *
 * @package WordPress
 * @subpackage 11:11
 * @since 11:11 1.0
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
/**
 *Functions load of scripts.
*/
function load_scripts(){
   wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), '4.5.0', true);
   wp_enqueue_script( 'modalvideo-js', get_template_directory_uri( ) . '/assets/js/jquery-modal-video.min.js', array('jquery'), '', true);
   wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0', 'all' );
   wp_enqueue_style( 'animation-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.compat.min.css', array(), '4.1.0', 'all' );
   wp_enqueue_style( 'modalvideo-css', get_template_directory_uri( ) . '/assets/css/modal-video.min.css', array(), '', 'all' );
   wp_enqueue_style( 'template', get_template_directory_uri( ) . '/assets/css/template.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );


/* Function for theme configuration */
function wp_1111_config(){

   /* Registrando o menu*/
   register_nav_menus( 
      array(
         'my_main_menu' => 'Main Menu'
      )
   );

   add_theme_support( 'title-tag' );
   add_theme_support( 'custom-logo', array(
      'height' => 80,
      'width'  => 106,
   ) );
   
   $args = array(
      'height' => 255,
      'width'  => 1920
   );
   add_theme_support( 'custom-header', $args );
   add_theme_support( 'post-thumbnails' );
   add_theme_support( 'post-formats', array( 'video', 'image' ) );

 }
add_action( 'after_setup_theme', 'wp_1111_config', 0 );

/*function foogallery_links_no_lightbox($attr, $args, $foogallery_attachment) {
   if ( ! isset( $attr[ 'class' ] ) ) {
       $attr[ 'class' ] = 'js-video-button';
   } else {
       $attr[ 'class' ] .= 'js-video-button';
   }
   return $attr;
}

add_filter( 'foogallery_attachment_html_link_attributes', 'foogallery_links_no_lightbox', 10, 3 );*/

function remove_alt_attributes( $attr, $args, $foogallery_attachment ) {
	if ( array_key_exists( 'title', $attr ) ) {
		unset( $attr['title'] );
	}
	
	return $attr;
}


add_filter('foogallery_attachment_html_image_attributes', 'remove_alt_attributes', 10, 3 );