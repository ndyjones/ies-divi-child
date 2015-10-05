<?php 

/*
IES Divi Child Theme for ies.ncsu.edu
Description: Site specific code changes for ies.ncsu.edu
Author: ncjones4@ncsu.edu
*/

// Custom Function to Include
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="http://www.ncsu.edu/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'favicon_link' );


// import parent style.css
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'pre_get_posts', function ( $q ) {

    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'courses' ) ) {

        $q->set( 'posts_per_page', 12 );

    }

});

// add async to front-end javascripts
function add_async_forscript ($url) {

    if ( FALSE === strpos($url, '.js') || is_admin() ||  strpos( $url, 'jquery.js' ) ) {
        return $url;
    } 
    return "$url' async='async";
}

add_filter('clean_url', 'add_async_forscript', 11, 1);



?>