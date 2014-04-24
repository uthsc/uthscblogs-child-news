<article id="post-<?php the_ID(); ?>" <?php post_class('index-card'); ?>>
    <header>
        <h2><a href="<?php echo esc_attr( get_field('article_url', get_the_ID()) ); ?>"><?php the_title(); ?></a></h2>
        <span class="byline author">
            Published by <?php echo get_the_publisher(get_the_ID()) ?>
            <time class="updated" datetime="<?php echo get_the_time('c') ?>" pubdate><?php echo get_the_time('F jS, Y') ?></time>
        </span>
    </header>
    <div class="entry-content">
        <div class="row">
            <div class="columns"><?php the_content() ?></div>
        </div>
        <p class="entry-tags"><?php  echo get_the_term_list(get_the_ID(),'in-the-media-tags', 'tagged as:&nbsp;', ',') ?></p>
    </div>
</article>