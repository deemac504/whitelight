<?php
/**
 * Homepage Blog Panel
 */
 
	/**
 	* The Variables
 	*
 	* Setup default variables, overriding them if the "Theme Options" have been saved.
 	*/
	
	$settings = array(
					'blog_area_content' => 'blog',
					'blog_area_entries' => 3,
					'blog_area_page' => ''
					);
					
	$settings = woo_get_dynamic_values( $settings );
		
?>			
		<div class="home-blog fix">
			
			<section id="main" class="col-left"> 
			
			<?php
				if ( $settings['blog_area_content'] == 'page' ) {
					$page_id = $settings['blog_area_page'];
					query_posts( array( 'post_type' => 'page', 'page_id' => $page_id, 'posts_per_page' => 1, ) );
				} else {
					$number_of_features = $settings['blog_area_entries'];
    				if ( get_query_var( 'page' ) > 1) { $paged = get_query_var( 'page' ); } elseif ( get_query_var( 'paged' ) > 1) { $paged = get_query_var( 'paged' ); } else { $paged = 1; }  
					/* The Query. */
					query_posts( array( 'post_type' => 'post', 'posts_per_page' => $number_of_features, 'paged' => $paged, 'order' => 'DESC', 'orderby' => 'date' ) );
				} // End If Statement
        		if ( have_posts() ) : $count = 0;
        	?>
        	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); $count++; ?>
			
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						if ( $settings['blog_area_content'] == 'page' ) {
							get_template_part( 'content', 'page' );
						} else {
							get_template_part( 'content', get_post_format() );
						}
					?>
			
				<?php endwhile; ?>
			
			<?php else : ?>
        	
        	    <article <?php post_class(); ?>>
        	        <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
        	    </article><!-- /.post -->
        	
        	<?php endif; ?>
			
			<?php woo_pagenav();?>
        	        
			</section><!-- /#main -->
			<?php /* Remove categories filter for sidebar widget */ remove_filter( 'pre_get_posts', 'woo_exclude_categories_homepage' ); ?>
        	<?php get_sidebar(); ?>
        	
    	</div>
    
    	<?php wp_reset_query(); ?>