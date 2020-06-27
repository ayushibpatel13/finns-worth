<?php get_header(); ?>
<div class="product-detail-section">
	<div class="container">
		<div class="product-detail-wrap">
			<div class="product-detail-row d-flex flex-wrap">
				<div class="left">
					<?php if( have_rows( 'product_details_images' ) ) : ?>
						<div class="product-tabs-wrap d-flex flex-wrap align-items-center flex-row-reverse wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
							<div class="tab-content"><?php $i = 1;
								while( have_rows( 'product_details_images' ) ) : the_row();
									$detail_img = get_sub_field( 'image' ); ?>
									<div class="tab-pane fade show <?php if( $i == 1 ) : echo 'active'; endif; ?>" id="detail_img_<?php echo $i; ?>">
											<img src="<?php echo $detail_img[ 'url' ]; ?>" alt="<?php echo $detail_img['alt']; ?>"> 
									</div><?php $i++;
								endwhile; ?>
							</div>
							<ul class="nav"><?php $j = 1;
								while( have_rows( 'product_details_images' ) ) : the_row();
									$detail_img = get_sub_field( 'image' ); ?>
									<li>
										<a class="<?php if( $j == 1 ) : echo 'active'; endif; ?>" data-toggle="tab" href="#detail_img_<?php echo $j; ?>">
											<img src="<?php echo $detail_img[ 'url' ]; ?>" alt="<?php echo $detail_img['alt']; ?>"> 
										</a>
									</li>
									<?php $j++;
								endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
				<div class="right">
					<div class="product-detail wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
						<?php $product_size_in_mm = get_field( 'product_size_in_mm' );
						if( $product_size_in_mm ) : ?>
							<h2 class="product-title"><?php the_title(); ?> <br>
								<?php echo $product_size_in_mm; ?></h2>
					    <?php endif; 
					    while ( have_posts() ) : the_post(); 
					    	the_content(); 
						endwhile; 
						$avaliable_size = get_field( 'avaliable_size' );
						if( $avaliable_size ) : ?>
							<div class="product-desc">
								<?php _e( 'Available Sizes', 'finns-worth'); ?> <span><?php echo $avaliable_size; ?></span>
							</div>
						<?php endif;
						$product_size = get_field( 'product_size' );
						if( $product_size ) : ?>
							<div class="product-desc">
								<?php _e( 'Packed In (Buying Options)', 'finns-worth' ); ?> <span><?php echo $product_size; ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php $pdf = get_field( 'product_data_pdf_upload' );
			$product_data = get_field( 'product_data' );
			if( $pdf  || $product_data ) :  ?>
				<div class="product-description wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
					<div class="download-cta">
						<a href="<?php echo $pdf[ 'url' ]; ?>" target="blank"><img src="<?php echo TEMPLATE_URI; ?>/images/pdf-icon.png" alt=""><?php _e('Download Product Data Sheet.pdf','finns-worth' ); ?></a>
					</div>
					<p><?php echo $product_data; ?></p>
				</div>
			<?php endif; ?>
		</div>
		<div class="other-products">
			<?php $title_products = get_field( 'other_finnsworth_products' , '11' );
			if( $title_products ) : ?>
				<div class="other-products-title wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
					<h4><?php echo $title_products; ?></h4>
				</div>
			<?php endif; ?>
			<div class="row">
				<?php $products = new WP_Query(
									array(
										'post_type'			=>	'products',
										'posts_per_page'	=>	'6'
									));
				$count_data_wow_delay = 0.1;
				if ( $products->have_posts() ) : 
					while( $products->have_posts() ) : $products->the_post() ; ?>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="other-product-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $count_data_wow_delay.'s'; ?>">
								<a href="<?php the_permalink(); ?>">
									<div class="img-wrap">
										<?php the_post_thumbnail(); ?>
									</div>
									<span><?php the_title(); ?></span>
								</a>
							</div>
						</div>
						<?php $count_data_wow_delay = $count_data_wow_delay + 0.1 ;
					endwhile; 
					wp_reset_postdata();
				endif; ?>	
			</div>
			<div class="other-cta wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
				<a href="<?php the_permalink( '11' ); ?>"><?php _e( 'View All Products' , 'finns-worth' ); ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
					<path d="M0 0h24v24H0z" fill="none"></path>
					<path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z" fill="#333333"></path>
				</svg></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer();