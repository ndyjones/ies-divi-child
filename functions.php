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

//add filter for gravity forms + salesforce plugin multi-select & picklist

add_filter('gf_salesforce_implode_glue', 'change_salesforce_implode_glue');

/**
 * Change the way the data is submitted to salesforce to force submission as multi picklist values.
 * @param  string $glue  ',' or ';'
 * @param  array $field The field to modify the glue for
 * @return string        ',' or ';'
 */
function change_salesforce_implode_glue($glue, $field) {

    // Change this to the Salesforce API Name of the field that's not being passed properly.
    $name_of_sf_field = 'ExampleMultiSelectPicklist__c';

    // If the field being checked is the Salesforce field that is being truncated, return ';'
    if($field['inputName'] === $name_of_sf_field || $field['adminLabel'] === $name_of_sf_field) {
        return ';';
    }

    // Otherwise, return default.
    return $glue;
}

//the events calenda oembed bug fix
/**
 * Avoid a problem with Events Calendar PRO 4.2 which can inadvertently
 * break oembeds.
 */
function undo_recurrence_oembed_logic() {
    if ( ! class_exists( 'Tribe__Events__Pro__Main' ) ) return;
 
    $pro_object   = Tribe__Events__Pro__Main::instance();
    $pro_callback = array( $pro_object, 'oembed_request_post_id_for_recurring_events' );
 
    remove_filter( 'oembed_request_post_id', $pro_callback );
}
 
add_action( 'init', 'undo_recurrence_oembed_logic' );



?>