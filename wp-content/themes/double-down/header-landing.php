<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
		<title>
			<?php
				/*
				 * Print the <title> tag based on what is being viewed.
				 */
				global $page, $paged, $post;
			
				wp_title( '|', true, 'right' );
			
				// Add the blog name.
				bloginfo( 'name' );
			
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
					echo " | $site_description";
			
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' | ' . sprintf( __( 'Page %s', 'wpv' ), max( $paged, $page ) );
            ?>
	</title>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/reources/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/reources/css/slick-crousel.css" />	
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/reources/images/logo.png">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
	
</head>
<body <?php body_class(); ?> >
	<header class="container" >
				<nav class="navbar navbar-expand-lg navbar-light mt-3 mb-3" style="z-index: 2000;">
					<div class="container-fluid">
					    <a href="<?php bloginfo('url'); ?>"> <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" alt="Logo" /> </a>
						<div>
							<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse nav_wrapper navbar-collapse" id="navbarSupportedContent">
								<?php 	
								  wp_nav_menu( array(
									'theme_location'  => 'landing',
									'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
									'container'       => false,									
									'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
								) );
								?>
								<a href="<?php echo is_user_logged_in() ? home_url('profile') : home_url('login') ;  ?>" class="signin"><?php echo is_user_logged_in() ? 'Min profil' : 'Sign In'; ?></a>
							</div>
						</div>
					</div>
				</nav>
		</header>

