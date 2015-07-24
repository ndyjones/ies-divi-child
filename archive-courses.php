<?php
 
get_header(); ?>

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

				<h3>All upcoming Courses</h3>

				<!-- FILTER BY TAXO or CUSTOM FIELD OPTIONS -->

				<?php

				/* SOMEHOW GET $LOCATION via pulldown? */
				$LOCATION = 'slug';

				/*BUILD ARRAY by $LOCATION */
				$courseby_location = get_posts(array(
				  'post_type' => 'courses',
				  'numberposts' => -1,
				  'tax_query' => array(
				    array(
				      'taxonomy' => 'location',
				      'field' => 'slug',
				      'terms' => $LOCATION , // Where $LOCATION is loaded with slug
				      'include_children' => true //True because only region location values would have children; cities should be implicit
				    )
				  )
				));

				?>

				<p>OUTPUT SOME LINKS TO FILTER BY</p>

				<article>
				<?php

					 $args = array( 'post_type' => 'courses',
						
						'posts_per_page' => 20,
						'order' => 'ASC',
					 );
					 $the_courses = new WP_Query( $args );
					
					if ( $the_courses->have_posts() ) :


						echo '<ul>';
						while ( $the_courses->have_posts() ) : $the_courses->the_post();
							$ies_instructors = get_post_meta($post->ID, 'instructor', true);
							$rows = get_field('sessions');
							
							echo '<br /><li style="list-style-type: none;"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							echo '<table style="width:80%">';

							if ($rows) {
								foreach($rows as $row) {
								  $loc_id = get_term_by('id', $row['location'], 'location');
								  $name_id = $loc_id->name;
								  $start_output = DateTime::createFromFormat('Ymd', $row['start_date'])->format('F d, Y');
								  $end_output = DateTime::createFromFormat('Ymd', $row['end_date'])->format('F d, Y');
								  $register_url = get_post_meta($post->ID, 'registration_link', true);
								  echo '<tr><td> Location: ' . $name_id . '</td><td> Date: ' . $start_output . '</td><td>Cost: To be added&nbsp;</td></tr>';
								}
							}

							echo '</table>';

							
						endwhile;
						echo '</ul>';



					endif;
				?>


				</article>



			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
