<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Picolog
 */

$breadcrumb = get_theme_mod( 'breadcrumb',true ); 
$breadcrumb_navigation = get_theme_mod( 'breadcrumb_navigation',true ); 
if( !is_front_page() ): ?>
	<?php if( $breadcrumb_navigation ) : ?>
		<div class="breadcrumb"> 
			<div class="container"><?php
			    if( !is_search() && !is_archive() && !is_404() ) : ?>
					<div class="breadcrumb-left eight columns">
						<?php the_title('<h4>','</h4>');?>			
					</div><?php
				endif; ?>
				<?php if( $breadcrumb ) : ?>
					<div class="breadcrumb-right eight columns">
						<?php picolog_breadcrumbs(); ?>
					</div>
				<?php endif; ?> 
			</div>
		</div>
	<?php endif; ?><?php  
endif;