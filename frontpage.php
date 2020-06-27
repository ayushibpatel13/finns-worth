<?php
/*
**Template Name: front-page
*/
get_header();?>
<?php if( have_rows( 'slider' ) ):  ?>
	<section class="banner">
		<div class="home-banner">
			<?php while( have_rows( 'slider' ) ): the_row(); 
				$title = get_sub_field( 'title' );
				$content = get_sub_field( 'content' );
				$image = get_sub_field( 'image' );
				$link = get_sub_field ( 'link' );
				if( $title || $content || $image || $link ) : ?>
					<div class="slide">
						<div class="container">
							<div class="row no-gutters">
								<div class="banner-text wow fadeInUp" data-wow-duration="1s">
									<div class="banner-description">
										<?php if( $title ) : ?>
											<h1><?php echo $title; ?></h1>
										<?php endif; 
										if( $content ) : ?>
											<p><?php echo $content; ?></p>
										<?php endif; 
										if( $link ) : ?>
											<a href="<?php echo $link['url']; ?>" class="btn btn-md btn-yellow btn-learn"><?php echo $link['title']; ?>
												<span class="icon icon-arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
														<path d="M0 0h24v24H0z" fill="none"/>
														<path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/>
													</svg>
												</span>
										    </a>
										<?php endif; ?>
									</div>
							    </div>
								<?php if( $image ) : ?>
									<div class="banner-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
										<div class="thumb">
											<?php echo wp_get_attachment_image( $image, 'full' ); ?> 
										</div>
									</div>
								<?php endif; ?>
							</div>
					    </div>
					</div>
				<?php endif; 
			endwhile; ?>  
		</div>
	</section>
<?php endif; ?>

<section class="wrapper">
	<?php if( have_rows( 'blog' ) ) : ?>
		<div class="range-learn-about">
			<div class="container">
				<div class="row">
					<?php while( have_rows( 'blog' ) ) : the_row(); 
						$title = get_sub_field( 'title' );
						$content = get_sub_field( 'content' );
						$image = get_sub_field( 'image' ); 
						$blog_link = get_sub_field( 'blog_link' );
						if( $title || $content || $image || $blog_link ) : ?>
							<div class="col-md-6">
								<div class="thumbnail wow fadeInUp" data-wow-delay="0.1s">
									<?php if( $image ) : ?>
										<div class="thumb">
											<?php echo wp_get_attachment_image( $image, 'full' ); ?> 
										</div>
									<?php endif; ?>
									<div class="description">
										<?php if( $title ) : ?>
											<h2><?php echo $title; ?></h2>
										<?php endif; 
										if( $content ) : ?>
											<p><?php echo $content; ?></p>
										<?php endif; 
										if( $blog_link ) : ?>
											<a href="<?php echo $blog_link['url']; ?>" class="btn btn-md btn-yellow btn-range"><?php echo $blog_link['title']; ?>
												<span class="icon icon-arrow">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
														<path d="M0 0h24v24H0z" fill="none"/>
														<path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/>
													</svg>
												</span>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endif;
					endwhile; ?>		
				</div>
			</div>
		</div>
	<?php endif; 
	$company_description =  get_field( 'company_description' );
	$company_name =  get_field( 'company_name' ); 
    if( $company_description || $company_name ) : ?>
		<div class="company-brief wow fadeIn" data-wow-delay="0.1s">
			<div class="container h-100">
				<div class="row no-gutters align-items-center h-100">
					<div class="description">
						<?php if( $company_description ) : ?>
							<p><?php echo $company_description; ?></p> 
						<?php endif; 
						if( $company_name ) : ?>
							<span class="name"><?php echo $company_name; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
    <?php endif; 
    $banner_bg_image = get_field( 'banner_bg_image' ); 
    $banner_image = get_field( 'banner_image' );
    $banner_title = get_field( 'banner_title' );
    if( $banner_bg_image || $banner_image || $banner_title )  : ?>
    	<div class="everything-manufactured wow fadeIn" data-wow-delay="0.1s">
    		<div class="container">
    			<div class="row no-gutters align-items-center">
    				<div class="thumbnail">	
    					<?php if( $banner_bg_image ) : ?>
    						<div class="thumb">
    							<?php echo wp_get_attachment_image( $banner_bg_image, 'full' ); ?> 
    						</div>
    					<?php endif; ?>
    					<div class="description">	
    						<?php if( $banner_image ) : ?>
    							<div class="icon">
    								<span>
    									<?php echo wp_get_attachment_image( $banner_image, 'full' ); ?> 
    								</span>
    							</div>
    						<?php endif; 
    						if( $banner_title ) : ?>
    							<h2><?php echo $banner_title; ?></h2>
    						<?php endif; ?>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
	<?php endif; ?>
</section>

<?php get_footer();
