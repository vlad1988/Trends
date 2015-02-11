<?php
/*
 * content-link.php
 */
?>

<article id="id-<?php the_ID(); ?>" class="<?php post_class(); ?>">

    <div class="content">
        <?php
        the_content(__('Continue reading &rarr;', 'trends'));
        ?>
    </div>
    <footer>
        <p class="meta-information">
            <?php trends_post_meta(); ?>
        </p>
        <?php
        if (is_single()) {
            echo "<h4>" . __('Written by: ', 'trends') . get_the_author() . "</h4>";
        }
        ?>
    </footer>
</article>
