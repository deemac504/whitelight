<?php
if (!function_exists( 'woo_options')) {
function woo_options() {

// THEME VARIABLES
$themename = "Whitelight";
$themeslug = "whitelight";

// STANDARD VARIABLES. DO NOT TOUCH!
$shortname = "woo";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/'.$themeslug.'/';

//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; } 
$woo_pages_raw = $woo_pages;
$woo_pages_raw[0] = "Select a page:";
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:" );

//Stylesheets Reader
$alt_stylesheet_path = get_template_directory() . '/styles/';
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }
    }
}

//More Options
$other_entries = array( "Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19" );

// THIS IS THE DIFFERENT FIELDS
$options = array();

// General

$options[] = array( "name" => "General Settings",
					"type" => "heading",
					"icon" => "general" );
					
$options[] = array( "name" => "Quick Start",
					"type" => "subheading");

$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify an image URL directly.",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Text Title",
					"desc" => "Enable text-based Site Title and Tagline. Setup title & tagline in <a href='".home_url()."/wp-admin/options-general.php'>General Settings</a>.",
					"id" => $shortname."_texttitle",
					"std" => "false",
					"class" => "collapsed",
					"type" => "checkbox" );

$options[] = array( "name" => "Site Title",
					"desc" => "Change the site title typography.",
					"id" => $shortname."_font_site_title",
					"std" => array( 'size' => '24','unit' => 'px','face' => 'Arial','style' => 'bold','color' => '#222222'),
					"class" => "hidden",
					"type" => "typography" );

$options[] = array( "name" => "Site Description",
					"desc" => "Enable the site description/tagline under site title.",
					"id" => $shortname."_tagline",
					"class" => "hidden",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Site Description",
					"desc" => "Change the site description typography.",
					"id" => $shortname."_font_tagline",
					"std" => array( 'size' => '10','unit' => 'px','face' => 'Arial','style' => '','color' => '#666666'),
					"class" => "hidden last",
					"type" => "typography" );

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px <a href='http://www.faviconr.com/'>ico image</a> that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea" );
					
$options[] = array( "name" => "Subscription Settings",
					"type" => "subheading");

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feed_url",
					"std" => "",
					"type" => "text" );

$options[] = array( "name" => "Display Options",
					"type" => "subheading");

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea" );

$options[] = array( "name" => "Post/Page Comments",
					"desc" => "Select if you want to enable/disable comments on posts and/or pages. ",
					"id" => $shortname."_comments",
					"type" => "select2",
					"options" => array( "post" => "Posts Only", "page" => "Pages Only", "both" => "Pages / Posts", "none" => "None") );

$options[] = array( "name" => "Post Content",
					"desc" => "Select if you want to show the full content or the excerpt on posts. ",
					"id" => $shortname."_post_content",
					"type" => "select2",
					"options" => array( "excerpt" => "The Excerpt", "content" => "Full Content" ) );

$options[] = array( "name" => "Post Author Box",
					"desc" => "This will enable the post author box on the single posts page. Edit description in <a href='".home_url()."/wp-admin/profile.php'>Profile</a>.",
					"id" => $shortname."_post_author",
					"std" => "true",
					"type" => "checkbox" );

$options[] = array( "name" => "Display Breadcrumbs",
					"desc" => "Display dynamic breadcrumbs on each page of your website.",
					"id" => $shortname."_breadcrumbs_show",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Pagination Style",
					"desc" => "Select the style of pagination you would like to use on the blog.",
					"id" => $shortname."_pagination_type",
					"type" => "select2",
					"options" => array( "paginated_links" => "Numbers", "simple" => "Next/Previous" ) );

// Styling

$options[] = array( "name" => "Styling Options",
					"type" => "heading",
					"icon" => "styling" );

$options[] = array( "name" => "Background",
					"type" => "subheading");

$options[] = array( "name" =>  "Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #697e09",
					"id" => "woo_body_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" => "Background Image",
					"desc" => "Upload an image for the theme's background",
					"id" => $shortname."_body_img",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Background Image Repeat",
                    "desc" => "Select how you would like to repeat the background-image",
                    "id" => $shortname."_body_repeat",
                    "std" => "no-repeat",
                    "type" => "select",
                    "options" => array( "no-repeat","repeat-x","repeat-y","repeat"));

$options[] = array( "name" => "Background Image Position",
                    "desc" => "Select how you would like to position the background",
                    "id" => $shortname."_body_pos",
                    "std" => "top",
                    "type" => "select",
                    "options" => array( "top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"));
                    
$options[] = array( "name" => "Header",
					"type" => "subheading");
                    
$options[] = array( "name" =>  "Header Background Color",
					"desc" => "Pick a custom color for background color of the theme's header e.g. #697e09",
					"id" => "woo_header_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" => "Header Background Image",
					"desc" => "Upload an image for the theme's header background",
					"id" => $shortname."_header_img",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Header Background Image Repeat",
                    "desc" => "Select how you would like to repeat the header background-image",
                    "id" => $shortname."_header_repeat",
                    "std" => "no-repeat",
                    "type" => "select",
                    "options" => array( "no-repeat","repeat-x","repeat-y","repeat"));

$options[] = array( "name" => "Header Background Image Position",
                    "desc" => "Select how you would like to position the header background",
                    "id" => $shortname."_header_pos",
                    "std" => "top",
                    "type" => "select",
                    "options" => array( "top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"));
                    
$options[] = array( "name" => "Slider",
					"type" => "subheading");
                    
$options[] = array( "name" =>  "Slider Background Color",
					"desc" => "Pick a custom color for background color of the theme's slider e.g. #697e09",
					"id" => "woo_slider_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" => "Slider Background Image",
					"desc" => "Upload an image for the theme's header background",
					"id" => $shortname."_slider_img",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Slider Background Image Repeat",
                    "desc" => "Select how you would like to repeat the slider background-image",
                    "id" => $shortname."_slider_repeat",
                    "std" => "no-repeat",
                    "type" => "select",
                    "options" => array( "no-repeat","repeat-x","repeat-y","repeat"));

