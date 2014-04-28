<?php
/*
Template Name: General Page
*/

get_header('interior'); ?>
	<div id="content_area" class="row">
	
		<?php require_once("inc/sidebar_accordian.inc.php"); ?>
		
		<!-- Row for main content area -->
		<div id="content" class="eight columns">
			<?php while (have_posts()) : the_post(); ?>
				<div id="page_header">
					<h1><?php the_title(); ?></h1>
					<?php echo get_the_post_thumbnail($post->ID, 'header_image'); ?>
				</div>
				
				<div id="changeFont">
				<a href="#" class="increaseFont">Increase</a>
				<a href="#" class="decreaseFont">Decrease</a>
				<a href="#" class="resetFont">Reset</a>
				</div>

				<div class="post-box">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // End the loop ?>
		</div><!-- End Content row -->
		
	</div><!-- #content_area -->
<?php get_footer(); ?>