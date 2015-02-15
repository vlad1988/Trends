<?php
get_header();
?>

<div class="content" role="main">
    <?php while (have_posts()) : the_post(); ?>
        <article id="id-<?php the_ID(); ?>" class="<?php post_class(); ?>">
            <header>
                <?php if (has_post_thumbnail()): ?>
                    <div><?php the_post_thumbnail(); ?></div>
                <?php endif; ?>
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
                wp_link_pages();
                ?>
            </div>
            <footer>
                <?php
                if (is_user_logged_in()) {
                    echo "<li>";
                    edit_post_link(__('Edit', 'trends'), '<span>', '</span>');
                    echo "</li>";
                }
                ?>
            </footer>
        </article>
    <?php comments_template(); ?>
    <?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>