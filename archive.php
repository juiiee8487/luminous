<?php
/**
 * The template for displaying archive pages
 *
 * 
 *
 */

get_header(); 

if (have_posts()) :?>
	<div class="container the-container">
		<div class="inner-wrap">
			<div class="row">

	        <div class="col-md-8">
	     		<header class="entry-header">
					<h1 class="page-title"><?php the_archive_title(); ?> </h1>
				</header><!-- .page-header -->

		           <?php
						if (have_posts()) :
							while (have_posts()) : the_post();  
				           		get_template_part('content',get_post_format()); 
				           	endwhile;
						else:
							esc_html_e( 'Sorry, nothing found!', 'luminous' );
						endif; 
			   else :
			         esc_html_e( 'Sorry, nothing to show here, Please checkback later', 'luminous' );
			    endif;	 ?>
	                <div class="navigation">
	                        <div class="previous"><?php esc_html(previous_posts_link( __( '&laquo; Previous Page','luminous' ))); ?></div>
                        <div class="next"><?php esc_html(next_posts_link( __('Next Page &raquo;', 'luminous' ))); ?></div>
	                </div>
	        </div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</diV>
<?php get_footer(); ?>