<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>


        <?php if (have_posts()):while (have_posts()):the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <?php get_template_part('content', 'none') ?>
        <?php endif; ?>



        <footer>
            <?php wp_footer(); ?> 
        </footer>
    </body>
</html>
