<section id="services" class="section section-services parallax">
	<?php
		$xpertos_options = load_options();
		$args = array( 'post_type' => 'services', 'posts_per_page' => 3, 'max_num_pages' => 1, 'order' => 'ASC', 'orderby' => 'menu_order' );
		$loop = new WP_Query( $args );
		$services = array();
		while ( $loop->have_posts() ) : $loop->the_post();
			$post = get_post( get_the_ID() );
			if (class_exists('MultiPostThumbnails')) :
				if ( MultiPostThumbnails::has_post_thumbnail( get_post_type(), 'secondary-image' ) ) :
					$image = MultiPostThumbnails::get_the_post_thumbnail(
						get_post_type(),
						'secondary-image',
						get_the_ID(),
						'image-how-to-buy'
					);
				elseif ( has_post_thumbnail() ) :
					$image = get_the_post_thumbnail( get_the_ID(), 'image-how-to-buy' );
				else :
					$image = '';
				endif;
			else :
				if ( has_post_thumbnail() ) :
					$image = get_the_post_thumbnail( get_the_ID(), 'image-how-to-buy' );
				else :
					$image = '';
				endif;
			endif;

			$services[] = array(
					'title' 	=> get_the_title( get_the_ID() ),
					'slug'		=> $post->post_name,
					'content'	=> get_the_content( get_the_ID() ),
					'image'		=> $image,
					'link'		=> '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">leer más</a>'
				);
		endwhile;
		//agregar tooltips al over de la imagen
	?>
	<div class="container">
		<h2>servicios</h2>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 wow slideInLeft">
				<div class="casita">
					<div class="left">
						<a href="#" data-rel="<?= (!empty($services) and isset($services[0])) ? $services[0]['slug'] : '' ?>" class="top-left active">
							<?= (!empty($services) and isset($services[0])) ? $services[0]['image'] : '&nbsp;' ?>
						</a>
					</div>
					<div class="right">
						<a href="#" data-rel="<?= (!empty($services) and isset($services[1])) ? $services[1]['slug'] : '' ?>" class="top-right">
							<?= (!empty($services) and isset($services[1])) ? $services[1]['image'] : '&nbsp;' ?>
						</a>
					</div>
					<div class="bottom">
						<a href="#" data-rel="<?= (!empty($services) and isset($services[2])) ? $services[2]['slug'] : '' ?>" class="btm">
								<?= (!empty($services) and isset($services[2])) ? $services[2]['image'] : '&nbsp;' ?>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 text wow slideInRight">
			<?php
			if(!empty($services)) :
				$i = 1;
				foreach( $services as $service ) :
					?>
					<div class="<?= ($i > 1) ? 'hide ' : '' ?>section-services-detail" id="<?= $service['slug'] ?>">
						<?php $i++; ?><h4><?= $service['title']; ?></h4><?= $service['content']; ?><br><br><!--<?= $service['link'] ?>-->
					</div>
					<?php
				endforeach;
			endif;
			?>
			</div>
		</div>
	</div>
</section>
