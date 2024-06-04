<?php

/**
 * Enqueues scripts and styles (javascript and css) used by the theme on every page.
 */
add_action( 'wp_enqueue_scripts', 'nursing_child_theme_scripts');

get_template_part('acf-fields'); //add all theme ACF settings (side & top nav)

// Disable anonymous access to the wordpress rest api
get_template_part('includes/disable-anonymous-api');

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


add_filter( 'ucf_people_taxonomies', 'remove_people_categories', 20); // the ucf people plugin has this filter which we can use to override settings
/**
 * Removes the default 'categories' from the people post type.
 * Also removes the default 'tags' taxonomy.
 * @return array
 */
function remove_people_categories() {
	$taxonomies = array();
	return $taxonomies;
}

add_action( 'init', 'ucf_people_CPT_loaded', 99, 0 );

function ucf_people_CPT_loaded(): void
{
    if (post_type_exists('person')) {
        // get existing CPT definition
        $person_cpt = get_post_type_object('person');

        if ($person_cpt instanceof WP_Post_Type) {
            // Extract the existing arguments
            $args = (array) $person_cpt;

            // modify parameters. even though line 86 of the CPT plugin already defines this, for some reason it
            // isn't being applied correctly
            $args['rewrite']['with_front'] = FALSE;
            $args['rewrite']['slug'] = 'people';

            // re-define CPT
            register_post_type($person_cpt->name, $args);
        }
    }
}


/**
 * Allows super admin users to stay logged in for 3 months.
 * On single sites, that expiration is set for regular admins.
 * @param $expiration int
 * @param $user_id
 * @param $remember
 * @return int
 */
function custom_cookie_lifetime( $expiration, $user_id, $remember ): int
{    if (is_multisite() && ( is_super_admin( $user_id ) ) ) {
        return 7776000; // 3 months in seconds (60*60*24*30*3)
    } elseif (current_user_can('administrator')) {
        return 7776000; // 3 months in seconds (60*60*24*30*3)
    } else {
        return $expiration; // default expiration for regular users
    }
}
add_filter( 'auth_cookie_expiration', 'custom_cookie_lifetime', 10, 3 );


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
