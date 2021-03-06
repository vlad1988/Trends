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

        $lang_dir = THEMEROOT . '/languages';
        load_theme_textdomain('trends', $lang_dir);

        add_theme_support('post-formats', array(
            'gallery',
            'link',
            'image',
            'quote',
            'video',
            'audio'
                )
        );

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        register_nav_menus(
                array(
                    'main-menu' => __('Main Menu', 'trends')
                )
        );
    }

    add_action('after_setup_theme', 'trends_setup');
}
/*
 * 5. - Trends post meta function
 */

if (!function_exists('trends_post_meta')) {

    function trends_post_meta() {
        echo '<ul class="meta-post-list">';
        if (get_post_type() === 'post') {
            if (is_sticky()) {
                echo '<li>' . __('Sticky', 'trends') . '</li>';
            }
            printf(
                    '<li><a href="%1$s" rel="author">%2$s</a></li>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()
            );

            echo '<li>' . get_the_date() . '</li>';

            $category_list = get_the_category_list(', ');
            if ($category_list) {
                echo "<li>" . $category_list . "</li>";
            }

            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) {
                echo '<li>' . $tags_list . '</li>';
            }

            if (comments_open()):
                echo '<li>';
                echo comments_popup_link(__('Leave a comment', 'trends'), __('One comment so far', 'trends'), __('View all % comments', 'trends'));
                echo '</li>';
            endif;

            if (is_user_logged_in()) {
                echo "<li>";
                edit_post_link(__('Edit', 'trends'), '<span>', '</span>');
                echo "</li>";
            }
        }
        echo '</ul>';
    }

}

/*
 * 6. - Display post paging
 */

if (!function_exists('trends_paging_nav')) {

    function trends_paging_nav() {
        echo "<ul>";
        if (get_previous_post_link()) {
            echo "<li>" . previous_posts_link(__('Newer', 'trends')) . "</li>";
        }
        if (get_next_post_link()) {
            echo "<li>" . next_posts_link(__('Older', 'trends')) . "</li>";
        }
        echo "</ul>";
    }

}

/*
 * 7 - Register Sidebar
 */

if (!function_exists('trends_widget_init')) {

    function trends_widget_init() {
        if(function_exists('register_sidebar')){
            register_sidebar(
                    array(
                        'name'=>__('Main widget', 'trends'),
                        'id'=>'sidebar-1',
                        'description' => __('Main widget area','trends'),
                        'defore_widget' => '<div id="%1s">',
                        'after_widdget' => '</div>',
                        'before_title' => '<h5>',
                        'after_title' => '</h5>'
                    ));
            register_sidebar(
                    array(
                        'name'=>__('Footer widget', 'trends'),
                        'id'=>'sidebar-2',
                        'description' => __('Footer widget area','trends'),
                        'defore_widget' => '<div id="%1s">',
                        'after_widdget' => '</div>',
                        'before_title' => '<h5>',
                        'after_title' => '</h5>'
                    ));
        }
    }

    add_action('widgets_init', 'trends_widget_init');
}