<?php
/**
 * Search Template
 *
 * The search template is used to display search results from the native WordPress search.
 *
 * If no search results are found, the user is assisted in refining their search query in
 * an attempt to produce an appropriate search results set for the user's search query.
 *
 * @package WooFramework
 * @subpackage Template
 */

 get_header();
 global $woo_options;
?>     
    <div id="content">
    
    	<div class="col-full">
    		
    		<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?>  	
			
			<header class="archive_header"><?php echo __( 'Search results:', 'woothemes' ) . ' '; the_search_query(); ?></header>
    		
			<section id="main" class="col-left">
	            
			<?php if ( have_posts() ) : $count = 0; ?>
	
				<div class="fix"></div>                
				        
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); $count++; ?>
	
					<?php get_template_part( 'content', 'search' ); ?>
	
				<?php endwhile; ?>
	
			<?php else : ?>
	        
	            <article <?php post_class(); ?>>
	                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
	            </article><!-- /.post -->
	        
	        <?php endif; ?>
	
				<?php woo_pagenav(); ?>
	                
	        </section><!-- /#main -->
	
	        <?php get_sidebar(); ?>
        
        </div>

    </div><!-- /#content -->
		
<?php get_footer(); ?>