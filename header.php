<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name=" theme-color" content="#348A9F">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>
<body>
<div class="pageloader"></div>
	<header>
		<div class="header">
			<div class="container">
				<div class="row no-gutters justify-content-between align-items-center">
					<?php if ( has_custom_logo() ) : ?>
						<div class="logo">
							<?php echo get_custom_logo(); ?>
						</div>
					<?php endif; ?>
					<div class="right">
						<div class="navbar-toggle">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<?php wp_nav_menu(
							array
							(
								'menu'				=>	'header',
								'menu_class'		=>	'menu',
								'container'			=>	'div',
								'container_class'	=>	'navigation',
								'theme_location'    => 	'header',
							) 
						); ?>
					</div>
				</div>
			</div>
		</div>
	</header>
