<?php
/**
 * The default page template
 */

get_header(); ?>

<div class="container the-container">
	<div class="inner-wrap">
	<div class="row">
        <div class="col-md-8">
						<div class="content">
							<?php while ( have_posts() ) : the_post();
									get_template_part( 'content', 'page' ); ?>
							<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								endwhile; ?>					
						</div>

		</div>
	<?php 
	get_sidebar(); ?>
	</div> <!--/ row-->
</div> <!-- /inner-wrap-->
</div> <!--/ container-->

<?php
get_footer(); ?>
