<?php 
/*
Template Name: Search Page
*/
get_header(); 


// store the post type from the URL string
$post_type = $_GET['post_type'];

// check to see if there was a post type in the
// URL string and if a results template for that
// post type actually exists
if ( isset( $post_type ) && locate_template( 'search-' . $post_type . '.php' ) ) {

  // if so, load that template
  get_template_part( 'search', $post_type );
  
  // and then exit out
  exit;
}


// Get data from URL into variables
if (isset($_GET['delivery'])) { $_delivery = $_GET['delivery']; } else { $_delivery = '';}
if (isset($_GET['s'])) { $_keyword = $_GET['s']; } else { $_keyword = 'Blank';}
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);

global $wp_query;
$total_results = $wp_query->found_posts;

$args = array(
	'base'               => '%_%',
	'format'             => '?paged=%#%',
	'total'              => 1,
	'current'            => 0,
	'show_all'           => false,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __('« Previous'),
	'next_text'          => __('Next »'),
	'type'               => 'plain',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''
); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<div class="search-info">
				<h1 class="search-title"><?php echo $total_results ?> Search Results for: <em><?php echo $s ?></em></h1>
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
					endwhile;?>
					<br />
					<?php echo paginate_links( $args ); ?><br />
					<?php
					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>