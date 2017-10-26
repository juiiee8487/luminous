<?php
get_header();?>


<div class="container the-container">
	<div class="inner-wrap">
		<div class="row">
			<div class="col-md-8">	
				<article class="post-<?php the_ID(); ?> single-post"  <?php post_class(); ?>>
					<?php esc_html_e('Oi! Wrong page','luminous'); ?>
				</article>
			</div> <!--/ md-8-->
			<?php get_sidebar(); ?>
		</div> <!--/ row-->
	</div> <!-- /inner-wrap-->
</div> <!--/ container-->
<?php get_footer();?>