<?php
/*
Template Name: Course Search return
*/

get_header(); ?>

  

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">



				

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<h1 class="main_title">Course Search Result for: <?php echo "$s"; ?>  </h1>


					<div class="entry-content">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>    
               		 
               		       
                    <?php echo '<br /><br /><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
                    		echo the_permalink();
							echo '<p>' . the_excerpt() . ' <a href="' . get_permalink() . '"> View this Course</a></p>'; ?>
                        
					
					</div> <!-- .entry-content -->

						<?php endwhile; ?>

    				<?php endif; ?>
    				
    				</article> <!-- .et_pb_post -->
				
				

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->

<?php get_footer(); ?>