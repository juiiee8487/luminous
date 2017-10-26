<?php


//add css and js
function luminous_add_css() {
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/bootstrap.css');
	wp_enqueue_style('luminous-style', get_stylesheet_uri());

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action('wp_enqueue_scripts', 'luminous_add_css');

function luminous_js_include() {

	wp_enqueue_script('luminous-main', get_template_directory_uri(). '/inc/js/main.js',array('jquery'), '1.0.0', true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri(). '/inc/js/bootstrap.js');
	
}
add_action('wp_enqueue_scripts', 'luminous_js_include');


/**
 * Register widget area.
 */
function luminous_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'luminous' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'luminous' ),
		'before_widget' => '<div class="widget-item">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	//Registration of Related Post Widget
	register_widget( 'luminous_recent_posts' );
	
}
add_action( 'widgets_init', 'luminous_widgets_init' );


function luminous_general_register() {
	
		// Navigation Menus
		register_nav_menus(array(
			'primary' => esc_html__( 'Primary Menu', 'luminous'),
			
		));


		// Add Feature image support & automatic feed
		add_theme_support('post-thumbnails');

  		add_theme_support( 'automatic-feed-links' );
		
		//add support for title tag
 		add_theme_support( 'title-tag' );

 		
		//custome logo
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );


		//the post formats
		add_theme_support('post-formats', array('aside', 'status', 'quote'));
	
		// The content width
		if ( ! isset( $content_width ) )
	    $GLOBALS['content_width'] = 1400;
		//html5 and gallery
	

    	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );





}
add_action('after_setup_theme', 'luminous_general_register');



if ( ! function_exists( 'luminous_the_custom_logo' ) ) :

function luminous_the_custom_logo() {
   if ( function_exists( 'the_custom_logo' ) ) {
       the_custom_logo();
   }
}
endif;



//now handle callback part
function luminous_logo_callback() {
	add_theme_support( 'custom-header', apply_filters( 'custom_header_args', array(
		'wp-head-callback'       => 'luminous_logo',
	) ) );
}
add_action( 'after_setup_theme', 'luminous_logo_callback' );


//handle site description and logo both
if ( ! function_exists( 'horkos_logo_and_stuff' ) ) :

function luminous_logo() {
	
	if ( display_header_text() ) {
		return;
	}

	
	?>
	<style type="text/css" id="extra-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-name, #tagline{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif;










// custom excerpt length
function luminous_excerpt($length) {
	
	if ( is_admin() ) {		
		return $length;	
	}
	return 55;
}
add_filter('excerpt_length','luminous_excerpt');

///include necessary files
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/widget/recent_posts.php';

//custom header image
$args = array(
	'default-text-color' => '148F77',
	'width'         => 1200,
	'height'        => 230,
	'description'	=> __('No image','luminous'),
);
add_theme_support( 'custom-header', $args );



//default theme header text color
register_default_headers( array (
	'header_gray' => array (
	'url' => '%s/Images/bg_default1.png',
	'thumbnail_url' => '%s/Images/bg_default1.png',
	'description' => __( 'Header Image 1', 'luminous' )
	),

));