<?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	
	/**
 	* The Variables
 	*
 	* Setup default variables, overriding them if the "Theme Options" have been saved.
 	*/
	
	$settings = array(
					'featured' => 'false',
					'custom_intro_message' => 'true',
					'custom_intro_message_text' => '',
					'features_area' => 'true',
					'portfolio_area' => 'true',
					'blog_area' => 'false',
					'alt_blog_area' => 'false'
					);
					
	$settings = woo_get_dynamic_values( $settings );
	if ( get_query_var( 'page' ) > 1) { $paged = get_query_var( 'page' ); } elseif ( get_query_var( 'paged' ) > 1) { $paged = get_query_var( 'paged' ); } else { $paged = 1; } 
?>
		
	<?php if ( ( $paged == 1 ) && $settings['custom_intro_message'] == "true" ) { ?>
	<section id="intro">
    	<div class="col-full">
        	<h1><?php echo stripslashes( $settings['custom_intro_message_text'] ); ?></h1>
    	</div>
    </section>
    <?php } ?>
	
    <div id="content">
    	<div class="col-full">
    	
    	<?php
    	/* Make sure we switch to the selected layout if a custom layout isn't set. */
		if ( ! is_active_sidebar( 'homepage' ) ) {
		
			// Output the Features Area	
			if ( ( $paged == 1 ) && $settings['features_area'] == 'true' ) { get_template_part( 'includes/homepage-features-panel' ); } 
			
			// Output the Portfolio Area	
			if ( ( $paged == 1 ) && $settings['portfolio_area'] == 'true' ) { get_template_part( 'includes/homepage-portfolio-panel' ); } 
			
			// Output the Blog Area	
			if ( $settings['alt_blog_area'] == 'true' ) { get_template_part( 'includes/homepage-blog-alt-panel' ); } 

			// Output the Content Area	
			if ( $settings['blog_area'] == 'true' ) { get_template_part( 'includes/homepage-blog-panel' ); } 
		
		} else {
			
			// Output the Widgetized Area
			dynamic_sidebar( 'homepage' );
		
		} // End If Statement
		?>
    	
		</div><!-- /.col-full -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>