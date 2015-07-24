<?php
/**
 * Template Name: Courses Archive View
 * Description: Template for displaying all Courses.
 */
 
get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<article>

				<h1>All upcoming Courses</h1>
				<p>This displays up to 20 Courses posts as a list.</p>
				
				<div class="entry-content">
				<!-- Load Page Content -->
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
							the_content();

							wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
						?>
				<?php endwhile; ?>
				<div>&nbsp;</div>

				<!-- Do the Loop Content -->

					<?php

						 $args = array( 'post_type' => 'courses',
						'order' => 'ASC',
						'posts_per_page' => 20,
						 ); ?>

					<?php $the_courses = new WP_Query( $args ); ?>
						
					<?php if ( $the_courses->have_posts() ) : ?>
							<ul>
							<?php while ( $the_courses->have_posts() ) : $the_courses->the_post();
								echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							endwhile; ?>
							</ul>



					<? endif; ?>



					</div>
				</article>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
