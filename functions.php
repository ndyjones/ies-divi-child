<?php 

/*
IES Divi Child Theme for ies.ncsu.edu
Description: Site specific code changes for ies.ncsu.edu
Author: ncjones4@ncsu.edu
*/

// Custom Function to include
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="http://www.ncsu.edu/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'favicon_link' );


// import parent style.css
add_action( 'wp_enqueue_scripts', 'theme_enqueue_parent_styles' );
function theme_enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// import child style, if a style.min.css file exists, use that, otherwise use style.css
/*add_action( 'wp_enqueue_scripts', 'style_or_min_style' );
function style_or_min_style() {
    $located = locate_template( 'style.min.css' );
     if ($located != '' ) {
          wp_enqueue_style( 'child-style', get_template_directory_uri() . '/style.min.css" />';
     } else {
          wp_enqueue_style( 'child-style', get_template_directory_uri().'/style.css" />';
     }
}*/

// show all course posts on any given course archive
add_action( 'pre_get_posts', function ( $q ) {
    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'courses' ) ) {
        $q->set( 'posts_per_page', -1 );
    }
});


// register custom course search shortcode
function ies_course_search_shortcode () {
    get_template_part( 'course', 'searchform' );
}

add_shortcode('ies_course_search', 'ies_course_search_shortcode');

// add async to front-end javascripts
function add_async_forscript ($url) {

    if ( FALSE === strpos($url, '.js') || is_admin() ||  strpos( $url, 'jquery.js' ) ) {
        return $url;
    } 
    return "$url' async='async";
}

add_filter('clean_url', 'add_async_forscript', 11, 1);



// Exclude AddThis from multiple IES CPTs
add_filter('addthis_post_exclude', 'addthis_post_exclude');

function addthis_post_exclude($display) {
global $post;
if( get_post_type($post->ID) ==  is_singular( array('courses','staff') ) ) {
$display = false;
return $display;
}
}


?>