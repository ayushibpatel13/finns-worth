<footer>
	<div class="footer-top">
		<div class="container">
			<div class="row no-gutters align-items-center">	
				<?php if( ADDRESS || ADDRESS_URL ) : ?>
						<div class="col-lg-4">
							<div class="wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
								<div class="icon">
									<img src="<?php echo TEMPLATE_URI; ?>/images/location-icon.png" alt="location">
								</div>
								<div class="description">
									<a href="<?php echo ADDRESS_URL; ?>" target="_blank">
										<?php echo ADDRESS; ?>
									</a>
								</div>
							</div>
						</div>
				<?php endif; 
				if( EMAIL ) : ?>
					<div class="col-lg-4 center">
						<div class="wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
							<div class="icon">
								<img src="<?php echo TEMPLATE_URI; ?>/images/email-icon.png" alt="email">
							</div>
							<div class="description">
								<a href="mailto:<?php echo EMAIL; ?>"><?php echo EMAIL; ?></a>
							</div>
						</div>
					</div>
				<?php endif;  
				if( MOBILE ) : ?>
					<div class="col-lg-4">
						<div class="wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
							<div class="icon">
								<img src="<?php echo TEMPLATE_URI; ?>/images/phone-icon.png" alt="phone">
							</div>
							<div class="description">
								<a href="tel:<?php echo str_replace(array( '(', ')',' ' ), array(''), MOBILE ); ?>"><?php echo MOBILE; ?></a>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="footer-bottom wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
		<div class="container">
			<div class="row no-gutters align-items-center justify-content-between">
				<?php if ( LOGO_URL ) : ?>
					<div class="footer-logo">
						<img src="<?php echo LOGO_URL; ?>" alt="">
					</div>
				<?php endif; ?>
				<div class="footer-nav">
					<?php wp_nav_menu(
							array
							(
								'menu'				=>	'footer',
								'menu_class'		=>	'menu',
								'container'			=>	'div',
								'container_class'	=>	'footer-nav',
								'theme_location'    => 	'footer',
							) 
					); ?>
				</div>
				<ul class="social-inline footer-social">
					<?php if( FACEBOOK ) : ?>
						<li>
							<a href="<?php echo FACEBOOK; ?>" target="_blank">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( TWITTER ) : ?>
						<li>
							<a href="<?php echo TWITTER; ?>" target="_blank">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if( INSTAGRAM ) : ?>
						<li>
							<a href="<?php echo INSTAGRAM; ?>" target="_blank">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>				
				</ul>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
			<div class="d-md-flex justify-content-between">
				<p> &copy; <?php echo date("Y"); ?> 
				<?php _e('- Finnsworth Limited','finns-worth'); ?> </p>
				<p><a href="https://www.2simplify.co.uk/" target="_blank"><?php _e('Developed by 2simplify','finns-worth'); ?></a></p>
			</div>
		</div>
		<a href="javascript:;" class="scroll-top wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
				<path d="M0 0h24v24H0z" fill="none"/>
				<path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/>
			</svg>
		</a>
	</div>
</footer>
<?php wp_footer(); 