<?php
get_header();
?>

<div class="content" role="main">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
        <?php comments_template(); ?>
    <?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>