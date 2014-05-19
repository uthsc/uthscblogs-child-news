<?php

function register_uthsc_childtheme_styles() {
    wp_register_style('uthsc-child-stylesheet', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('uthsc-child-stylesheet');
}

add_action('wp_enqueue_scripts', 'register_uthsc_childtheme_styles', 11);

function get_uthsc_orbit_slider() {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

    <?php if ($paged < 2) { ?>
        <?php

        // args
        $args = array(
            'numberposts' => -1,


            'meta_query' => array(
                array(
                    'key' => 'add_to_slider', // name of custom field
                    'value' => '"Add To Slider"', // matches exaclty "red", not just red. This prevents a match for "acquired"
                    'compare' => 'LIKE'
                )
            )
        );

        // get results
        $the_query = new WP_Query( $args );

        // The Loop
        ?>
        <?php if( $the_query->have_posts() ): ?>
            <div class="hide-for-small-down">
            <ul class="example-orbit" data-orbit>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <li>
                        <img src="<?php echo get_field('slider_image',get_the_id())?>" alt="slider-image" />
                        <div class="orbit-caption">
                            <?php echo get_the_title( get_the_id() ) ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
            </div>
        <?php endif; ?>

        <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

    <?php }
}

add_filter( 'nav_menu_css_class', 'thd_menu_classes', 10, 2 );
function thd_menu_classes( $classes , $item ){

    $post_types = array(
        'news_notes' => '/in-the-media',
        'announcement' => '/announcements'
    );

    if ( get_post_type() == 'news_notes' || is_archive( 'news_notes' ) ) {
        // find the url you want and add the class you want
        if ( $item->url == '/in-the-media' ) {
            $classes = str_replace( 'menu-item', 'menu-item active', $classes );
            remove_filter( 'nav_menu_css_class', 'thd_menu_classes', 10, 2 );
        }
    } elseif ( get_post_type() == 'announcement' ) {
        // find the url you want and add the class you want
        if ( $item->url == '/announcements' ) {
            $classes = str_replace( 'menu-item', 'menu-item active', $classes );
            remove_filter( 'nav_menu_css_class', 'thd_menu_classes', 10, 2 );
        }
    }

    return $classes;
}




function add_spotlight_to_archive( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
        $query->set( 'post_type', array(
            'post', 'nav_menu_item', 'spotlight'
        ));
        return $query;
    }
}
add_filter( 'pre_get_posts', 'add_spotlight_to_archive' );