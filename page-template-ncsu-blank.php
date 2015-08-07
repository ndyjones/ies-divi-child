<?php
/*
	Template Name: NCSU Blank Page
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- NC State Bootstrap CSS -->
	<link href="https://cdn.ncsu.edu/brand-assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" type="text/css" />

	<!-- jQuery 2.1.4 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.ncsu.edu/brand-assets/bootstrap/js/bootstrap.min.js"></script>


	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>

	<?php wp_head(); ?>

</head>

<body>

<?php while (have_posts()) : the_post(); ?>
	
	<div class='container'>
		
		<div class='page-lead'>
				
				<h1><?php echo get_the_title( $ID ); ?></h1>
		
		</div>
	
	</div>
	

	<div class='container'>

		<div id="page-content">
		
		<?php the_content(); endwhile; ?>
		
		</div>
	
	</div>

</body>

</html>