<?php
/**
 * "Portfolio" Post Type Archive
 *
 * The portfolio post type archive template displays your portfolio items with
 * a switcher to quickly filter between the various portfolio galleries. 
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options; 
 get_header();
?>
    <div id="content">
    
    	<div class="page col-full">
    
			<section id="portfolio-gallery">
			           
			<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?>  			
	
	        <?php if ( have_posts() ) : $count = 0; ?>                                                           
	            <article <?php post_class(); ?>>
					<?php get_template_part( 'loop', 'portfolio' ); ?>
	            </article><!-- /.post -->
	            
	        <?php else : ?>
				<article <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        <?php endif; ?>  
	        
			</section><!-- /#portfolio-gallery -->
		
		</div>

    </div><!-- /#content -->
		
<?php get_footer(); ?>