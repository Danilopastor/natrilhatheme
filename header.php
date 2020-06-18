<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="header animation">
		 <div class="container">
			<div class="top-bar">
				<div class="icons-top">
				  <div class="social-icon"><a href="#"><i class="fab fa-instagram"></i></i></a></div>
					<div class="social-icon"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
					<div class="social-icon"><a href="#"><i class="fab fa-twitter"></i></i></a></div>
				</div>
			</div>
			<div class="header-image">
				<div class="logotipo animation">
					<a href="<?php echo home_url(); ?>"><img alt="brand-top" src="<?php bloginfo('template_directory'); ?>/assets/image/logotipo_natrilha_horizontal.svg" /></a>
				</div>
			</div>
		  </div>
			<div class="header-menu">
				<div class="container inner-menu">
					<?php 
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'div',
						/*'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'bs-example-navbar-collapse-1',
						'menu_class'      => 'navbar-nav mr-auto',*/
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>
					<div class="icon-search"></div>
				</div>
			</div>
			
	</div>