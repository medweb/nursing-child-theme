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
        filemtime(get_stylesheet_directory() . '/style.css' )
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
    
    // register, but don't enqueue this script. it will be enqueued if a page content has the shortcode.
    wp_register_script(
        'view-all-events-script',
        get_stylesheet_directory_uri() . '/js/view-all-events.js',
        array('jquery'),
        filemtime( get_stylesheet_directory() . '/js/view-all-events.js' ), // force cache invalidate if md5 changes
        true // load in footer
    );

}

function view_all_events_script(){

}

// suppress site-health.php warning for disabled automatic updates.
// we disable them on purpose and update wordpress core and plugins manually. no need to have it complain about it.
function prefix_remove_background_updates_test( $tests ) {
	unset( $tests['async']['background_updates'] );
	return $tests;
}
add_filter( 'site_status_tests', 'prefix_remove_background_updates_test' );

// BEGIN BLOCKS STUFF




//END BLOCKS STUFF


// TERTIARY server detection
if (defined('TERTIARY_SERVER')){
	if (TERTIARY_SERVER === true){
		// disable the social board plugin, and any other we need to.
		add_action( 'init', 'disable_bad_plugins' );

	}
}

/**
 * Only runs if the server is currently hosted on the tertiary server. Due to firewall rules and
 * odd php versions, some plugins can cause pages to crash and should be disabled during the
 * period that the tertiary server is serving the failover site.
 */
function disable_bad_plugins(){
	$array_bad_plugins = array(
		'ax-social-stream/ax-social-stream.php',
	);
	deactivate_plugins( $array_bad_plugins );
}

// Custom login screen
add_action( 'login_head', 'custom_login_style' );
function custom_login_style() {
?>
    <style type="text/css">
    html, body {
        background: #222 !important;
    }
    h1 a {
        display: none !important;
    }
    a:hover {
        color: #fff !important;
    }
    input[type=text]:focus,
    input[type=password]:focus,
    input[type=checkbox]:focus {
        border-color: #666 !important;
        box-shadow: 0 0 2px #ffae00 !important;
    }
    .button-primary {
        background: #ffcc00 !important;
        box-shadow: 0 1px 0 #ffae00 !important;
        border-color: #ffae00 !important;
        text-shadow: 0 -1px 1px #ffae00, 1px 0 1px #ffae00, 0 1px 1px #ffae00, -1px 0 1px #ffae00 !important;
    }
    .message {
        border-left-color: #ffcc00 !important;
    }
    </style>
    
<?php
}
?>