$options[] = array( "name" => "Slider Background Image Position",
                    "desc" => "Select how you would like to position the slider background",
                    "id" => $shortname."_slider_pos",
                    "std" => "top",
                    "type" => "select",
                    "options" => array( "top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"));
                    
$options[] = array( "name" => "Intro Section",
					"type" => "subheading");
                    
$options[] = array( "name" =>  "Intro Section Background Color",
					"desc" => "Pick a custom color for background color of the theme's intro section e.g. #697e09",
					"id" => "woo_intro_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" => "Intro Section Background Image",
					"desc" => "Upload an image for the theme's intro section background",
					"id" => $shortname."_intro_img",
					"std" => "",
					"type" => "upload" );

$options[] = array( "name" => "Intro Section Background Image Repeat",
                    "desc" => "Select how you would like to repeat the intro section background-image",
                    "id" => $shortname."_intro_repeat",
                    "std" => "no-repeat",
                    "type" => "select",
                    "options" => array( "no-repeat","repeat-x","repeat-y","repeat"));

$options[] = array( "name" => "Intro Section Background Image Position",
                    "desc" => "Select how you would like to position the intro section background",
                    "id" => $shortname."_intro_pos",
                    "std" => "top",
                    "type" => "select",
                    "options" => array( "top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"));

$options[] = array( "name" => "Links",
					"type" => "subheading");

$options[] = array( "name" =>  "Link Color",
					"desc" => "Pick a custom color for links or add a hex color code e.g. #697e09",
					"id" => "woo_link_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" =>  "Link Hover Color",
					"desc" => "Pick a custom color for links hover or add a hex color code e.g. #697e09",
					"id" => "woo_link_hover_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" =>  "Button Color",
					"desc" => "Pick a custom color for buttons or add a hex color code e.g. #697e09",
					"id" => "woo_button_color",
					"std" => "",
					"type" => "color" );

$options[] = array( "name" =>  "Navigation Hover &amp; Dropdowns Color",
					"desc" => "Pick a custom color for navigation hover &amp; dropdowns or add a hex color code e.g. #697e09",
					"id" => "woo_navhover_color",
					"std" => "",
					"type" => "color" );


/* Typography */

$options[] = array( "name" => "Typography",
					"type" => "heading",
					"icon" => "typography" );

$options[] = array( "name" => "Enable Custom Typography",
					"desc" => "Enable the use of custom typography for your site. Custom styling will be output in your sites HEAD.",
					"id" => $shortname."_typography",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "General Typography",
					"desc" => "Change the general font.",
					"id" => $shortname."_font_body",
					"std" => array( 'size' => '13','unit' => 'px','face' => 'Arial','style' => 'normal','color' => '#585858'),
					"type" => "typography" );

$options[] = array( "name" => "Navigation",
					"desc" => "Change the navigation font.",
					"id" => $shortname."_font_nav",
					"std" => array( 'size' => '17','unit' => 'px','face' => 'Signika','style' => 'normal','color' => '#4B4B4B'),
					"type" => "typography" );

$options[] = array( "name" => "Intro Section",
					"desc" => "Change the page title.",
					"id" => $shortname."_font_intro_section",
					"std" => array( 'size' => '23','unit' => 'px','face' => 'Signika','style' => 'normal','color' => '#585858'),
					"type" => "typography" );

$options[] = array( "name" => "Page Title",
					"desc" => "Change the page title.",
					"id" => $shortname."_font_page_title",
					"std" => array( 'size' => '22','unit' => 'px','face' => 'Signika','style' => 'bold','color' => '#252525'),
					"type" => "typography" );

$options[] = array( "name" => "Post Title",
					"desc" => "Change the post title.",
					"id" => $shortname."_font_post_title",
					"std" => array( 'size' => '22','unit' => 'px','face' => 'Signika','style' => 'bold','color' => '#252525'),
					"type" => "typography" );

$options[] = array( "name" => "Post Meta",
					"desc" => "Change the post meta.",
					"id" => $shortname."_font_post_meta",
					"std" => array( 'size' => '13','unit' => 'px','face' => 'Arial','style' => '','color' => '#727272'),
					"type" => "typography" );

$options[] = array( "name" => "Post Entry",
					"desc" => "Change the post entry.",
					"id" => $shortname."_font_post_entry",
					"std" => array( 'size' => '13','unit' => 'px','face' => 'Arial','style' => '','color' => '#585858'),
					"type" => "typography" );

$options[] = array( "name" => "Widget Titles",
					"desc" => "Change the widget titles.",
					"id" => $shortname."_font_widget_titles",
					"std" => array( 'size' => '13','unit' => 'px','face' => 'Arial','style' => 'bold','color' => '#585858'),
					"type" => "typography" );

/* Layout */

$options[] = array( "name" => "Layout Options",
					"type" => "heading",
					"icon" => "layout" );

$url =  get_template_directory_uri() . '/functions/images/';
$options[] = array( "name" => "Main Layout",
					"desc" => "Select which layout you want for your site.",
					"id" => $shortname."_site_layout",
					"std" => "layout-left-content",
					"type" => "images",
					"options" => array(
						'layout-left-content' => $url . '2cl.png',
						'layout-right-content' => $url . '2cr.png')
					);

$options[] = array( "name" => "Header - Search Field",
                    "desc" => "Enable the search field in the header area.",
                    "id" => $shortname."_header_search",
                    "std" => "true",
                    "type" => "checkbox");

/* Homepage */

$options[] = array( "name" => "Homepage Options",
					"type" => "heading",
					"icon" => "homepage" );

$options[] = array( "name" => "Intro Message",
					"type" => "subheading" );

$options[] = array( "name" => "Enable Homepage Intro Message",
                    "desc" => "Enable the intro message area on the homepage.",
                    "id" => $shortname."_custom_intro_message",
                    "std" => "true",
                    "type" => "checkbox");
                    
