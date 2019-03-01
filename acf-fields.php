<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 2019-02-13
 * Time: 9:49 AM
 */

add_action( 'acf/init', array( 'nursing_child_theme_acf', 'create_fields_top_nav' ) );
add_action( 'acf/init', array( 'nursing_child_theme_acf', 'create_fields_side_nav' ) );

class nursing_child_theme_acf {
    static function create_fields_side_nav() {

        acf_add_local_field_group( array(
                                       'key'                   => 'group_5c642ac058463',
                                       'title'                 => 'Side Nav Menu',
                                       'fields'                => array(
                                           array(
                                               'key'               => 'field_5c642ac95b599',
                                               'label'             => 'Enable side menu',
                                               'name'              => 'enable_side_menu',
                                               'type'              => 'true_false',
                                               'instructions'      => 'Enable this option to show a custom side menu on this page.',
                                               'required'          => 0,
                                               'conditional_logic' => 0,
                                               'wrapper'           => array(
                                                   'width' => '',
                                                   'class' => '',
                                                   'id'    => '',
                                               ),
                                               'message'           => '',
                                               'default_value'     => 0,
                                               'ui'                => 0,
                                               'ui_on_text'        => '',
                                               'ui_off_text'       => '',
                                           ),
                                           array(
                                               'key'               => 'field_5c642b075b59a',
                                               'label'             => 'Side menu items',
                                               'name'              => 'extra_nav',
                                               'type'              => 'repeater',
                                               'instructions'      => '',
                                               'required'          => 1,
                                               'conditional_logic' => array(
                                                   array(
                                                       array(
                                                           'field'    => 'field_5c642ac95b599',
                                                           'operator' => '==',
                                                           'value'    => '1',
                                                       ),
                                                   ),
                                               ),
                                               'wrapper'           => array(
                                                   'width' => '',
                                                   'class' => '',
                                                   'id'    => '',
                                               ),
                                               'collapsed'         => '',
                                               'min'               => 1,
                                               'max'               => 10,
                                               'layout'            => 'table',
                                               'button_label'      => '',
                                               'sub_fields'        => array(
                                                   array(
                                                       'key'               => 'field_5c642b385b59b',
                                                       'label'             => 'Menu Text',
                                                       'name'              => 'menu_text',
                                                       'type'              => 'text',
                                                       'instructions'      => '',
                                                       'required'          => 1,
                                                       'conditional_logic' => 0,
                                                       'wrapper'           => array(
                                                           'width' => '',
                                                           'class' => '',
                                                           'id'    => '',
                                                       ),
                                                       'default_value'     => '',
                                                       'placeholder'       => '',
                                                       'prepend'           => '',
                                                       'append'            => '',
                                                       'maxlength'         => '',
                                                   ),
                                                   array(
                                                       'key'               => 'field_5c642b445b59c',
                                                       'label'             => 'Menu URL',
                                                       'name'              => 'menu_url',
                                                       'type'              => 'link',
                                                       'instructions'      => '',
                                                       'required'          => 1,
                                                       'conditional_logic' => 0,
                                                       'wrapper'           => array(
                                                           'width' => '',
                                                           'class' => '',
                                                           'id'    => '',
                                                       ),
                                                       'post_type'         => '',
                                                       'taxonomy'          => '',
                                                       'allow_null'        => 0,
                                                       'allow_archives'    => 1,
                                                       'multiple'          => 0,
                                                   ),
                                               ),
                                           ),
                                       ),
                                       'location'              => array(
                                           array(
                                               array(
                                                   'param'    => 'post_type',
                                                   'operator' => '==',
                                                   'value'    => 'page',
                                               ),
                                           ),
                                       ),
                                       'menu_order'            => 0,
                                       'position'              => 'normal',
                                       'style'                 => 'default',
                                       'label_placement'       => 'top',
                                       'instruction_placement' => 'label',
                                       'hide_on_screen'        => '',
                                       'active'                => true,
                                       'description'           => '',
                                   ) );

    }
    static function create_fields_top_nav() {

        acf_add_local_field_group( array(
                                       'key'                   => 'group_5c642ac158463',
                                       'title'                 => 'Top Nav Menu',
                                       'fields'                => array(
                                           array(
                                               'key'               => 'field_5c642ac95b5a9',
                                               'label'             => 'Enable top menu',
                                               'name'              => 'enable_top_menu',
                                               'type'              => 'true_false',
                                               'instructions'      => 'Enable this option to show a custom top menu on this page.',
                                               'required'          => 0,
                                               'conditional_logic' => 0,
                                               'wrapper'           => array(
                                                   'width' => '',
                                                   'class' => '',
                                                   'id'    => '',
                                               ),
                                               'message'           => '',
                                               'default_value'     => 0,
                                               'ui'                => 0,
                                               'ui_on_text'        => '',
                                               'ui_off_text'       => '',
                                           ),
                                           array(
                                               'key'               => 'field_5c642b075b5aa',
                                               'label'             => 'Top menu items',
                                               'name'              => 'inter_nav',
                                               'type'              => 'repeater',
                                               'instructions'      => '',
                                               'required'          => 1,
                                               'conditional_logic' => array(
                                                   array(
                                                       array(
                                                           'field'    => 'field_5c642ac95b5a9',
                                                           'operator' => '==',
                                                           'value'    => '1',
                                                       ),
                                                   ),
                                               ),
                                               'wrapper'           => array(
                                                   'width' => '',
                                                   'class' => '',
                                                   'id'    => '',
                                               ),
                                               'collapsed'         => '',
                                               'min'               => 1,
                                               'max'               => 10,
                                               'layout'            => 'table',
                                               'button_label'      => '',
                                               'sub_fields'        => array(
                                                   array(
                                                       'key'               => 'field_5c642b445b5ac',
                                                       'label'             => 'Menu URL',
                                                       'name'              => 'menu_url',
                                                       'type'              => 'link',
                                                       'instructions'      => '',
                                                       'required'          => 1,
                                                       'conditional_logic' => 0,
                                                       'wrapper'           => array(
                                                           'width' => '',
                                                           'class' => '',
                                                           'id'    => '',
                                                       ),
                                                       'post_type'         => '',
                                                       'taxonomy'          => '',
                                                       'allow_null'        => 0,
                                                       'allow_archives'    => 1,
                                                       'multiple'          => 0,
                                                   ),
                                               ),
                                           ),
                                       ),
                                       'location'              => array(
                                           array(
                                               array(
                                                   'param'    => 'post_type',
                                                   'operator' => '==',
                                                   'value'    => 'page',
                                               ),
                                           ),
                                       ),
                                       'menu_order'            => 0,
                                       'position'              => 'normal',
                                       'style'                 => 'default',
                                       'label_placement'       => 'top',
                                       'instruction_placement' => 'label',
                                       'hide_on_screen'        => '',
                                       'active'                => true,
                                       'description'           => '',
                                   ) );

    }
}