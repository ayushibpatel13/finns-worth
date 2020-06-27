<?php
/*
**Template Name: contact_us
*/
get_header();
get_template_part( 'template-parts/layout' ); ?>
<div class="contact-us">
	<div class="map-wrap wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.7112969767954!2d-0.26473658479763107!3d51.555192715029605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876119e49138da9%3A0xaaa6b693a9b9f910!2sFinnsworth%20Limited!5e0!3m2!1sen!2sin!4v1589369409875!5m2!1sen!2sin"></iframe>
	</div>
	<div class="contact-wrap">
		<div class="container">
			<ul class="contact-info d-flex flex-wrap">
				<?php $contact_title = get_field( 'contact_title' );
				if( ADDRESS || ADDRESS_URL  || $contact_title ) : ?>
					<li class="d-md-flex align-items-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
						<?php if( $contact_title ) : ?>
							<div class="contact-title"><?php echo $contact_title; ?>
							</div>
						<?php endif; ?>
						<?php if( ADDRESS || ADDRESS_URL ) : ?>
							<div class="contact-text d-flex align-items-center">
								<div class="icon-wrap">
									<img src="<?php echo get_template_directory_uri(); ?>/images/map-icon.png" alt="">
								</div>
								<div class="link-text">
									<a href="<?php echo ADDRESS_URL; ?>" target="_blank"><?php echo wpautop( ADDRESS, 'br' ); ?></a>
								</div>		
							</div>
						<?php endif; ?>
					</li>
				<?php endif; ?>
				<?php $email_us = get_field( 'email_us' );
				if( $email_us || EMAIL ) : ?>
					<li class="d-md-flex align-items-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
						<?php if( $email_us ) : ?>
							<div class="contact-title"><?php echo $email_us; ?></div>
						<?php endif; ?>
						<?php if( EMAIL ) : ?>
							<div class="contact-text d-flex align-items-center">
								<div class="icon-wrap">
									<img src="<?php echo get_template_directory_uri(); ?>/images/mail-icon.png" alt="">
								</div>
									<div class="link-text"><a href="mailto:<?php echo EMAIL; ?>?subject=Finnsworth Website Enquiry"><?php echo EMAIL; ?></a></div>
							</div>
						<?php endif; ?>
					</li>
				<?php endif; 
				$call_us = get_field( 'call_us' );
				if ( $call_us || MOBILE ) : ?>
					<li class="d-md-flex align-items-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
						<?php if( $call_us ) : ?>
							<div class="contact-title"><?php echo $call_us; ?></div>
						<?php endif; ?>
						<?php if( MOBILE ) : ?>
							<div class="contact-text d-flex align-items-center">
								<div class="icon-wrap">
									<img src="<?php echo get_template_directory_uri(); ?>/images/tel-icon.png" alt="">
								</div>
								<div class="link-text">
									<a href="tel:<?php echo str_replace(array( '(', ')',' ' ), array(''), MOBILE ); ?>"><?php echo MOBILE; ?></a>
								</div>
							</div>
						<?php endif; ?>
					</li>
				<?php endif; 
				$follow_us = get_field( 'follow_us' ); 
				if( $follow_us || FACEBOOK || TWITTER || INSTAGRAM ) : ?>
					<li class="d-md-flex align-items-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
						<?php if( $follow_us ) : ?>
							<div class="contact-title"><?php echo $follow_us; ?></div>
						<?php endif; ?>
						<?php if( FACEBOOK || TWITTER || INSTAGRAM ) : ?>
							<div class="contact-text">
								<ul class="social-inline">
									<?php if( FACEBOOK ) : ?>
										<li><a href="<?php echo FACEBOOK; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if( TWITTER ) :
										?>
										<li><a href="<?php echo TWITTER; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if( INSTAGRAM ) : ?>
										<li><a href="<?php echo INSTAGRAM; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
						<?php endif; ?>
					</li>
			    <?php endif; ?>
			</ul>
			<?php $contact_form = get_field( 'contact_form' );
			if( $contact_form ) : ?>
				<div class="contact-form wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
					<?php echo $contact_form; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer();