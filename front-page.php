<?php
/**
 * The front page template file.
 *
 *
 * @package Picolog
 */ 
 
if ( 'posts' == get_option( 'show_on_front' ) ) { 
	get_template_part('index');
} else {
 
    get_header(); 

	$slider_cat = get_theme_mod( 'slider_cat', '' );
	$slider_count = get_theme_mod( 'slider_count', 5 );   
	$slider_posts = array(   
		'cat' => absint($slider_cat),
		'posts_per_page' => intval($slider_count)              
	);

	$home_slider = get_theme_mod('slider_field',true); 
	if( $home_slider ):
		if ( $slider_cat ) {
			$query = new WP_Query($slider_posts);        
			if( $query->have_posts()) : ?> 
				<div class="flexslider free-flex">  
					<ul class="slides">
						<?php while($query->have_posts()) :
								$query->the_post();
								if( has_post_thumbnail() ) : ?>
								    <li>
								    	<div class="flex-image">
								    		<?php the_post_thumbnail('full'); ?>
								    	</div>
								    	<?php $content=get_the_content();
								    	if(!empty ($content)) { ?> 
									    	<div class="flex-caption">
									    		<?php the_content( __('Read More','picolog') ); 
									    	    wp_link_pages( array(
													'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'picolog' ),
													'after'  => '</div>',
												) ); ?>
									    	</div>
								    	<?php } ?>
								    </li>
							    <?php endif;?>			   
						<?php endwhile; ?>
					</ul>
				</div>
		
			<?php endif; ?>
		   <?php  
			$query = null;
			wp_reset_postdata();
			
		}
    endif; 
    
	$gallery_cat = get_theme_mod( 'gallery_cat');
	$masonry_layout = get_theme_mod( 'masonry_columns', 'three' );
	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	$client_posts = array(   
		'post_type' => 'post',
    	'paged' => $paged,              
	);

	if( $gallery_cat ) {
       $client_posts['cat'] = absint($gallery_cat);
	}

	switch ( $masonry_layout ) {
		case ( $masonry_layout == 'two'): ?>
			<style type="text/css">
	           .masonry-post {
				  width: 48%; 
				  margin: 0.5%;
				} 
            </style><?php
			break;

		case ( $masonry_layout == 'three'): ?> 
			<style type="text/css">
           .masonry-post {
			  width: 32.33%;
			  margin: 0.5%;
			} 
        </style><?php
			break;

		case ( $masonry_layout == 'four'): ?> 
			<style type="text/css">
           .masonry-post {
			  width: 24%;
			  margin: 0.5%;
			} 
        </style><?php
			break;
	} 

	$home_client = get_theme_mod('gallery_field',true); 
		if( $home_client ): ?>
			<div class="client-carousel">
				<div class="container"><?php
						$custom_query = new WP_Query($client_posts);      
						// Pagination fix
						$temp_query = $wp_query;
						$wp_query   = NULL;
						$wp_query   = $custom_query;

						if( $custom_query->have_posts()) : ?>  
							<div id="masonry-loop" class="masonry-portfolio"><?php
						        while($custom_query->have_posts()) :
									$custom_query->the_post();
									if( has_post_thumbnail() ) : ?>
									    <div class="masonry-post">
									    	<div class="flex-image">
									    		<?php the_post_thumbnail('full'); ?>
									    		<div class="gallery-overlay"><a href="<?php echo get_permalink();?>"><div class="overlay"></div></a></div>
									    	</div>
									    </div><?php 
									    wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'picolog' ),
											'after'  => '</div>',
										) ); 
							        endif; 
							    endwhile; ?>
							</div><?php
						
						    if(  get_theme_mod ('numeric_pagination',true) ) : 
								the_posts_pagination();
							else :
								the_posts_navigation();     
							endif; 
			
						endif;
						// Reset postdata
	                    wp_reset_postdata();
				
						// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
					
				     ?>
				</div>
			</div><?php
		endif; ?>

 
  <?php  if( get_theme_mod('enable_home_default_content',false ) ) {   ?>
		<div id="content" class="site-content">
			<div class="container">
				<main id="main" class="site-main" role="main"><?php
					while ( have_posts() ) : the_post();       
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'picolog' ),
							'after'  => '</div>',
						) );
					endwhile; ?>
			    </main><!-- #main -->
		    </div><!-- #primary -->
		</div>
    <?php }
    get_footer();

}
