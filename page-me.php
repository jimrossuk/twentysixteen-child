<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<p>Is this the way it should be?</p>
		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
		
		

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

	<!-- This the right place??? -->
	<div>
	<?php if ( get_field( 'phone_number' ) ){  ?>
    <h2> <?php the_field( 'phone_number' )?> </h2>
<?php } ?>
	</div>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
