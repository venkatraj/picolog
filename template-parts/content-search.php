<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Picolog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="latest-content">
	<header class="header-content">
		<div class="title-meta">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php picolog_top_meta();?>
			<?php endif; ?>
		</div>
		<br class="clear">
	
		<div class="entry-summary">    
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php if ( 'post' == get_post_type() ): ?>
			<footer class="entry-footer">     
				<?php picolog_entry_footer(); ?>   
			</footer><!-- .entry-footer -->
		<?php endif;?>
	</header><!-- .entry-header -->
</div>
</article><!-- #post-## -->
