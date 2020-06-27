<?php
/*
**Template Name: resources
*/
get_header();
get_template_part( 'template-parts/layout' ); ?>

<section class="wrapper inner">
	<div class="container">
		<?php $count = 1;
		$count_wow_delay = 0.1; ?>
		<div class="accordion">
			<?php $products  = new WP_Query( 
									array( 
											'post_type'			=>	'products',
											'posts_per_page'	=>	'-1'
									)
								);
			if ( $products->have_posts() )  : 
				while( $products->have_posts() ) : $products->the_post();
					$get_checkbox_value = get_field ( 'add_information_to_checkboxes' );
					if ( $get_checkbox_value != NULL ) : ?>
						<div class="card wow zoomIn" data-wow-duration="1s" data-wow-delay="<?php echo $count_wow_delay.'s'; ?>">
							<?php $title = get_the_title(); 
							$product_size_in_mm = get_field( 'product_size_in_mm' );
							if( $title || $product_size_in_mm ) : ?>
								<div class="card-header" data-target="#accordian_<?php echo $count; ?>">
									<?php the_title();  
									if( $product_size_in_mm) : ?>
										<span><?php echo $product_size_in_mm; ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<div class="card-body" id="accordian_1">
								<ul>
									<?php $pdf = get_field( 'product_data_pdf_upload' ); 
									if( $pdf ) : ?>
										<li>
											<a href="<?php echo $pdf[ 'url' ]; ?>" target="blank" >
												<div class="icon">
													<img src="<?php echo TEMPLATE_URI; ?>/images/pdf-icon.png" alt="pdf">
												</div>
												<div class="text">
													<?php echo $pdf[ 'filename' ]; ?>
												</div>
											</a>
										</li>
									<?php endif; 
									if( have_rows( 'product_details_images' ) ) : 
										while( have_rows( 'product_details_images' ) ) : the_row();
											$detail_img = get_sub_field( 'image' );
											if( $detail_img ): ?>
												<li>
													<a href="<?php echo $detail_img['url']; ?>">
														<div class="icon">
															<img src="<?php echo $detail_img[ 'url' ]; ?>" alt="<?php echo 
															$detail_img['alt']; ?>">
														</div>
														<div class="text">
															<?php echo $detail_img[ 'filename' ] ?>
														</div>
													</a>
												</li>
											<?php endif;
										endwhile; 
									endif;?>
								</ul>
							</div>
						</div>
					<?php endif;
					$count++;
					$count_wow_delay = $count_wow_delay + 0.1;
				endwhile;
				wp_reset_postdata();
			endif; ?>
		</div>
		<div class="accordion-message wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
			<?php $footer_text = get_field( 'footer_text' );
			if( $footer_text || EMAIL ) : ?>
				<p><?php echo $footer_text; ?> <a href="mailto:<?php echo EMAIL; ?>"><?php echo EMAIL; ?></a></p>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();