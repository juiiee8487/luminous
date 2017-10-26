<?php

function luminous_customizer( $wp_customize ) {

    
	$wp_customize->add_section('luminous_toggle_features', array(
		'title' 	=> __('Luminous Theme Features', 'luminous'),
		'priority' 	=> 40,
	));

            
				
				//Featured image on post page
					$wp_customize->add_setting( 'featured_image_post_page', array(
							'default'           => 0,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'luminous_sanitize_all_checkbox',
					) );
						
						$wp_customize->add_control( 'featured_image_post_page', array(
							'label'     => __( 'Display featured image on post page?', 'luminous' ),
							'section'   => 'luminous_toggle_features',
							'type'      => 'checkbox',
							'settings' 	=> 'featured_image_post_page',
					) );

						$wp_customize->add_setting( 'author_info_post_page', array(
							'default'           => 1,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'luminous_sanitize_all_checkbox',
					) );

						$wp_customize->add_control( 'author_info_post_page', array(
							'label'     => __( 'Hide Author info box?', 'luminous' ),
							'section'   => 'luminous_toggle_features',
							'type'      => 'checkbox',
							'settings' 	=> 'author_info_post_page',
					) );

			// Color features
			
            //All color features including gradients
            
            //general link color
					$general_link = '#148F77';
					$wp_customize->add_setting('general_link', array(
						'default' 	=> $general_link,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'general_link', array(
						'section' 	=> 'luminous_toggle_features',
   						'label' 	=> __('General Link Color', 'luminous'),
						'settings' 	=> 'general_link',
					) ) );
			
					//header background color 1
					$header_bg_color_1 = '#d8cce0';
					$wp_customize->add_setting('header_bgcolor_1', array(
						'default' 	=> $header_bg_color_1,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor_1', array(
						'label' 	=> __('Header Background color', 'luminous'),
						'section' 	=> 'luminous_toggle_features',
						'settings' 	=> 'header_bgcolor_1',
					) ) );

					//header background color 2
					$header_bg_color_2 = '#242829';
					$wp_customize->add_setting('header_bgcolor_2', array(
						'default' 	=> $header_bg_color_2,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor_2', array(
						'section' 	=> 'luminous_toggle_features',
						'settings' 	=> 'header_bgcolor_2',
					) ) );        

}

add_action('customize_register', 'luminous_customizer');

//the custom css output

//adding custom css
function luminous_customize_css() { 
	$header_text_color = get_header_textcolor(); 

	?>
	
	 	<style type="text/css">
            .main-header { background: linear-gradient(to right, <?php echo esc_html(get_theme_mod('header_bgcolor_1')); ?>, <?php echo esc_html(get_theme_mod('header_bgcolor_2')); ?>);background-size: cover; background-position: center; background-repeat: no-repeat;}
            a:link, a:visited, .fa {color:<?php echo esc_html(get_theme_mod('general_link')); ?>}
            #submit, input[type="button"], input[type="submit"], button {background-color:<?php echo esc_html(get_theme_mod('general_link')); ?>}
            .site-name a {color:#<?php echo esc_html($header_text_color);?>;}
	    </style>
	
	
<?php }

add_action('wp_head', 'luminous_customize_css');


function luminous_sanitize_all_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


