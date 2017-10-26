<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" >
        <meta name="viewport" content="width=device-width">
        
        <?php wp_head(); ?>
    </head>
<body <?php body_class();?>>

<div class="main-container">
    <!--site-header-->
        <div class="main-header" <?php if (get_header_image() != '') { ?> style="background-image: url(<?php header_image(); ?><?php } ?>);">

            <div class="site-title">
                <?php luminous_the_custom_logo(); ?>
                <span class="site-name"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a></span>
                <span id="tagline"><?php bloginfo('description'); ?></span>
            </div>
           
            <div class="header-menu site-nav main-nav">
                 
                <?php
                        $args = array(
                            'theme_location' => 'primary'
                        ); 
                ?>
                
                
                <?php wp_nav_menu(  $args ); ?>
            </div>
        </div>
          <span class="menu-trigger" id="menu-trigger"> <i class="fa fa-bars" style="font-size:20px"></i>&nbsp; </span>
          <div class="menu-mob header-menu site-nav main-nav">
                 
                <?php
                        $args = array(
                            'theme_location' => 'primary'
                        ); 
                ?>
                
                
                <?php wp_nav_menu(  $args ); ?>
            </div>
    <!--/site-header-->


