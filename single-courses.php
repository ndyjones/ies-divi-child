<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<h1><?php the_title(); ?></h1>
					
					<div class="entry-content">
						<h4>Course Details:</h4>
					<?php
						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>

				</div>
			<!-- .entry-content -->

					<?php
					if ( et_get_option('divi_468_enable') == 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') <> '' ) echo( et_get_option('divi_468_adsense') );
						else { ?>
							<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div> <!-- .et-single-post-ad -->';
					}
				?>

					<?php
						if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) )
							comments_template( '', true );
					?>
				</article> <!-- .et_pb_post -->

				<?php if (et_get_option('divi_integration_single_bottom') <> '' && et_get_option('divi_integrate_singlebottom_enable') == 'on') echo(et_get_option('divi_integration_single_bottom')); ?>
			<?php endwhile; ?>
			</div> <!-- #left-area -->

			<?php get_sidebar(); ?> 
			
			<div class="ies_course-meta"> 
						<h3>Course Info</h3>
							<hr>
							<p><h4>Registration</h4>For location details and single session sign-ups:<br /></p>

								<?php
								 $register_url = get_post_meta($post->ID, 'registration_link', true);
									echo '<p align="center"><a href="' . $register_url . '" target="_blank" class="register_btn" align="center">REGISTER ONLINE</a></p>';
								?>
							
							<p>
								<?php
									$ies_instructors = get_post_meta($post->ID, 'instructor', true);
									if ($ies_instructors !== null ) { 
										echo '<h4>Instructor</h4>';
										foreach ($ies_instructors as $instructor_object) {
										echo '<a href="' . get_permalink($instructor_object) . '">' . get_the_title($instructor_object) . '</a><br />';
										}
									}
								?>
							</p>

							<p><?php
								$deliveryvalue = get_post_meta($post->ID, 'delivery', true);

								if ( $deliveryvalue == 'Online' ) {
									echo '<h4>Online Course</h4>This course is delivered on-demand, electronically.';
								} else {

									$rows = get_field('sessions');
									if($rows)
									{
										echo '<h4>Upcoming Dates</h4>';

										foreach($rows as $row)
										{
											$loc_id = get_term_by('id', $row['location'], 'location');
											$name_id = $loc_id->name;
											$start_output = DateTime::createFromFormat('Ymd', $row['start_date'])->format('F d, Y');
											$end_output = DateTime::createFromFormat('Ymd', $row['end_date'])->format('F d, Y');
											$session_reg_url = $row['session_deep_link'];
											//check if end date past
											if ( $row['end_date'] < date('Ymd') ) {

												//date is past, display nothing
											} else {

												echo '	<div class="ies_courseblock">Location:  ' . $name_id .
												'<br> Start Date:  ' . $start_output .
												'<br> End Date:  ' . $end_output .
												'<br> Time:  ' . $row['time'];
												if ($row['cost'] == "0" ) {
													echo '<br> Cost: FREE';
													} else {
													echo '<br> Cost:  $' . $row['cost'] ;
												    }
												if (!empty($session_reg_url)) {
												echo '<br><u><strong>' . '<a href="' . $session_reg_url . '" target="_blank">Click to register for this session</a></strong></u>';
												}
												echo '</div>';
											
											}
										}

									} else {
										echo '<h4>Upcoming Dates</h4>';
										echo '<p>There are no courses scheduled at this time. If you would like to be notified when the course is scheduled or suggest a course, please fill out <a href="http://www.ies.ncsu.edu/about/contact-us/" target="_blank">this form</a>.</p>';
									}
								}
								
								?>
								<p><h4>On-Site Availability</h4>
								Any of our open enrollment classes can be brought on-site. Please <a href="https://www.ies.ncsu.edu/about/contact-us/">Contact Us</a> for more information.
								</p>
							<hr>

			
					
			</div><!-- .ies_course-meta -->

			

		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
