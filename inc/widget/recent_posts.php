<?php
/*  The recent posts widget with thumbnail!*/

class luminous_recent_posts extends WP_Widget
{
	 function __construct(){

        $widget_ops = array('classname' => 'luminous_recent_posts','description' => __( "Display Recent Posts with this widget or you can also use Luminous Posts widget for more filters.",'luminous') );
		    parent::__construct('luminous_recent_posts', esc_html__('Luminous Recent Posts Widget','luminous'), $widget_ops);

			}

    function widget($args , $instance) {

	extract($args);
	$title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        //$title = isset($instance['title']) ? $instance['title'] : esc_html_e('recent Posts','luminous');
        $limit = isset($instance['limit']) ? $instance['limit'] : 5;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

      echo $before_widget;
      echo $before_title;
      echo esc_html( $title );
      echo $after_title;



		/**
		 * Widget Content
		 */

	 ?>

    <!-- recent posts -->
          <div class="recent-post-widget">

                <?php

                  $recent_post_args = array(
                      'posts_per_page' => $limit,
                      'post_type' => 'post',
                      'order' => 'DESC',
                      'ignore_sticky_posts' => 1 );
                  $recent_query = new WP_Query($recent_post_args);                  
                  // Check if zilla likes plugin exists                   
                  if($recent_query->have_posts()) : while($recent_query->have_posts()) : $recent_query->the_post();

                    ?>

                        <?php if(get_the_content() != '') : ?>

						
                        <!-- recent post  -->
                        <div class="the-recent-post">
                          <!--featured image -->
                          <div class="recent-featured-img">
                                <a href="<?php the_permalink();?>"><?php
                                if(get_post_format() != 'quote' || get_post_format() != 'aside' || get_post_format() != 'status') {
                                  echo get_the_post_thumbnail(get_the_ID() , 'luminous_recent_post');
                                }
              					?></a>

                          </div> <!--post image -->

                          <!-- content -->
                          <div class="recent-meta">

                             <div class="recent-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                             <?php if ( $show_date ) : ?>
                             </div>
                             <div class="recent-post-date"><?php the_time(get_option('date_format')); ?></div>
                              <?php endif; ?>
								              
                          </div><!-- end content -->
                        </div><!-- end recent -->

                        <?php endif; ?>

                    <?php

                  endwhile; endif; wp_reset_postdata();

                 ?>

          </div> <!-- end wrapper -->

		<?php

		echo $after_widget;
    }

	// the widget controller
    function form($instance) {

      if(!isset($instance['title'])) $instance['title'] = __('Recent Posts','luminous');
      if(!isset($instance['limit'])) $instance['limit'] = 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false; ?>
    

      <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','luminous') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
              name="<?php echo esc_attr($this->get_field_name('title')); ?>"
              id="<?php $this->get_field_id('title'); ?>"
              class="widefat" />
      </p>

      <p><label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_html_e('Limit Posts Number','luminous') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
              name="<?php echo esc_attr($this->get_field_name('limit')); ?>"
              id="<?php $this->get_field_id('limit'); ?>"
              class="widefat" />
      </p>
        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'luminous' ); ?></label></p>
    	<?php
    }
}
