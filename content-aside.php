			<div class="post-wrap">
                <?php if ( has_post_thumbnail() ) { ?>
               <div class="featured-image-wrap">
                       <a href="<?php the_permalink(); ?>">                           
				            <?php the_post_thumbnail(); ?>                          
                        </a>
                </div>
                <?php } else { ?>
                <?php } ?>
               


                    <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
                    <div class="post-meta">
                        <span class="post-user">
                            <i class="fa fa-user"></i>&nbsp;<?php esc_html_e(' By ','luminous'); ?><?php the_author_posts_link(); ?>&nbsp;
                        </span>
                        <span class="post-time-stamp">
                            <i class="fa fa-calendar"></i>&nbsp; <?php the_time(get_option('date_format')); ?>&nbsp;
                        </span>
                        <span class="post-category">
                            <i class="fa fa-folder"></i>&nbsp;&nbsp;<?php the_category( ', ' ); ?> 
                        </span>
                    </div>


                    <!-- Display the Post's content in a div box. -->

                    <div class="entry">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading...','luminous'); ?> </a>
                    </div>
			</div>
