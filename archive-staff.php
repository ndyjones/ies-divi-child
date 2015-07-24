<?php
get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<article>
				<h1 class="main_title">IES Staff List</h1>
				
				
				<div class="entry-content">
				<!-- LEADERSHIP LOOP -->
				<div class="et-learn-more clearfix">
					<h3 class="heading-more">Leadership</h3>
					<?php $args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'staff',
								'meta_key'		=> 'staff_category',
								'meta_value'	=> 'leadership'
							);

							// query
							$the_query = new WP_Query( $args );

						?>
						<?php if( $the_query->have_posts() ): ?>
							<br />
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
				</div> <!-- end leadership -->
				
				<!-- RM LOOP -->
				<div class="et-learn-more clearfix">
					<h3 class="heading-more">Regional Managers</h3>
					<?php $args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'staff',
								'meta_key'		=> 'staff_category',
								'meta_value'	=> 'regional'
							);

							// query
							$the_query = new WP_Query( $args );

						?>
						<?php if( $the_query->have_posts() ): ?>
							<br />
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
				</div> <!-- end rms -->

				<!-- Improvement Specialists LOOP -->
				<div class="et-learn-more clearfix">
					<h3 class="heading-more">Improvement Specialists</h3>
					<?php $args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'staff',
								'meta_key'		=> 'staff_category',
								'meta_value'	=> 'improvement'
							);

							// query
							$the_query = new WP_Query( $args );

						?>
						<?php if( $the_query->have_posts() ): ?>
							<br />
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
				</div> <!-- end improvement -->

				<!-- Additional LOOP -->
				<div class="et-learn-more clearfix">
					<h3 class="heading-more">Additional Staff</h3>
					<?php $args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'staff',
								'meta_key'		=> 'staff_category',
								'meta_value'	=> 'additional'
							);

							// query
							$the_query = new WP_Query( $args );

						?>
						<?php if( $the_query->have_posts() ): ?>
							<br />
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
				</div> <!-- end additional -->

				</div>

      	</article>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
