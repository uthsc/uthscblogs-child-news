<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6 lt-ie9 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>
<html class="no-js ie7 lt-ie9 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 lt-ie9 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!--[if IE 9]>
<html class="no-js ie9" <?php language_attributes(); ?> "> <![endif]-->

<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right');
        bloginfo('name'); ?></title>
    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Favicon and Feed -->
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed"
          href="<?php echo home_url(); ?>/feed/">
    <!--  iPhone Web App Home Screen Icon -->
    <link rel="apple-touch-icon" sizes="72x72"
          href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png"/>
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png"/>
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/uthsc-icon.png"/>
    <!-- Enable Startup Image for iOS Home Screen Web App -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png"/>
    <!-- Startup Image iPad Landscape (748x1024) -->
    <link rel="apple-touch-startup-image"
          href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)"/>
    <!-- Startup Image iPad Portrait (768x1004) -->
    <link rel="apple-touch-startup-image"
          href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png"
          media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)"/>
    <!-- Startup Image iPhone (320x460) -->
    <link rel="apple-touch-startup-image"
          href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png"
          media="screen and (max-device-width: 320px)"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>

<script>

    (function($) {

        $(document).ready(function(){
            $("figure img").load(function(){
                $(this).parent().width( $(this).width());
            });
        });

    })( jQuery );

</script>

<div id="sticky-footer-root">
    <section id="banner">
        <div class="row brand-text">
            <div id="brand" class="columns">
                <a href="http://uthsc.edu"><img src="/wp-content/themes/uthscblogs/img/uthsc-wordmark.svg"
                                                alt="UTHSC Wordmark"></a>
            </div>
        </div>

        <!--<div class="seam"></div>-->
        <div class="site-title">
            <div class="row">
                <div class="<?php echo (is_user_logged_in() ? 'small-10' : 'small-12'); ?> columns">
                    <h1><a href="<?php echo esc_url(home_url('/')); ?>"
                           title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                           rel="home"><?php bloginfo('name'); ?></a></h1>
                </div>

                <?php
                if ( is_user_logged_in() ) {
                ?>
                <div class="small-2 logout columns">
                    <div class="logout-container">
                        <a href="<?php echo wp_logout_url( get_permalink() ) ?>">
                            <span class="show-for-medium-up">Logout&nbsp<i class="fa fa-sign-out"></i></span>
                            <span class="hide-for-medium-up"><i class="fa fa-sign-out"></i></span>
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <header class="contain-to-grid sticky">
        <!-- Starting the Top-Bar -->
        <nav class="top-bar" data-topbar data-options="scrolltop:false;">
            <ul class="title-area">
                <li class="name">
                    <div class="row hide-for-large-up search-form">
                        <div class="small-9 medium-5 columns">
                            <?php get_search_form() ?>
                        </div>
                    </div>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <section class="top-bar-section">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'depth' => 0,
                    'items_wrap' => '<ul class="left">%3$s</ul>',
                    'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                    'walker' => new reverie_walker(array(
                        'in_top_bar' => true,
                        'item_type' => 'li',
                        'menu_type' => 'main-menu'
                    )),
                ));
                ?>
            </section>
            <section class="top-bar-section right show-for-large-up">
                <?php get_search_form() ?>
            </section>
        </nav>
        <!-- End of Top-Bar -->
    </header>
    <!-- Start the main container -->
    <div class="container" role="document">
        <div class="row content-area">