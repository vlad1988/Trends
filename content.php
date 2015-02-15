<?php
/*
 * content.php
 */
?>

<article id="id-<?php the_ID(); ?>" class="<?php post_class(); ?>">
    <header>
        <?php if (has_post_thumbnail()): ?>
            <div><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>
        <?php if (is_single()): ?>
            <h2>
                <?php the_title(); ?>
            </h2>
        <?php else: ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
    </header>
    <p class="meta-information">
        <?php trends_post_meta(); ?>
    </p>
    <div class="content">
        <?php
        if (is_search()) {
            the_excerpt();
        } else {
            the_content(__('Continue reading &rarr;', 'trends'));
            wp_link_pages();
        }
        ?>
    </div>
    <footer>
        <?php
        if (is_single()) {
            echo "<h4>" . __('Written by: ', 'trends') . get_the_author() . "</h4>";
        }
        ?>
    </footer>
</article>
