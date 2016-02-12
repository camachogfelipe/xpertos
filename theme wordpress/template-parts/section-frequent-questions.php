<div id="frequent-questions" class="section section-frequent-questions<?php
	$xpertos_options = load_options();
	if (!empty($xpertos_options->frequent_questions_background_option)) :
		echo ' section-bg ';
	endif;
?>"<?php
	if (!empty($xpertos_options->frequent_questions_background_option)) :
		echo 'style="background: url('.wp_get_attachment_url($xpertos_options->frequent_questions_background_option).');"';
	endif ?>>
	<div class="container">
		<h2>preguntas frecuentes</h2>
		<div class="row">
			<?php
				$args = array( 'post_type' => 'frequent-questions', 'posts_per_page' => 4, 'max_num_pages' => 1, 'order' => 'ASC', 'orderby' => 'menu_order' );
				$loop = new WP_Query( $args );
				$x = 0;
				while ( $loop->have_posts() ) : $loop->the_post();
					$x += 0.3;
					?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 wow slideInUp" data-wow-duration="1s" data-wow-delay="<?= $x ?>s">
						<?php
							?><h4><?php the_title(); ?></h4><?php
							the_content();
						?>
					</div>
					<?php
				endwhile;
			?>
		</div>
	</div>
</div>
