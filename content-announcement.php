<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
    <header>
        <span class="label search-label">Announcement</span>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php reverie_entry_meta(); ?>
    </header>
    <div class="entry-content">
        <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="medium-3 hide-for-small columns"><figure class="th"><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); } ?></a></figure></div>
                <div class="medium-9 columns"><?php the_excerpt(); ?></div>
            <?php } else { ?>
                <div class="columns"><?php the_excerpt(); ?></div>
            <?php } ?>
        </div>
        <p class="entry-tags"><?php  echo get_the_term_list(get_the_ID(),'listserv', 'Sent to:&nbsp;', ', ') ?></p>
    </div>
</article>