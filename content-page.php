<?php
/**
 * The default template for displaying content for pages
 */

	global $woo_options;
  
?>

	<article <?php post_class('fix'); ?>>
	
	    <section class="post-body">
	    
			<header>	
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</header>
	
			<section class="entry">
			<?php the_content( ); ?>
			</section>
	
		</section><!-- /.post-body -->

	</article><!-- /.post -->