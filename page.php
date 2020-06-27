<?php get_header(); 
get_template_part( 'template-parts/layout' );
if( is_page( '26' ) ) : ?>
	<div class="privacy-policy wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
		<div class="container">
			<div class="privacy-policy-wrap">
				<?php while ( have_posts() ) : the_post();
					the_content(); 
				endwhile; ?>
			</div>
		</div>
	</div>
<?php else : ?>
<div class="about-us">
	<div class="container">	
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="about-us-row row">
				<div class="col-lg-6">
					<div class="img-wrap pattern-img wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-us-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
						<div class="title">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="content-wrap">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; 
get_footer();