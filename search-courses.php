<?php 
/*
Template Name: Course Search Page
*/
get_header(); 

// Get data from URL into variables
if (isset($_GET['delivery'])) { $_delivery = $_GET['delivery']; } else { $_delivery = '';}
if (isset($_GET['location'])) { $_loc = $_GET['location']; } else { $_loc = '';}
if (isset($_GET['s'])) { $_keyword = $_GET['s']; } else { $_keyword = '';}
if (isset($_GET['post_type'])) { $_posttype = $_GET['post_type']; } else { $_post_type = 'courses';}

$total_results = $wp_query->found_posts;
$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$loc_args = array( 
	'tax_query' => array(
		array(
			'taxonomy' => 'location',
			'field'    => 'slug',
			'terms'    => $_loc,
		),
	),
);

if ( $_loc != '') { $merged_query_args = array_merge( $search_query, $loc_args );
} else { $merged_query_args = $search_query; }


$search = new WP_Query($search_query); //or $merged_query_args


 ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<div class="search-info">
				<h1 class="search-title">Course Search Results</h1>
				<p>Showing <?php echo $total_results ?> results for courses matching: <em><?php 
				if ($_keyword != '') echo $_keyword . ', ';
				if ($_delivery != '') echo  $_delivery . ', ';
				if ($_loc != '') echo  $_loc; ?></em></p>
			</div>
		<?php

			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$post_format = et_pb_post_format(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?> >

						<div id="course-print">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php echo the_excerpt();?>
					    </div>


					</article> <!-- .et_pb_post -->
			<?php
					endwhile;
					else : ?>
					<h3>There were no courses that matched your search criteria.</h3>
					<br />
					<?php endif;
					// Reset Post Data
					wp_reset_postdata();

/*					if ( function_exists( 'wp_pagenavi' ) ) :
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif; */
			?>

			<h5>Not what you're looking for? Return to the <strong><a href="https://www.ies.ncsu.edu/courses/">courses page</a></strong> or try another search:</h5>
			<!-- COURSES SEARCH FORM -->
			<?php get_template_part( 'course', 'searchform' ); ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>