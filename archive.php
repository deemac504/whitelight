<?php get_header(); ?>
    
    <div id="content">
    	<div class="col-full">
    		
    		<?php if ( $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?>
			
			<?php if (is_category()) { ?>
	        	<header class="archive_header">
	        		<span class="fl cat"><?php _e( 'Archive', 'woothemes' ); ?> | <?php echo single_cat_title(); ?></span> 
	        		<span class="fr catrss"><?php $cat_id = get_cat_ID( single_cat_title( '', false ) ); echo '<a href="' . get_category_feed_link( $cat_id, '' ) . '">' . __( "RSS feed for this section", "woothemes" ) . '</a>'; ?></span>
	        	</header>        
	        
	            <?php } elseif (is_day()) { ?>
	            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( get_option( 'date_format' ) ); ?></header>
	
	            <?php } elseif (is_month()) { ?>
	            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'F, Y' ); ?></header>
	
	            <?php } elseif (is_year()) { ?>
	            <header class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'Y' ); ?></header>
	
	            <?php } elseif (is_author()) { ?>
	            <header class="archive_header"><?php _e( 'Archive by Author', 'woothemes' ); ?></header>
	
	            <?php } elseif (is_tag()) { ?>
	            <header class="archive_header"><?php _e( 'Tag Archives:', 'woothemes' ); ?> <?php echo single_tag_title( '', true ); ?></header>
	            
	            <?php } ?>
	
	        <?php
	        	// Display the description for this archive, if it's available.
	        	woo_archive_description();
	        ?>
	        
		        <div class="fix"></div>
    	
			<section id="main" class="col-left">
	
			<?php if (have_posts()) : $count = 0; ?>
	        
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); $count++; ?>
	
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
	
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