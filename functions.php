<?php

/*
 * functions.php
 */

/*
 * 1. - Define constants
 */

define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');
define('SCRIPTS', THEMEROOT . '/js');
define('FRAMEWORK', get_template_directory() . '/framework');

/*
 * 2. - Load Framework
 */

require_once (FRAMEWORK . '/init.php');

/*
 * 3. - Content width
 */

if (!isset($content_width)) {
    $content_width = 800;
}

/*
 * 4. - Set up theme
 */


if (!function_exists('trends_setup')) {

    function trends_setup() {
        /**
         * Make the theme available for translation.
         */
        $lang_dir = THEMEROOT . '/languages';
        load_theme_textdomain('trends', $lang_dir);

        /**
         * Add support for post formats.
         */
        add_theme_support('post-formats', array(
            'gallery',
            'link',
            'image',
            'quote',
            'video',
            'audio'
                )
        );

        /**
         * Add support for automatic feed links.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Add support for post thumbnails.
         */
        add_theme_support('post-thumbnails');

        /**
         * Register nav menus.
         */
        register_nav_menus(
                array(
                    'main-menu' => __('Main Menu', 'trends')
                )
        );
    }

    add_action('after_setup_theme', 'trends_setup');
}