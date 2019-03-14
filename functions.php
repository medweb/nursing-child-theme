<?php

/**
 * Enqueues scripts and styles (javascript and css) used by the theme on every page.
 */
add_action( 'wp_enqueue_scripts', 'nursing_child_theme_scripts');

get_template_part('acf-fields'); //add all theme ACF settings (side & top nav)

function nursing_child_theme_scripts() {
    // Theme engine
    wp_enqueue_script(
        'nursing_child_theme_engine',
        get_stylesheet_directory_uri() . '/js/engine.js',
        array('jquery'),
        filemtime( get_stylesheet_directory() . '/js/engine.js' ), // force cache invalidate if md5 changes
        true // load in footer
    );


    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' ); // using get_TEMPLATE_directory_uri to force loading parent theme styles
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get("Version")
    );

    wp_register_style(
        'jquery-ui-style',
        'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css',
        array( 'jquery' ),
        null
    );
    wp_enqueue_style( 'jquery-ui-style' );

    wp_enqueue_script(
        'jquery-ui-script',
        'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
        array( 'jquery' ),
        null,
        false
    );

}

// BEGIN BLOCKS STUFF




//END BLOCKS STUFF

?>