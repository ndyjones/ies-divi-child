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


//WP Query Orderby Taxonomy Term Name 
// from https://gist.github.com/jayarnielsen/12f3a586900aa6759639

add_filter('posts_clauses', 'posts_clauses_with_tax', 10, 2);
function posts_clauses_with_tax( $clauses, $wp_query ) {
	global $wpdb;
	//array of sortable taxonomies
	$taxonomies = array('location', 'industry');
	if (isset($wp_query->query['orderby']) && in_array($wp_query->query['orderby'], $taxonomies)) {
		$clauses['join'] .= "
			LEFT OUTER JOIN {$wpdb->term_relationships} AS rel2 ON {$wpdb->posts}.ID = rel2.object_id
			LEFT OUTER JOIN {$wpdb->term_taxonomy} AS tax2 ON rel2.term_taxonomy_id = tax2.term_taxonomy_id
			LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
		";
		$clauses['where'] .= " AND (taxonomy = '{$wp_query->query['orderby']}' OR taxonomy IS NULL)";
		$clauses['groupby'] = "rel2.object_id";
		$clauses['orderby']  = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
		$clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
	}
	return $clauses;
}