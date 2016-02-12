<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xpertos
 */

if ( ! function_exists( 'xpertos_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function xpertos_posted_on() {
	$time_month = get_the_date( 'F' );
	$time_day = get_the_date( 'j' );
	$time_year = get_the_date( 'Y' );

	$time_string = '<time class="month">' . $time_month . '</time>' .
				   '<time class="day">' . $time_day . '</time>' .
				   '<time class="year">' . $time_year . '</time>';

	if ( has_post_thumbnail() ) :
		$post_thumbnail = get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-responsive'));
	else :
		$post_thumbnail = '';
	endif;

	$posted_on = '<div class="entry-time"><div class="row"><div class="col-xs-6">' . $post_thumbnail . '</div><div class="col-xs-6">' . $time_string . '</div></div></div>';

	$tmptags = get_tags();
	$tags = array();
	foreach ($tmptags as $tag) $tags[] = '<a href="' . home_url('tag') . '/' . $tag->slug . '">' . $tag->name . '</a>';
	echo $posted_on . '<div class="entry-tags"> ' . implode(', ', $tags) . '</div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'xpertos_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function xpertos_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'xpertos' ) );
		if ( $categories_list && xpertos_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'xpertos' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'xpertos' ) );
		if ( $tags_list ) {
			//printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'xpertos' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'xpertos' ), esc_html__( '1 Comment', 'xpertos' ), esc_html__( '% Comments', 'xpertos' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'xpertos' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function xpertos_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'xpertos_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'xpertos_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so xpertos_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so xpertos_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in xpertos_categorized_blog.
 */
function xpertos_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'xpertos_categories' );
}
add_action( 'edit_category', 'xpertos_category_transient_flusher' );
add_action( 'save_post',     'xpertos_category_transient_flusher' );
