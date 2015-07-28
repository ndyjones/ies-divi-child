<?php
 
get_header(); ?>

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

				<h1>All IES Courses</h1>
				<article>
					<div id="course-print">
				<?php

					 $args = array( 'post_type' => 'courses',
						
						'posts_per_page' => 30,
						'order' => 'ASC',
					 );
					 $the_courses = new WP_Query( $args );
					
					if ( $the_courses->have_posts() ) :


						echo '<ul id="ies_course_table">';
						while ( $the_courses->have_posts() ) : $the_courses->the_post();
							$ies_instructors = get_post_meta($post->ID, 'instructor', true);
							$rows = get_field('sessions');
							
							echo '<br /><li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							echo '<table id="ies_course_table">';

							if ($rows) {
								foreach($rows as $row) {
								  $loc_id = get_term_by('id', $row['location'], 'location');
								  $cost = $row['cost'];
								  $name_id = $loc_id->name;
								  $start_output = DateTime::createFromFormat('Ymd', $row['start_date'])->format('F d, Y');
								  $end_output = DateTime::createFromFormat('Ymd', $row['end_date'])->format('F d, Y');
								  $register_url = get_post_meta($post->ID, 'registration_link', true);
								  echo '<tr><td> Location: ' . $name_id . '</td><td> Date: ' . $start_output . '</td><td>Cost: ' . $cost . '</td></tr>';
								}
							}

							echo '</table>';

							
						endwhile;
						echo '</ul>';



					endif;
				?>

					</div>
				</article>



			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
