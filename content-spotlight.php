<?php
/**
 * The template for displaying spotlight content.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
    <header>
        <span class="label search-label">Spotlight</span>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php reverie_entry_meta(); ?>
    </header>
    <br>
    <div class="entry-content">
        <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="medium-3 hide-for-small columns"><figure class="th"><a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); } ?></a></figure></div>
                <div class="medium-9 columns"><?php the_excerpt(); ?></div>
            <?php } else { ?>
                <div class="columns"><?php the_excerpt(); ?></div>
            <?php } ?>

        </div>
        <?php has_tag() ? the_tags('<p class="entry-tags">Tags: ', ', ', '</p>') : '' ?>
        <?php edit_post_link('Edit this Spotlight Story','','<br><br>'); ?>
    </div>
</article>