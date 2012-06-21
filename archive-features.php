<?php get_header(); ?>
    
    <div id="content">
    	<div class="col-full">
    		
    		<?php if ( isset($woo_options['woo_breadcrumbs_show']) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?>
		
			<header class="archive_header"><?php post_type_archive_title(); ?></header>
	
	        <?php
	        	// Display the description for this archive, if it's available.
	        	woo_archive_description();
	        ?>
	        
		        <div class="fix"></div>
    	
			<section id="main" class="col-left">
	
			<?php if (have_posts()) : $count = 0; ?>
	        
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); $count++; ?>
	
					<?php get_template_part( 'content', 'features' ); ?>
	
				<?php endwhile; ?>
	            
	        <?php else: ?>
	        
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