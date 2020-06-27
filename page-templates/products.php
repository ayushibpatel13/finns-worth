<?php
/*
**Template Name: products
*/
get_header();
get_template_part( 'template-parts/layout' ); ?>
<div class="our-products">
	<div class="container">
		<div class="product-list row">
			<?php $products = new WP_Query(
								array(
										'post_type'			=>	'products',
										'posts_per_page'	=>	'8',
										'paged'			    => 	 1,
								)
							);
			$count_wow_delay = 0.0;
			if ( $products->have_posts() ) :
				while( $products->have_posts()) : $products->the_post(); ?>
					<div class="col-lg-3 col-md-6">
						<div class="product-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $count_wow_delay.'s'; ?>">
							<div class="img-wrap">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							</div>
							<div class="product-text">
								<div class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <br>
									<?php $avaliable = get_field( 'products_available' );
									if( $avaliable ) : ?>
										<span><?php echo $avaliable; ?></span>
									<?php endif; ?>
								</div>
								<div class="product-cta">
									<a href="<?php the_permalink(); ?>"><?php  _e( 'More Details', 'finns-worth' ); ?>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
											<path d="M0 0h24v24H0z" fill="none"/>
											<path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php $count_wow_delay = $count_wow_delay + 0.1;
					if( $count_wow_delay > 0.4 ) :
						$count_wow_delay = 0.1;
					endif;
				endwhile; 
				wp_reset_postdata(); ?>
			<?php endif; ?>	
		</div>
		<?php if( wp_count_posts( 'products' )->publish > 8 ) : ?>
				<button class="btn btn-md btn-yellow btn-learn mb-5" id="loadmore">load more...</button>
		<?php endif; ?>
	</div>
</div>
<?php get_footer();