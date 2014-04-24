<?php get_header(); ?>



































    <!-- Row for main content area -->
    <div class="small-12 large-8 columns" id="content" role="main">

        <?php
        /*
         * This whole slider section needs to be moved out of this template.
         *
         */

        ?>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
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
                <ul class="example-orbit hide-for-small-down" data-orbit>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li>
                            <img src="<?php echo get_field('slider_image',get_the_id())?>" alt="slider-image" />
                            <div class="orbit-caption">
                                <?php echo get_the_title( get_the_id() ) ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

        <?php } ?>

        <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
        <?php $args = array(
            'post_type' => 'post',
            'author' => '16',
            'paged'  => $paged
        ); ?>
        <?php $the_query = new WP_Query( $args ); ?>
        <?php if ( $the_query->have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // end have_posts() check ?>

        <?php /* Display navigation to next/previous pages when applicable */ ?>
        <?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
            <nav id="post-nav">
                <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
                <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
            </nav>
        <?php } ?>

    </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>