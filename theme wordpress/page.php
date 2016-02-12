<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package xpertos
 */

get_header(); ?>

	<div id="primary" class="<?php echo (!is_front_page()) ? 'content-area' : '' ?>">
		<main id="main" class="<?php echo (!is_front_page()) ? 'col-xs-12 col-sm-12 col-md-9 col-lg-9' : '' ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php (!is_front_page()) ? get_sidebar() : ''; ?>
<?php get_footer(); ?>
