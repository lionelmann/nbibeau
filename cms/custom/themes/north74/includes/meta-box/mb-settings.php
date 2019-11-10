<?php
// Register settings page. In this case, it's a theme options page
add_filter( 'mb_settings_pages', 'options_page' );
function options_page( $settings_pages ) {
    $settings_pages[] = array(
        'id'          => 'general',
        'menu_title'  => 'General Settings',
        'icon_url'    => 'dashicons-admin-generic',
        'style'       => 'boxes',
        'columns'     => 1,
        'position'    => 68,
    );
    return $settings_pages;
}
// Register meta boxes and fields for settings page
add_filter( 'rwmb_meta_boxes', 'options_meta_boxes' );
function options_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'id'             => 'header',
        'title'          => 'Hero',
        'settings_pages' => 'general',
        'tab'            => 'header',
        'fields' => array(
            array(
                'name' => 'Banner Text',
                'id'   => 'text',
                'type' => 'text',
            ),
            array(
                'name' => 'Banner',
                'id'   => 'banner',
                'type' => 'image_advanced',
            ),
        ),
    );
    return $meta_boxes;
}
?>