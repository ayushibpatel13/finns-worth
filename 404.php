<?php get_header();
get_template_part( 'template-parts/layout' ); ?>

<section class="wrapper inner">
	<div class="container">
		<div class="text-center"> 
			<div class="content-wrap">
			    <div class="wow zoomIn mt-4" data-wow-duration="1s" data-wow-delay="0.1s">
					<p><?php _e( 'We are sorry, we can’t seem to find the page you are looking for. If you typed in the address try double checking the spelling or go back to the homepage' , 'finns-worth' ); ?>
					</p>
					<a href="<?php echo get_site_url(); ?>" class="btn btn-md btn-yellow btn-range"><?php _e( 'BACK TO HOMEPAGE' , 'finns-worth' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
