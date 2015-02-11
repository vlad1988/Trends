<?php
/*
 * content-gallery.php
 */
?>

<article id="id-<?php the_ID(); ?>" class="<?php post_class(); ?>">
    <header>
        <?php if (is_single()): ?>
            <?php the_title(); ?>
        <?php else: ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
    </header>
    <p class="meta-information">
        <?php trends_post_meta(); ?>
    </p>
    <div class="content">
        <?php
        the_content(__('Continue reading &rarr;', 'trends'));
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