$options[] = array( "name" => "Homepage Intro Message",
                    "desc" => "Enter a welcome message for your homepage to be displayed under the slider area.",
                    "id" => $shortname."_custom_intro_message_text",
                    "std" => 'Whitelight features a full width slider and a widgetized homepage, allowing you full control over how you showcase your business. <a href="http://woothemes.com/2012/02/whitelight/">Read more</a> about all the cool features!',
                    "type" => "textarea" );

$options[] = array( "name" => "Features Area",
					"type" => "subheading" );
					
$options[] = array( "name" => "Enable Features Area",
                    "desc" => "Enable the features area on the homepage.",
                    "id" => $shortname."_features_area",
                    "std" => "true",
                    "type" => "checkbox");					

$options[] = array( "name" => "Number of Features",
                    "desc" => "Select the number of features that should appear in the features area on the home page.",
                    "id" => $shortname."_features_area_entries",
                    "std" => "3",
                    "type" => "select",
                    "options" => $other_entries);

$options[] = array(    "name" => __( 'Features Order', 'woothemes' ),
                    "desc" => __( 'Select which way you wish to order your features.', 'woothemes' ),
                    "id" => $shortname."_features_area_order",
                    "std" => "DESC",
					"type" => "select2",
					"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );   
					                    
$options[] = array( "name" => "Features Area Title Text",
					"desc" => "Enter the title for the features area to be displayed on your homepage.",
					"id" => $shortname."_features_area_title",
					"std" => "Some of our Features",
					"type" => "text" );
										
$options[] = array( "name" => "Features Area Message",
                    "desc" => "Enter the message for the features area to be displayed on your homepage.",
                    "id" => $shortname."_features_area_message",
                    "std" => 'This is where your latest Features custom posts will show up. You can change this text in the options.',
                    "type" => "textarea" );

$options[] = array( "name" => "Features Area Link Text",
					"desc" => "Enter the text for the link to the features archive page in the features area to be displayed on your homepage.",
					"id" => $shortname."_features_area_link_text",
					"std" => "View all our Features",
					"type" => "text" );

$options[] = array( "name" => "Features Area Link URL (optional)",
					"desc" => "Enter an custom URL for the features archive page link.",
					"id" => $shortname."_features_area_link_URL",
					"std" => "",
					"type" => "text" );

$options[] = array( "name" => __( 'Features Items URL Base', 'woothemes' ),
						"desc" => sprintf( __( 'The base of all feature item URLs (re-save the %s after changing this setting).', 'woothemes' ), '<a href="' . admin_url( 'options-permalink.php' ) . '">' . __( 'Permalinks', 'woothemes' ) . '</a>' ),
						"id" => $shortname."_features_rewrite",
						"std" => "features",
						"type" => "text");
						
$options[] = array( "name" => "Portfolio Area",
					"type" => "subheading" );
					
$options[] = array( "name" => "Enable Portfolio Area",
                    "desc" => "Enable the portfolio area on the homepage.",
                    "id" => $shortname."_portfolio_area",
                    "std" => "true",
                    "type" => "checkbox");					

$options[] = array( "name" => "Number of Portfolio items",
                    "desc" => "Select the number of portfolio items that should appear in the portfolio area on the home page.",
                    "id" => $shortname."_portfolio_area_entries",
                    "std" => "3",
                    "type" => "select",
                    "options" => $other_entries);
                    
$options[] = array(    "name" => __( 'Portfolio Order', 'woothemes' ),
                    "desc" => __( 'Select which way you wish to order your porfolio items.', 'woothemes' ),
                    "id" => $shortname."_portfolio_area_order",
                    "std" => "DESC",
					"type" => "select2",
					"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );   

$options[] = array( "name" => "Portfolio Area Title Text",
					"desc" => "Enter the title for the portfolio area to be displayed on your homepage.",
					"id" => $shortname."_portfolio_area_title",
					"std" => "Recent Work",
					"type" => "text" );
										
$options[] = array( "name" => "Portfolio Area Message",
                    "desc" => "Enter the message for the portfolio area to be displayed on your homepage.",
                    "id" => $shortname."_portfolio_area_message",
                    "std" => 'This is where your latest Portfolio custom posts will show up. You can change this text in the options.',
                    "type" => "textarea" );

$options[] = array( "name" => "Portfolio Area Link Text",
					"desc" => "Enter the text for the link to the portfolio items archive page in the features area to be displayed on your homepage.",
					"id" => $shortname."_portfolio_area_link_text",
					"std" => "View more work",
					"type" => "text" );					

$options[] = array( "name" => "Portfolio Area Link URL (optional)",
					"desc" => "Enter an custom URL for the portfolio archive page link.",
					"id" => $shortname."_portfolio_area_link_URL",
					"std" => "",
					"type" => "text" );
					

$options[] = array( "name" => "Content Area",
					"type" => "subheading" );

$options[] = array( "name" => "Enable Content Area",
                    "desc" => "Enable the content area on the homepage.",
                    "id" => $shortname."_blog_area",
                    "std" => "false",
                    "type" => "checkbox");					

$options[] = array( "name" => "Content Area Content",
                    "desc" => "Choose to display either blog posts or a page in the content area.",
                    "id" => $shortname."_blog_area_content",
                    "std" => "blog",
					"type" => "select2",
					"options" => array( 'blog' => 'Blog Posts', 'page' => 'Page Content' ) );
					
$options[] = array( "name" => "Number of Blog posts",
                    "desc" => "Select the number of blog posts that should appear in the blog area on the home page.",
                    "id" => $shortname."_blog_area_entries",
                    "std" => "3",
                    "type" => "select",
                    "options" => $other_entries); 
					
$options[] = array( "name" => "Category Exclude - Homepage",
					"desc" => "Specify a comma seperated list of category IDs or slugs that you'd like to exclude from your homepage (eg: uncategorized).",
					"id" => $shortname."_exclude_cats_home",
					"std" => "",
					"type" => "text" );

$options[] = array( "name" => "Page Content",
                    "desc" => "Select the page to display in the blog area.",
                    "id" => $shortname."_blog_area_page",
                    "std" => "",
                    "type" => "select2",
                    "options" => $woo_pages_raw);

$options[] = array( "name" => "Blog Area",
					"type" => "subheading" );

$options[] = array( "name" => "Enable Blog Area",
                    "desc" => "Enable the blog area on the homepage.",
                    "id" => $shortname."_alt_blog_area",
                    "std" => "false",
                    "type" => "checkbox");					

$options[] = array( "name" => "Blog Area Title Text",
					"desc" => "Enter the title for the blog area alternate layout to be displayed on your homepage.",
					"id" => $shortname."_alt_blog_area_title",
					"std" => "Some of our Blog Posts",
					"type" => "text" );
										
$options[] = array( "name" => "Blog Area Message",
                    "desc" => "Enter the message for the blog area alternate layout to be displayed on your homepage.",
                    "id" => $shortname."_alt_blog_area_message",
                    "std" => 'This is where your latest blog posts will show up. You can change this text in the options.',
                    "type" => "textarea" );

$options[] = array( "name" => "Blog Area Link Text",
					"desc" => "Enter the text for the link to the blog archive page in the features area to be displayed on your homepage.",
					"id" => $shortname."_alt_blog_area_link_text",
					"std" => "View all our blog posts",
					"type" => "text" );

$options[] = array( "name" => "Blog Area Link URL (optional)",
					"desc" => "Enter an custom URL for the blog archive page link.",
					"id" => $shortname."_alt_blog_area_link_URL",
					"std" => "",
					"type" => "text" );

$options[] = array( "name" => "Number of Blog posts",
                    "desc" => "Select the number of blog posts that should appear in the blog area on the home page.",
                    "id" => $shortname."_alt_blog_area_entries",
                    "std" => "3",
                    "type" => "select",
                    "options" => $other_entries); 

$options[] = array( "name" => "Blog Area Thumbnail Image Dimensions",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_alt_blog_image_dimensions",
					"std" => "",
					"type" => array(
									array(  'id' => $shortname. '_blog_thumb_w',
											'type' => 'text',
											'std' => 215,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_blog_thumb_h',
											'type' => 'text',
											'std' => 120,
											'meta' => 'Height')
								  ));

$options[] = array( "name" => "Blog Area Thumbnail Alignment",
					"desc" => "Select how to align your thumbnails with posts.",
					"id" => $shortname."_alt_blog_thumb_align",
					"std" => "aligncenter",
					"type" => "select2",
					"options" => array( "alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"));
					
$options[] = array(    "name" => __( 'Blog Area Order', 'woothemes' ),
                    "desc" => __( 'Select which way you wish to order your blog posts.', 'woothemes' ),
                    "id" => $shortname."_alt_blog_area_order",
                    "std" => "DESC",
					"type" => "select2",
					"options" => array("DESC" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") ); 
					
					
																				
/* Featured Slider */

$options[] = array( "name" => "Featured Slider",
					"icon" => "slider",
					"type" => "heading");
					
$options[] = array( "name" => "Enable Featured Slider",
                    "desc" => "Enable the featured post slider on the homepage.",
                    "id" => $shortname."_featured",
                    "std" => "true",
                    "type" => "checkbox");
                    
$options[] = array(    "name" => "Slider Entries",
                    "desc" => "Select the number of entries that should appear in the home page slider.",
                    "id" => $shortname."_featured_entries",
                    "std" => "3",
                    "type" => "select",
                    "options" => $other_entries);

$options[] = array( "name" => "Slider type",
                    "desc" => "Choose between the full-width or normal-width featured slider",
                    "id" => $shortname."_featured_type",
                    "std" => "full",
					"type" => "select2",
					"options" => array( 'full' => 'Full Width', 'normal' => 'Normal Width' ) );

$options[] = array(    "name" => "Slider Opacity",
                    "desc" => "Select the opacity for non-active slides when using the Normal Width slider. 0 will hide the slides, 1 will show them without opacity.",
                    "id" => $shortname."_featured_opacity",
                    "std" => "0.5",
                    "type" => "select",
                    "options" => array( '0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1' ));

$options[] = array( "name" => "Slider Image/Video Height",
                    "desc" => "Set the initial height of the slider images/video. Note: The images need to be 960px+ wide for them to be dynamically resized. The full width slider scales the height responsively. ",
                    "id" => $shortname."_featured_height",
                    "std" => "380",
                    "type" => "text");

$options[] = array(    "name" => __( 'Slides Post Order', 'woothemes' ),
                    "desc" => __( 'Select which way you wish to order your slider posts.', 'woothemes' ),
                    "id" => $shortname."_featured_order",
                    "std" => "DESC",
					"type" => "select2",
					"options" => array("desc" => __( 'Newest to oldest', 'woothemes' ), "ASC" => "Oldest to newest", "rand" => "Random order") );   
					

$options[] = array( "name" => "Disable Slider Title/Description on Video Posts",
                    "desc" => "Don't show the title and description if you have a video post in the slider.",
                    "id" => $shortname."_slider_video_title",
                    "std" => "true",
                    "type" => "checkbox"); 

$options[] = array( "name" => "Slider Next/Prev Navigation",
                    "desc" => "Select to enable next/prev slider for the featured slider.",
                    "id" => $shortname."_featured_nextprev",
                    "std" => "true",
                    "type" => "checkbox");

$options[] = array( "name" => "Slider Pagination",
                    "desc" => "Select to enable pagination for the featured slider.",
                    "id" => $shortname."_featured_pagination",
                    "std" => "true",
                    "type" => "checkbox");

$options[] = array( "name" => "Slider Hover Pause",
                    "desc" => "Hovering over featured slider will pause it.",
                    "id" => $shortname."_featured_hover",
                    "std" => "true",
                    "type" => "checkbox");                     

/*
$options[] = array( "name" => __( 'Slider Animation Effect', 'woothemes' ),
					"desc" => __( 'Select the slider animation effect. ', 'woothemes' ),
					"id" => $shortname."_featured_effect",
					"type" => "select2",
					"std" => "slide",
					"options" => array("fade" => "Fade", "slide" => "Slide") );                         

$options[] = array( "name" => __( 'Sliding Direction', 'woothemes' ),
					"desc" => __( 'Select the sliding direction.', 'woothemes' ),
					"id" => $shortname."_featured_sliding_direction",
					"type" => "select2",
					"options" => array("horizontal" => "Horizontal", "vertical" => "Vertical") );                         
*/

$options[] = array( "name" => "Auto Slide Interval",
                    "desc" => "The time in <b>seconds</b> each slide pauses for, before transitioning to the next.",
                    "id" => $shortname."_featured_speed",
                    "std" => "7",
					"type" => "select",
					"options" => array( 'Off', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ) );
                    
$options[] = array( "name" => "Slider Animation Speed",
                    "desc" => "The time in <b>seconds</b> the animation between slides will take.",
                    "id" => $shortname."_featured_animation_speed",
                    "std" => "0.6",
					"type" => "select",
					"options" => array( '0.0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0' ) );
					
/* Portfolio */

$options[] = array( "name" => __( 'Portfolio Settings', 'woothemes' ),
                    "icon" => "portfolio",
					"type" => "heading");
					
/*
$options[] = array( "name" => __( 'Enable Single Portfolio Gallery', 'woothemes' ),
					"desc" => __( 'Enable the gallery feature in the single portfolio page layout.', 'woothemes' ),
					"id" => $shortname."_portfolio_gallery",
					"std" => "true",
					"type" => "checkbox");
*/

$options[] = array( "name" => __( 'Portfolio Items URL Base', 'woothemes' ),
						"desc" => sprintf( __( 'The base of all portfolio item URLs (re-save the %s after changing this setting).', 'woothemes' ), '<a href="' . admin_url( 'options-permalink.php' ) . '">' . __( 'Permalinks', 'woothemes' ) . '</a>' ),
						"id" => $shortname."_portfolioitems_rewrite",
						"std" => "portfolio-items",
						"type" => "text");
						
$options[] = array( "name" => __( 'Exclude Galleries from the Portfolio Navigation', 'woothemes' ),
						"desc" => __( 'Optionally exclude portfolio galleries from the portfolio gallery navigation switcher. Place the gallery slugs here, separated by commas <br />(eg: one, two, three)', 'woothemes' ),
						"id" => $shortname."_portfolio_excludenav",
						"std" => "",
						"type" => "text");

$options[] = array( "name" => __( 'Exclude Portfolio Items from Search Results', 'woothemes' ),
					"desc" => __( 'Exclude portfolio items from results when searching your website.', 'woothemes' ),
					"id" => $shortname."_portfolio_excludesearch",
					"std" => "false",
					"type" => "checkbox");

$options[] = array( "name" => __( 'Portfolio Items Link To', 'woothemes' ),
                    "desc" => __( 'Do the portfolio items link to the lightbox, or to the single portfolio item screen?', 'woothemes' ),
                    "id" => $shortname."_portfolio_linkto",
                    "std" => "post",
					"type" => "select2",
					"options" => array( 'lightbox' => __( 'Lightbox', 'woothemes' ), 'post' => __( 'Portfolio Item', 'woothemes' ) ) );	

$options[] = array( "name" => __( 'Enable Pagination in Portfolio', 'woothemes' ),
					"desc" => __( 'Enable pagination in the portfolio section (disables JavaScript filtering by category)', 'woothemes' ),
					"id" => $shortname."_portfolio_enable_pagination",
					"std" => "false", 
					"class" => 'collapsed', 
					"type" => "checkbox");
					
$options[] = array( "name" => __( 'Number of posts to display on "Portfolio" page template', 'woothemes' ),
						"desc" => __( 'The number of posts to display per page, when pagination is enabled, in the "Portfolio" page template.', 'woothemes' ),
						"id" => $shortname."_portfolio_posts_per_page",
						"std" => get_option( 'posts_per_page' ), 
						"class" => 'hidden last', 
						"type" => "text");

/* Testimonials */

$options[] = array( "name" => __( 'Feedback Settings', 'woothemes' ),
                    "icon" => "misc",
					"type" => "heading");

$options[] = array( "name" => __( 'Disable Feedback Manager', 'woothemes' ),
					"desc" => __( 'Disable the feedback functionality.', 'woothemes' ),
					"id" => $shortname."_feedback_disable",
					"std" => "false",
					"type" => "checkbox");	
					
/* Dynamic Images */
$options[] = array( "name" => "Dynamic Images",
					"type" => "heading",
					"icon" => "image" );
					
$options[] = array( "name" => "Resizer Settings",
					"type" => "subheading" );

$options[] = array( "name" => 'Dynamic Image Resizing',
					"desc" => "",
					"id" => $shortname."_wpthumb_notice",
					"std" => 'There are two alternative methods of dynamically resizing the thumbnails in the theme, <strong>WP Post Thumbnail</strong> or <strong>TimThumb - Custom Settings panel</strong>. We recommend using WP Post Thumbnail option.',
					"type" => "info");					

$options[] = array( "name" => "WP Post Thumbnail",
					"desc" => "Use WordPress post thumbnail to assign a post thumbnail. Will enable the <strong>Featured Image panel</strong> in your post sidebar where you can assign a post thumbnail.",
					"id" => $shortname."_post_image_support",
					"std" => "true",
					"class" => "collapsed",
					"type" => "checkbox" );

$options[] = array( "name" => "WP Post Thumbnail - Dynamic Image Resizing",
					"desc" => "The post thumbnail will be dynamically resized using native WP resize functionality. <em>(Requires PHP 5.2+)</em>",
					"id" => $shortname."_pis_resize",
					"std" => "true",
					"class" => "hidden",
					"type" => "checkbox" );

$options[] = array( "name" => "WP Post Thumbnail - Hard Crop",
					"desc" => "The post thumbnail will be cropped to match the target aspect ratio (only used if 'Dynamic Image Resizing' is enabled).",
					"id" => $shortname."_pis_hard_crop",
					"std" => "true",
					"class" => "hidden last",
					"type" => "checkbox" );

$options[] = array( "name" => "TimThumb - Custom Settings Panel",
					"desc" => "This will enable the <a href='http://code.google.com/p/timthumb/'>TimThumb</a> (thumb.php) script which dynamically resizes images added through the <strong>custom settings panel below the post</strong>. Make sure your themes <em>cache</em> folder is writable. <a href='http://www.woothemes.com/2008/10/troubleshooting-image-resizer-thumbphp/'>Need help?</a>",
					"id" => $shortname."_resize",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Automatic Image Thumbnail",
					"desc" => "If no thumbnail is specifified then the first uploaded image in the post is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Thumbnail Settings",
					"type" => "subheading" );

$options[] = array( "name" => "Thumbnail Image Dimensions",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array(
									array(  'id' => $shortname. '_thumb_w',
											'type' => 'text',
											'std' => 540,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_h',
											'type' => 'text',
											'std' => 180,
											'meta' => 'Height')
								  ));

$options[] = array( "name" => "Thumbnail Alignment",
					"desc" => "Select how to align your thumbnails with posts.",
					"id" => $shortname."_thumb_align",
					"std" => "aligncenter",
					"type" => "select2",
					"options" => array( "alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"));
					
$options[] = array( "name" => "Single Post - Show Thumbnail",
					"desc" => "Show the thumbnail in the single post page.",
					"id" => $shortname."_thumb_single",
					"class" => "collapsed",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Add thumbnail to RSS feed",
					"desc" => "Add the the image uploaded via your Custom Settings panel to your RSS feed",
					"id" => $shortname."_rss_thumb",
					"std" => "false",
					"type" => "checkbox" );

/* Footer */
$options[] = array( "name" => "Footer Customization",
					"type" => "heading",
					"icon" => "footer" );


$url =  get_template_directory_uri() . '/functions/images/';
$options[] = array( "name" => "Footer Widget Areas",
					"desc" => "Select how many footer widget areas you want to display.",
					"id" => $shortname."_footer_sidebars",
					"std" => "4",
					"type" => "images",
					"options" => array(
						'0' => $url . 'layout-off.png',
						'1' => $url . 'footer-widgets-1.png',
						'2' => $url . 'footer-widgets-2.png',
						'3' => $url . 'footer-widgets-3.png',
						'4' => $url . 'footer-widgets-4.png')
					);

$options[] = array( "name" => "Custom Affiliate Link",
					"desc" => "Add an affiliate link to the WooThemes logo in the footer of the theme.",
					"id" => $shortname."_footer_aff_link",
					"std" => "",
					"type" => "text" );

$options[] = array( "name" => "Enable Custom Footer (Left)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_left",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Custom Text (Left)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_left_text",
					"std" => "",
					"type" => "textarea" );

$options[] = array( "name" => "Enable Custom Footer (Right)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_right",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Custom Text (Right)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_right_text",
					"std" => "",
					"type" => "textarea" );

/* Subscribe & Connect */
$options[] = array( "name" => "Subscribe & Connect",
					"type" => "heading",
					"icon" => "connect" );

$options[] = array( "name" => "Enable Subscribe & Connect - Single Post",
					"desc" => "Enable the subscribe & connect area on single posts. You can also add this as a <a href='".home_url()."/wp-admin/widgets.php'>widget</a> in your sidebar.",
					"id" => $shortname."_connect",
					"std" => 'false',
					"type" => "checkbox" );

$options[] = array( "name" => "Subscribe Title",
					"desc" => "Enter the title to show in your subscribe & connect area.",
					"id" => $shortname."_connect_title",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Text",
					"desc" => "Change the default text in this area.",
					"id" => $shortname."_connect_content",
					"std" => '',
					"type" => "textarea" );

$options[] = array( "name" => "Subscribe By E-mail ID (Feedburner)",
					"desc" => "Enter your <a href='http://www.google.com/support/feedburner/bin/answer.py?hl=en&answer=78982'>Feedburner ID</a> for the e-mail subscription form.",
					"id" => $shortname."_connect_newsletter_id",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => 'Subscribe By E-mail to MailChimp', 'woothemes',
					"desc" => 'If you have a MailChimp account you can enter the <a href="http://woochimp.heroku.com" target="_blank">MailChimp List Subscribe URL</a> to allow your users to subscribe to a MailChimp List.',
					"id" => $shortname."_connect_mailchimp_list_url",
					"std" => '',
					"type" => "text");

$options[] = array( "name" => "Enable RSS",
					"desc" => "Enable the subscribe and RSS icon.",
					"id" => $shortname."_connect_rss",
					"std" => 'true',
					"type" => "checkbox" );

$options[] = array( "name" => "Twitter URL",
					"desc" => "Enter your  <a href='http://www.twitter.com/'>Twitter</a> URL e.g. http://www.twitter.com/woothemes",
					"id" => $shortname."_connect_twitter",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Facebook URL",
					"desc" => "Enter your  <a href='http://www.facebook.com/'>Facebook</a> URL e.g. http://www.facebook.com/woothemes",
					"id" => $shortname."_connect_facebook",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "YouTube URL",
					"desc" => "Enter your  <a href='http://www.youtube.com/'>YouTube</a> URL e.g. http://www.youtube.com/woothemes",
					"id" => $shortname."_connect_youtube",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Flickr URL",
					"desc" => "Enter your  <a href='http://www.flickr.com/'>Flickr</a> URL e.g. http://www.flickr.com/woothemes",
					"id" => $shortname."_connect_flickr",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "LinkedIn URL",
					"desc" => "Enter your  <a href='http://www.www.linkedin.com.com/'>LinkedIn</a> URL e.g. http://www.linkedin.com/in/woothemes",
					"id" => $shortname."_connect_linkedin",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Delicious URL",
					"desc" => "Enter your <a href='http://www.delicious.com/'>Delicious</a> URL e.g. http://www.delicious.com/woothemes",
					"id" => $shortname."_connect_delicious",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Google+ URL",
					"desc" => "Enter your <a href='http://plus.google.com/'>Google+</a> URL e.g. https://plus.google.com/104560124403688998123/",
					"id" => $shortname."_connect_googleplus",
					"std" => '',
					"type" => "text" );

$options[] = array( "name" => "Enable Related Posts",
					"desc" => "Enable related posts in the subscribe area. Uses posts with the same <strong>tags</strong> to find related posts. Note: Will not show in the Subscribe widget.",
					"id" => $shortname."_connect_related",
					"std" => 'true',
					"type" => "checkbox" );

/* Advertising */
$options[] = array( "name" => "Advertising",
					"type" => "heading",
					"icon" => "ads" );

$options[] = array( "name" => "Top Ad (468x60px)",
					"type" => "subheading");

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_top",
					"std" => "false",
					"type" => "checkbox" );

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea" );

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/468x60b.jpg",
					"type" => "upload" );

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text" );
					
/* Contact Template Settings */

$options[] = array( 'name' => "Contact Page",
					'icon' => 'maps',
				    'type' => 'heading');    

$options[] = array( 'name' => "Contact Information",
					'type' => 'subheading');

$options[] = array( "name" => "Enable Contact Information Panel",
					"desc" => "Enable the contact informal panel",
					"id" => $shortname."_contact_panel",
					"std" => "false",
					"class" => 'collapsed',
					"type" => "checkbox" );
				    
$options[] = array( 'name' => "Location Name",
					'desc' => "Enter the location name. Example: London Office",
					'id' => $shortname . '_contact_title',
					'std' => '',
					"class" => 'hidden',
					'type' => 'text' );

$options[] = array( 'name' => "Location Address",
					'desc' => "Enter your company's address",
					'id' => $shortname . '_contact_address',
					'std' => '',
					"class" => 'hidden',
					'type' => "textarea" );

$options[] = array( 'name' => "Telephone",
					'desc' => "Enter your telephone number",
					'id' => $shortname . '_contact_number',
					'std' => '',
					"class" => 'hidden',
					'type' => 'text' );

$options[] = array( 'name' => "Fax",
					'desc' => "Enter your fax number",
					'id' => $shortname . '_contact_fax',
					'std' => '',
					"class" => 'hidden last',
					'type' => 'text' );

$options[] = array( "name" => "Contact Form E-Mail",
					"desc" => "Enter your E-mail address to use on the 'Contact Form' page Template.",
					"id" => $shortname."_contactform_email",
					"std" => "",
					"type" => "text" );
					
$options[] = array( 'name' => "Your Twitter username",
					'desc' => "Enter your Twitter username. Example: woothemes",
					'id' => $shortname . '_contact_twitter',
					'std' => '',
					'type' => 'text' );

$options[] = array( "name" => "Enable Subscribe and Connect",
					"desc" => "Enable the subscribe and connect functionality on the contact page template",
					"id" => $shortname."_contact_subscribe_and_connect",
					"std" => "false",
					"type" => "checkbox" );
					
$options[] = array( 'name' => "Maps",
					'type' => 'subheading');
					
$options[] = array( 'name' => "Contact Form Google Maps Coordinates",
					'desc' => 'Enter your Google Map coordinates to display a map on the Contact Form page template and a link to it on the Contact Us widget. You can get these details from <a href="http://www.getlatlon.com/" target="_blank">Google Maps</a>',
					'id' => $shortname . '_contactform_map_coords',
					'std' => '',
					'type' => 'text' );
					
$options[] = array( 'name' => "Disable Mousescroll",
					'desc' => "Turn off the mouse scroll action for all the Google Maps on the site. This could improve usability on your site.",
					'id' => $shortname . '_maps_scroll',
					'std' => '',
					'type' => 'checkbox');

$options[] = array( 'name' => "Map Height",
					'desc' => "Height in pixels for the maps displayed on Single.php pages.",
					'id' => $shortname . '_maps_single_height',
					'std' => "250",
					'type' => 'text');
					
$options[] = array( 'name' => "Default Map Zoom Level",
					'desc' => "Set this to adjust the default in the post & page edit backend.",
					'id' => $shortname . '_maps_default_mapzoom',
					'std' => "9",
					'type' => 'select2',
					'options' => $other_entries);

$options[] = array( 'name' => "Default Map Type",
					'desc' => "Set this to the default rendered in the post backend.",
					'id' => $shortname . '_maps_default_maptype',
					'std' => 'G_NORMAL_MAP',
					'type' => 'select2',
					'options' => array( 'G_NORMAL_MAP' => 'Normal', 'G_SATELLITE_MAP' => 'Satellite','G_HYBRID_MAP' => 'Hybrid', 'G_PHYSICAL_MAP' => 'Terrain' ) );

$options[] = array( 'name' => "Map Callout Text",
					'desc' => "Text or HTML that will be output when you click on the map marker for your location.",
					'id' => $shortname . '_maps_callout_text',
					'std' => "",
					'type' => 'textarea');
					
// Add extra options through function
if ( function_exists( "woo_options_add") )
	$options = woo_options_add($options);

if ( get_option( 'woo_template') != $options) update_option( 'woo_template',$options);
if ( get_option( 'woo_themename') != $themename) update_option( 'woo_themename',$themename);
if ( get_option( 'woo_shortname') != $shortname) update_option( 'woo_shortname',$shortname);
if ( get_option( 'woo_manual') != $manualurl) update_option( 'woo_manual',$manualurl);

// Woo Metabox Options
// Start name with underscore to hide custom key from the user
global $post;
$woo_metaboxes = array();

// Shown on both posts and pages


// Show only on specific post types or page

if ( get_post_type() == 'post' || get_post_type() == 'slide' || !get_post_type() ) {

	// TimThumb is enabled in options
	if ( get_option( 'woo_resize') == "true" ) {
	
		$woo_metaboxes[] = array (	"name" => "image",
									"label" => "Image",
									"type" => "upload",
									"desc" => "Upload an image or enter an URL." );

		$woo_metaboxes[] = array (	"name" => "_image_alignment",
									"std" => "Center",
									"label" => "Image Crop Alignment",
									"type" => "select2",
									"desc" => "Select crop alignment for resized image",
									"options" => array(	"c" => "Center",
														"t" => "Top",
														"b" => "Bottom",
														"l" => "Left",
														"r" => "Right"));
	// TimThumb disabled in the options
	} else {
	
		$woo_metaboxes[] = array (	"name" => "_timthumb-info",
									"label" => "Image",
									"type" => "info",
									"desc" => "<strong>TimThumb</strong> is disabled. Use the <strong>Featured Image</strong> panel in the sidebar instead, or enable TimThumb in the options panel." );

	}

	$woo_metaboxes[] = array (  "name"  => "embed",
					            "std"  => "",
					            "label" => "Embed Code",
					            "type" => "textarea",
					            "desc" => "Enter the video embed code for your video (YouTube, Vimeo or similar)" );

} // End post
elseif ( get_post_type() == 'portfolio' || !get_post_type() ) {

	$woo_metaboxes[] = array (  "name"  => "embed",
					            "std"  => "",
					            "label" => __( "Embed Code", 'woothemes' ),
					            "type" => "textarea",
					            "desc" => __( "Enter the video embed code for your video (YouTube, Vimeo or similar)", 'woothemes' ) );


	$woo_metaboxes[] = array (	
					"name" => "_portfolio_url",
					"std" => "",
					"label" => "Portfolio URL",
					"type" => "text",
					"desc" => "Enter an alternative URL for your Portfolio item. By default it will link to your portfolio post or lightbox."
				);
	
	$woo_metaboxes['lightbox-url'] = array (	
								"name" => "lightbox-url",
								"label" => __( 'Lightbox URL', 'woothemes' ),
								"type" => "text",
								"desc" => sprintf( __( 'Enter an optional URL to show in the %s for this portfolio item.', 'woothemes' ), '<a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/">' . __( 'PrettyPhoto lightbox', 'woothemes' ) . '</a>' ) );

} // End portfolio

if ( get_post_type() == 'slide' || !get_post_type() ) {
	
	$woo_metaboxes[] = array (	"name" => "url",
								"label" => "Slide URL",
								"type" => "text",
								"desc" => "Enter an URL to link the slider title and image to a page e.g. http://yoursite.com/pagename/ (optional) ");

} // End Slide

if( get_post_type() == 'features' || !get_post_type() ){	

	$woo_metaboxes[] = array (	
					"name" => "feature_icon",
					"label" => "Features Icon",
					"type" => "upload",
					"desc" => "Upload icon for use with the Feature ara on the homepage (optimal size: 32x32px) (optional)"
				);
	 
	$woo_metaboxes[] = array (	
					"name" => "feature_excerpt",
					"label" => "Features Excerpt",
					"type" => "textarea",
					"desc" => "Enter the text to show in your Feature on your homepage. If nothing is specified, an excerpt of your post will be output."
				);
	
	$woo_metaboxes[] = array (	
					"name" => "feature_readmore",
					"std" => "",
					"label" => "Features URL",
					"type" => "text",
					"desc" => "Add an alternative URL for your Feature title link. By default it will link to your feature post."
				);

} // End mini



$woo_metaboxes[] = array (	"name" => "_layout",
							"std" => "normal",
							"label" => "Layout",
							"type" => "images",
							"desc" => "Select the layout you want on this specific post/page.",
							"options" => array(
										'layout-default' => $url . 'layout-off.png',
										'layout-full' => get_template_directory_uri() . '/functions/images/' . '1c.png',
										'layout-left-content' => get_template_directory_uri() . '/functions/images/' . '2cl.png',
										'layout-right-content' => get_template_directory_uri() . '/functions/images/' . '2cr.png'));



if( get_post_type() == 'feedback' || !get_post_type()){
							
	$woo_metaboxes['feedback_author'] = array (	
								"name" => "feedback_author",
								"label" => __( 'Feedback Author', 'woothemes' ),
								"type" => "text",
								"desc" => __( 'Enter the name of the author of the feedback e.g. Joe Bloggs', 'woothemes' )
			);
 
	$woo_metaboxes['feedback_url'] = array (	
								"name" => "feedback_url",
								"label" => __( 'Feedback URL', 'woothemes' ),
								"type" => "text",
								"desc" => __( '(optional) Enter the URL to the feedback author e.g. http://www.woothemes.com', 'woothemes' )
			);
							

} // End feedback


// Add extra metaboxes through function
if ( function_exists( "woo_metaboxes_add") )
	$woo_metaboxes = woo_metaboxes_add($woo_metaboxes);

if ( get_option( 'woo_custom_template' ) != $woo_metaboxes) update_option( 'woo_custom_template', $woo_metaboxes );

} // END woo_options()
} // END function_exists()

// Add options to admin_head
add_action( 'admin_head','woo_options' );

//Enable WooSEO on these Post types
$seo_post_types = array( 'post','page','product' );
define( "SEOPOSTTYPES", serialize($seo_post_types));

//Global options setup
add_action( 'init','woo_global_options' );
function woo_global_options(){
	// Populate WooThemes option in array for use in theme
	global $woo_options;
	$woo_options = get_option( 'woo_options' );
}

?>