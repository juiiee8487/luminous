<?php
/*
 
 * This is the main template file.
 * This is the most generic template file in a WordPress theme
 * It is used to display a page when nothing more specific matches a query.
 
 */
get_header(); ?>

<?php
	
    if (have_posts()) :?>
<div class="container the-container">
<div class="inner-wrap">
<div class="row">

        <div class="col-md-8">
      
           <?php
			if (have_posts()) :
			while (have_posts()) : the_post();  
            get_template_part('content',get_post_format()); ?>

			<?php endwhile;
			
			else:
				esc_html_e( 'Sorry, nothing found!', 'luminous' );
			endif; ?>      			


    <?php
            else :
                esc_html_e( 'Sorry, nothing to show here, Please checkback later', 'luminous' );
            endif;
    ?>
                <div class="navigation">
                        <div class="previous"><?php esc_html(previous_posts_link(__( '&laquo; Previous Page','luminous' ))); ?></div>
                        <div class="next"><?php esc_html(next_posts_link(__('Next Page &raquo;', 'luminous' ))); ?></div>
                </div>
        </div>

<?php 

	get_sidebar(); ?>
</div>
</div>
</diV>
<?php

get_footer();

?>