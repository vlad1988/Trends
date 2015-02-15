<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="descriptiom" content="<?php bloginfo('description'); ?>"/>
        <link rel="short icon" href="<?php echo $favicon; ?>"/>
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>
        <header>
            <nav>
                <?php
                wp_nav_menu(
                        array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'site-menu'
                        )
                );
                ?>
            </nav>
        </header>