<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 * 
 * @package Picolog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"><?php
if ( is_singular() && pings_open() ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"><?php
} ?>
<?php wp_head(); ?>
</head>
  
<body <?php body_class(); ?>>  
 <?php $header_bg_size = get_theme_mod('header_bg_size');
 $header_bg_repeat = get_theme_mod('header_bg_repeat');
 $header_bg_position = get_theme_mod('header_bg_position');
 $header_bg_attachment = get_theme_mod('header_bg_attachment'); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'picolog' ); ?></a>
	<?php do_action('picolog_before_header'); ?>
	<header id="masthead" class="site-header" role="banner">   
			<?php if( is_active_sidebar( 'top-left' )  || is_active_sidebar( 'top-right' ) ): ?>
				<div class="top-nav">
					<div class="container">		
						<div class="eight columns">
							<div class="cart-left">
								<?php dynamic_sidebar('top-left' ); ?>
							</div>
						</div>
				
						<div class="eight columns">
							<div class="cart-right">
								<?php dynamic_sidebar('top-right' ); ?>  
							</div>
						</div>
					</div>
				</div> <!-- .top-nav --> 
			<?php endif;?>
		<?php if( is_front_page() && 'posts' != get_option('show_on_front') ){ ?>
			<div class="branding header-image">
				<div class="nav-wrap">
					<div class="container">
						<div class="four columns">
							<div class="site-branding">
								<?php 
									$logo_title = get_theme_mod( 'logo_title' );   
									$site_title = get_theme_mod( 'site_title',true);
									$tagline = get_theme_mod( 'tagline',true);?>
									<h3 class="site-title"><a style="color: #<?php header_textcolor(); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
								<?php if( $tagline ) : ?>
										<p class="site-description" style="color: #<?php header_textcolor(); ?>"><?php bloginfo( 'description' ); ?></p>
								<?php endif; ?>
							</div><!-- .site-branding -->
						</div>
						
				
						<div class="twelve columns">
							<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
								<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><i class="fa fa-align-justify fa-2x" aria-hidden="true"></i></button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
							</nav><!-- #site-navigation -->
						</div>
						
					</div>
				</div>
			</div>
		<?php }
		else { ?>
			<div class="menu-push">
				<a id="showLeftPush" class="fa fa-times fa-bars"></a>
				<nav id="site-navigation" class="nav-menu-slide menu-vertical menu-left clearfix" role="navigation">
					<h3 id = "hideLeftPush"> Menu <i class="fa fa-arrow-right"></i></h3>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
				
			</div>
			<div class="archive-header"  style="background-image: url('<?php echo picolog_featured_header(); ?>'); background-size: <?php echo $header_bg_size?>; background-repeat: <?php echo $header_bg_repeat?>; background-position: <?php echo $header_bg_position?>; background-attachment: <?php echo $header_bg_attachment?>;">
				<div class="container">
					<div class="site-branding">
						<?php 
							$logo_title = get_theme_mod( 'logo_title' );   
							$tagline = get_theme_mod( 'tagline',true);
							$site_title = get_theme_mod( 'site_title',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) :
                                the_custom_logo(); ?>
                           		<?php if( $site_title ) : ?>
                               		<h3 class="cover-heading"><a style="color: #<?php header_textcolor(); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3> 
                               	<?php endif; 
                           	else : ?>
                           		 <?php if( $site_title ) : ?>
                               		<h3 class="cover-heading"><a style="color: #<?php header_textcolor(); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3> 
                               	<?php endif; ?> 
						<?php endif; ?>
						<?php if( $tagline ) : ?>
								<p class="lead" style="color: #<?php header_textcolor(); ?>"><?php bloginfo( 'description' ); ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
			</div>
		<?php } ?>



	</header><!-- #masthead --> 

	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_checkout' ) ) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
	   <?php $breadcrumb = get_theme_mod( 'breadcrumb',true ); ?>    
		   <div class="breadcrumb">
				<div class="container"><?php
				   if( !is_search() && !is_archive() && !is_404() ) : ?>
						<div class="breadcrumb-left eight columns">
							<h4><?php woocommerce_page_title(); ?></h4>   			
						</div><?php
					endif; ?>
					<?php if( $breadcrumb ) : ?>
						<div class="breadcrumb-right eight columns">
							<?php woocommerce_breadcrumb(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
	<?php } 
	endif; ?>

	


