<?php
get_header();?>


<div class="container the-container">
	<div class="inner-wrap">
	<div class="row">
	
	<div class="col-md-8">
	<?php
		if (have_posts()) :
		while (have_posts()) : the_post();
	?>
	
	<article class="post-<?php the_ID(); ?> single-post"  <?php post_class(); ?>>
		
	<div class="heading"><h1><?php the_title(); ?></h1></div>
	
	
	<!-- Featured Image-->
	<?php if(get_theme_mod( 'featured_image_post_page' ) == 1){ ?>
					<div class="featured-image">
									<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
									} else { ?>
									
							<?php } ?></a>
					</div>
	<?php }	?>
	<!-- /featured image -->
	
		<p class="post-info">
			<?php esc_html_e('By','luminous'); ?><span class="post-author"> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span> 
			&#8212;
			<time datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_time( get_option('date_format') ); ?></time>
			
			<?php esc_html_e(' &#8212; Posted in','luminous'); ?>
			<span class="category"><?php the_category( ', ' ); ?></span>
	
		</p>
	

			<div class="contet-area">
				<?php the_content(); ?>
			
				<?php wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luminous' ),
							'after'  => '</div>',
							) );
				?>
				
				<?php
					if(has_tag()) { ?> <p class="post-tags">			
						<i class="fa fa-tags " style="font-size:14px"></i> 
   						<?php the_tags('<span>'.('Tags:').'</span> ',', ','</p>'); ?> <br>
			
					<?php } else { ?>
					<br>
    			<?php }	?>
			</div>
				
				<?php
					get_template_part('template-part/author-infobox');
				?>
				<div class="comment-block">
						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
				</div>
				

							


	
		</article>
			<?php endwhile;
			
			else:
				esc_html_e( 'Sorry, nothing found!', 'luminous' );

			endif; ?>
	
	


	</div> <!--/ md-8-->
	
	

<?php 
	get_sidebar(); ?>
</div> <!--/ row-->
</div> <!-- /inner-wrap-->
</div> <!--/ container-->
<?php get_footer();

?>