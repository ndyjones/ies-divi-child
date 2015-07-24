<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<h1><?php the_title(); ?></h1>
					<p class="ies_staff-title"><?php echo get_post_meta($post->ID, 'staff_title', true); ?></p>

					<p class="ies_staff-contact">
						Email: <a href="mailto:<?php echo antispambot( get_post_meta($post->ID, 'staff_email', true) ); ?>">
						<?php echo get_post_meta($post->ID, 'staff_email', true); ?></a>
					 | Phone: <a href="tel:<?php echo get_post_meta($post->ID, 'staff_phone', true); ?>">
					 <?php echo get_post_meta($post->ID, 'staff_phone', true); ?></a></p>
					 <p class="ies_staff-contact"><?php if ( has_term( '', 'location' )){ echo get_the_term_list( $post->ID, 'location', 'Service Areas: ', ', ', '' );  } ?></p>
					
				<?php
					if ( has_post_thumbnail() ) :

						/* et_divi_post_meta();*/

						$thumb = '';

						$width = (int) apply_filters( 'et_pb_index_blog_image_width', 300 );

						$height = (int) apply_filters( 'et_pb_index_blog_image_height', 500 );
						$classtext = 'ies_staff-photo';
						$titletext = get_the_title();
						$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
						$thumb = $thumbnail["thumb"];

						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext );

					
					endif;
				?>

					<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					<div class="ies_staff-bio">
						<h3>Bio</h3>
							<p><?php echo get_post_meta($post->ID, 'staff_bio', true); ?></p>
						</div>
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
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
