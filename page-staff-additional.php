<?php
/*
Template Name: IES Staff Additional Page
*/

get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<article>
				<h1 class="main_title">Program Staff</h1>
				
				
				<div class="entry-content">
				<!-- Load Page Content -->
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
							the_content();

							wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
						?>
				<?php endwhile; ?>
				<div>&nbsp;</div>

				<!-- Additional Staff LOOP -->
				
					<?php $args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'staff',
								'posts_per_page' => -1,
								'meta_key'		=> 'staff_category',
								'meta_value'	=> 'additional',
								'orderby'		=> 'name',
								'order'			=> 'ASC'
							);

							// query
							$the_query = new WP_Query( $args );

						?>
						<?php if( $the_query->have_posts() ): ?>
							<ul class="ies_staff-list">
								<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<li>
										<?php the_title( '<h2 class="ies_staff-list"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); ?>
							        	<?php echo get_post_meta($post->ID, 'staff_title', true); ?></h2>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>

						<?php wp_reset_query();	 // Restore global post data stomped by the_post(). 
						?>
				<!-- end additional -->

				</div>

      	</article>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
