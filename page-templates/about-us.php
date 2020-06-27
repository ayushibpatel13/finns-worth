<?php
/*
**Template Name: about_us
*/
get_header();
get_template_part('template-parts/layout'); ?>

<div class="about-us">
	<div class="container">
		<?php $title = get_field( 'title' );
		$content =  get_field( 'content' );
		if( $title || $content ) : ?>
			<div class="title-section wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
				<div class="title">
					<?php if( $title ) : ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
				<div class="content-wrap">
					<?php if( $content ) : ?>
						<p><?php echo $content; ?></p>
					<?php endif; ?>
				</div>
			</div>
	    <?php endif; 
	    if( have_rows( 'repeater' ) ) : ?>
			<div class="icon-boxes">
				<div class="row">
					<?php while( have_rows( 'repeater' ) ) : the_row(); 
						$image = get_sub_field( 'image' );
						$title = get_sub_field( 'title' ); 
						if( $image || $title ) : ?>
							<div class="col-lg-3 col-md-6">
								<div class="icon-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
									<?php if( $image ) : ?>
										<div class="icon-wrap">
											<?php echo wp_get_attachment_image( $image, 'full' ); ?>
										</div>
									<?php endif; 
									if( $title ) : ?>
										<span><?php echo $title; ?></span>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; 
					endwhile; ?>
				</div>
			</div>
		<?php endif; 
		if( have_rows( 'about_details_repeater' ) ): 
			while( have_rows( 'about_details_repeater' ) ): the_row(); 
				$blog_repeater_image = get_sub_field( 'about_details_image' );
				$title = get_sub_field( 'title' );
				$content = get_sub_field( 'content' );
				if( $image || $title || $content ) : ?>
					<div class="about-us-row row <?php echo $count%2 != 0 ? 'flex-row-reverse' : ''; ?>">
						<div class="col-lg-6">
							<div class="img-wrap pattern-img wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
								<?php echo wp_get_attachment_image( $blog_repeater_image, 'full' ); ?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="about-us-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
								<?php if( $title ) : ?>
									<div class="title">
										<h3><?php echo $title; ?></h3>
									</div>
								<?php endif; 
								if( $content ) : ?>
									<div class="content-wrap">
										<p><?php echo $content; ?></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endif; $count++;
			endwhile; 
		endif; 
		if( FACEBOOK || TWITTER || INSTAGRAM ) : ?>
			<div class="about-social wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
				<ul class="social-inline">
					<?php if( FACEBOOK ) : ?>
						<li><a href="<?php echo FACEBOOK; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<?php endif;
					if( TWITTER ) : ?>
						<li><a href="<?php echo TWITTER; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<?php endif;
					if( INSTAGRAM ) : ?>
						<li><a href="<?php echo INSTAGRAM; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php
					endif; ?>		
				</ul>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer();
