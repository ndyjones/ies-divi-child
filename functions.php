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

