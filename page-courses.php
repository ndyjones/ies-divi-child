<?php
/**
 * Template Name: Custom Course Page
 * The custom page template file
 */

get_header(); ?>

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

				<h1>All IES Courses</h1>
				<article>
					<div id="course-print">
					<?php
					// set the "paged" parameter (use 'page' if the query is on a static front page)
    				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    				$offset = ( 12 * $paged ) - 12;
    				$max_pages = 999;

					$args = array( 'post_type' => 'courses',
						
						'posts_per_page' => 12,
						'paged' => $paged,
						'orderby' => 'menu_order title',
						'order' => 'ASC',
						'offset' => $offset,
					 );
					
					 $the_courses = new WP_Query( $args ); 

					
					
					if ( $the_courses->have_posts() ) :


						echo '<ul id="ies_course_table">';
						while ( $the_courses->have_posts() ) : $the_courses->the_post();
							$deliveryvalue = get_post_meta($post->ID, 'delivery', true);


							$ies_instructors = get_post_meta($post->ID, 'instructor', true);
							$rows = get_field('sessions');
							
							echo '<br /><li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							echo the_excerpt();
							echo '<table id="ies_course_table">';

							if ( $deliveryvalue == 'Online' ) {
								echo '<tr><td><strong>Online Course</strong> This course is delivered on-demand, electronically.</td></tr>';
							} else

							if ($rows) {
								foreach($rows as $row) {
									if ( $row['end_date'] < date('Ymd') ) {

												//date is past
									} else {
										$loc_id = get_term_by('id', $row['location'], 'location');
										$cost = $row['cost'];
										$name_id = $loc_id->name;
										$start_output = DateTime::createFromFormat('Ymd', $row['start_date'])->format('F d, Y');
										$end_output = DateTime::createFromFormat('Ymd', $row['end_date'])->format('F d, Y');
												 
										echo '<tr><td> Location: ' . $name_id . '</td><td> Date: ' . $start_output . '</td>';
										if ($row['cost'] == "0" ) {
											echo '<td>Cost: FREE </td></tr>';
										} else {
											echo '<td>Cost: $' . $cost . '</td></tr>'; 
										}
								  
									}
								}
							
							} else {
							
								echo '<tr><td>No upcoming dates.</td></tr>';
							}

							echo '</table>';

							
						endwhile;
						echo '</ul>'; ?>

						
					  



					<?php endif; ?>


					</div>

					<!-- pagination here -->
					    <div id="pagination" class="clearfix">
    						  <?php previous_posts_link( '« View previous Course results' ) ?> | <?php next_posts_link( 'View more Course results »' , $max_pages ); ?>
						</div>
					<?php wp_reset_postdata(); ?>
				</article>	
				




			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
