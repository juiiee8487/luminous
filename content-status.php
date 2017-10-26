			<div class="post-wrap">
               


                    <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
                    <div class="post-meta">
                        <span class="post-user">
                           <?php esc_html_e('By ','luminous'); ?><?php the_author_posts_link(); ?>
                        </span>
                        <span class="post-time-stamp">!@
                            <?php the_time(get_option('date_format')); ?>&nbsp;
                        </span>
                    </div>


                    <!-- Display the Post's content in a div box. -->

                    <div class="entry">
                        <?php the_excerpt(); ?>
                    </div>
			</div>
