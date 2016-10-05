<?php 
/*
Template Name: Search Page
*/
get_header(); 


// store the post type from the URL string
$post_type = ! empty( $_GET['post_type'] ) ? $_GET['post_type'] : '';

// check to see if there was a post type in the
// URL string and if a results template for that
// post type actually exists
if ( 'courses' === $post_type && locate_template( 'search-courses.php' ) ) {

  // if so, load that template
  get_template_part( 'search', 'courses' );

  // and then exit out
  exit;
}

//total results found
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<div class="search-info">
				<h1 class="search-title"><?php echo $total_results ?> Search Results for: <em><?php echo $s ?></em></h1>
			</div>
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>

					<article>

						<div id="course-print">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php echo the_excerpt();?>
					    </div>


					</article> <!-- .et_pb_post -->
			<?php
					endwhile;?>
					<br />

					<?php
					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			<!-- debug dump wp_query -->
			<pre>
				<?php print_r( $wp_query ); ?>
			</pre>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
