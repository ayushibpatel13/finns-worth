<?php if ( is_404() ) : ?>
	<section class="banner inner">
		<div class="container">
			<div class="banner-wrap wow fadeIn" data-wow-duration="1s">
				<h1>404</h1>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="banner inner">
		<div class="container">
			<div class="banner-wrap wow fadeIn" data-wow-duration="1s">
				<?php the_title( '<h1>', '</h1>');
				$banner_sub_title = get_field( 'banner_sub_title' );
				if( $banner_sub_title ) : ?>
					<p><?php echo $banner_sub_title; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
