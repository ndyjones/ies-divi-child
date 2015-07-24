<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>
			<h1>

			<?php 

			if (function_exists('is_category') && is_category()) { 

				echo single_cat_title('Currently browsing '); 
				echo ' archives';

			} elseif (is_archive()) { 

				echo ' Archive - ';
				wp_title('');

			} elseif (is_search()) { 

				echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 

			} elseif (is_tax()) {

				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				echo $term->name . ' archives';

			} elseif (!(is_404()) && (is_single()) || (is_page())) { 

				wp_title(''); echo ' - '; 

			} elseif (is_404()) {

				echo 'Not Found - '; 

			}

			?>
			</h1>
			<br />
			<div class="entry-content">
				<ul>
				<?php $i = 1; while (have_posts() && $i < 11) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<li style="list-style-type: none; padding-bottom: 26px;">
						<a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>
						<?php
							the_excerpt();
						?>
						&nbsp;
						<a href="<?php the_permalink() ?>">Read more...</a>
						</li>
						<br />
					<?php
						if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
					?>

					</article> <!-- .et_pb_post -->
				<?php $i++; endwhile; ?>
				</ul>
				<div style="text-align:center;"><p><?php previous_posts_link(); ?>&nbsp;|&nbsp;<?php next_posts_link(); ?></p></div>
			</div> <!-- .entry-content -->
<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>