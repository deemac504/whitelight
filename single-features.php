<?php
/**
 * Single Features Template
 *
 * This template is the feature item page template. It is used to display content when someone is viewing a
 * singular view of a feature ('features' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
	
	$settings = array(
					'thumb_single' => 'false', 
					'single_w' => 200, 
					'single_h' => 200, 
					'thumb_single_align' => 'alignright'
					);
					
	$settings = woo_get_dynamic_values( $settings );
?>
       
    <div id="content">
    	
    	<div class="col-full">
    		
    		<?php if ( isset( $woo_options['woo_breadcrumbs_show'] ) && $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
				<section id="breadcrumbs">
					<?php woo_breadcrumbs(); ?>
				</section><!--/#breadcrumbs -->
			<?php } ?>
    		
			<section id="main" class="col-left">
			           
	        <?php
	        	if ( have_posts() ) { $count = 0;
	        		while ( have_posts() ) { the_post(); $count++;
	        ?>
				<article <?php post_class('fix'); ?>>
	
					
	                
	                <div class="post-body">
	
	                	<header>
	                	
		            	    <h1><?php the_title(); ?></h1>
		            	    <span class="post-category"><?php the_category( ', ') ?></span>
	                		
	                	</header>
	                	
	                	<?php echo woo_embed( 'width=580' ); ?>
	               		<?php if ( $settings['thumb_single'] == 'true' && ! woo_embed( '' ) ) { ?><img src="<?php echo get_post_meta( $post->ID, 'feature_icon', true ); ?>" alt="" class="feature-thumb <?php echo $settings['thumb_single_align']; ?>" /><?php } ?>
	                	
	                	<section class="entry">
	                		<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
						</section>
											
						<?php the_tags( '<p class="tags">'.__( 'Tags: ', 'woothemes' ), ', ', '</p>' ); ?>
					
					</div>
	                                
	            </article><!-- .post -->
	            
				<?php woo_subscribe_connect(); ?>
	
		        <nav id="post-entries" class="fix">
		            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
		            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
		        </nav><!-- #post-entries -->
	            <?php
					} // End WHILE Loop
				} else {
			?>
				<article <?php post_class(); ?>>
	            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
				</article><!-- .post -->             
	       	<?php } ?>  
	        
			</section><!-- #main -->
	
	        <?php get_sidebar(); ?>
        
        </div>

    </div><!-- #content -->
		
<?php get_footer(); ?>