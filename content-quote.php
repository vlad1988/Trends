<?php
/*
 * content-quote.php
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
    </footer>
</article>
