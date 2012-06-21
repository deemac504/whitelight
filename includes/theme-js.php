<?php
if ( ! is_admin() ) { add_action( 'wp_enqueue_scripts', 'woothemes_add_javascript' ); }

if ( ! function_exists( 'woothemes_add_javascript' ) ) {
	function woothemes_add_javascript() {
	
		global $woo_options;
		
		wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/includes/js/jquery.prettyPhoto.js', array( 'jquery' ) );
		wp_register_script( 'portfolio', get_template_directory_uri() . '/includes/js/portfolio.js', array( 'jquery', 'prettyPhoto' ) );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider.min.js', array( 'jquery' ) );
		// Feedback Scripts
		wp_register_script( 'slides', get_template_directory_uri() . '/includes/js/slides.min.jquery.js', array( 'jquery' ) );
		wp_register_script( 'woo-feedback', get_template_directory_uri() . '/includes/js/feedback.js', array( 'jquery', 'slides' ) );
		
		if ( ( is_home() || is_front_page() ) && isset( $woo_options['woo_featured'] ) && ( $woo_options['woo_featured'] == 'true' ) ) {
			wp_enqueue_script( 'flexslider' );
		}
		
		if ( is_page_template( 'template-portfolio.php' ) || is_front_page() || ( is_singular() && get_post_type() == 'portfolio' ) || is_tax( 'portfolio-gallery' ) || is_post_type_archive( 'portfolio' ) ) {			
			wp_enqueue_script( 'portfolio' );
		}

		wp_enqueue_script( 'third-party', get_template_directory_uri() . '/includes/js/third-party.js', array( 'jquery' ) );
		wp_enqueue_script( 'general', get_template_directory_uri() . '/includes/js/general.js', array( 'jquery', 'third-party' ) );
		
		// Conditionally load the Feedback JavaScript, where needed.
		$load_feedback_js = false;
			 
		// Allow child themes/plugins to load the Feedback JavaScript when they need it.
		$load_feedback_js = apply_filters( 'woo_load_feedback_js', $load_feedback_js );

		if ( $load_feedback_js && ( is_active_widget( false, false, 'woo_feedback', true ) || is_page_template( 'template-feedback.php' ) ) ) { wp_enqueue_script( 'woo-feedback' ); }
		
		do_action( 'woothemes_add_javascript' );
		
	}
	
}

if ( ! is_admin() ) { add_action( 'wp_print_styles', 'woothemes_add_css' ); }

if ( ! function_exists( 'woothemes_add_css' ) ) {
	function woothemes_add_css () {
		
		wp_register_style( 'prettyPhoto', get_template_directory_uri().'/includes/css/prettyPhoto.css' );
	
		if ( is_page_template('template-portfolio.php') || is_front_page() || ( is_singular() && get_post_type() == 'portfolio' ) || is_tax( 'portfolio-gallery' ) || is_post_type_archive( 'portfolio' ) ) {
			wp_enqueue_style( 'prettyPhoto' );
		}
	
		do_action( 'woothemes_add_css' );
	
	} // End woothemes_add_css()
}

?>