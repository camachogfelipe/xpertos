<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package xpertos
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-image">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail('image-entry', array('class' => 'img-responsive'));
			endif;
			?>
		</div>
		<!--<div class="entry-meta">
			<?php xpertos_posted_on(); ?>
		</div>-->
		<!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xpertos' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php xpertos_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

