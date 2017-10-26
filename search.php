<?php
/**
 * The template for displaying search results pages
 *
 *
 *
 */

get_header(); ?>


<div class="container the-container">
		<div class="inner-wrap">
	<div class="row">
        <div class="col-md-8">
			<div class="content">
					<?php 
						if ( have_posts() ) : ?>
							<header class="entry-header">
								<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'luminous' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->
							<?php while ( have_posts() ) : the_post();
			
								get_template_part( 'content', get_post_format());
							endwhile;

						else :
							esc_html_e( 'Sorry, nothing found!', 'luminous' );
						get_search_form();
						endif; ?>

			</div>
			<div class="navigation">
                       <div class="previous"><?php esc_html(previous_posts_link( __( '&laquo; Previous Page','luminous' ))); ?></div>
                        <div class="next"><?php esc_html(next_posts_link( __('Next Page &raquo;', 'luminous' ))); ?></div>
            </div>
		</div>	
	<?php 
	get_sidebar(); ?>
	</div> <!--/ row-->
	</div> <!-- /inner-wrap-->
</div> <!--/ container-->
<?php get_footer();
?>