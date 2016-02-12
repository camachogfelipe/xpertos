<section id="how-to-buy" class="section section-how-to-buy">
	<div class="container">
		<h2>¿cómo comprar?</h2>
		<div class="row">
			<?php
				$args = array( 'post_type' => 'how-to-buy', 'posts_per_page' => 4, 'max_num_pages' => 1, 'order' => 'ASC', 'orderby' => 'menu_order' );
				$loop = new WP_Query( $args );
				$x = 0;
				while ( $loop->have_posts() ) : $loop->the_post();
					$x += 0.3;
					?>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 wow slideInDown" data-wow-duration="1s" data-wow-delay="<?= $x ?>s">
						<?php
							if (class_exists('MultiPostThumbnails')) :
								if ( MultiPostThumbnails::has_post_thumbnail( get_post_type(), 'secondary-image' ) ) :
									MultiPostThumbnails::the_post_thumbnail(
										get_post_type(),
										'secondary-image',
										get_the_ID(),
										'image-values'
									);
								elseif ( has_post_thumbnail() ) :
									the_post_thumbnail( 'image-values' );
								endif;
							else :
								if ( has_post_thumbnail() ) :
									the_post_thumbnail( 'image-values' );
								endif;
							endif;
							?><h4><?php the_title(); ?></h4><?php
							the_excerpt();
							echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">leer más</a>';
						?>
					</div>
					<?php
				endwhile;
			?>
		</div>
	</div>
</section>
