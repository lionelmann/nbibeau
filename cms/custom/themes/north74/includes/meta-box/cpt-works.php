<?php
add_filter( 'rwmb_meta_boxes', 'register_cpt_works_meta_boxes' );
function register_cpt_works_meta_boxes( $meta_boxes ) {
    $prefix = '_works_';
    $meta_boxes[] = array(
        'title'      => __( 'Details', 'textdomain' ),
        'post_types' => array( 'work'),
        'context'    => 'normal',
        'priority'   => '',
        'fields' => array(
            array(
                'name'  => __( 'Description', 'textdomain' ),
                'id'    => $prefix . 'description',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __( 'URL Link', 'textdomain' ),
                'id'    => $prefix . 'link',
                'type'  => 'text',
            ),
        )
    );
    return $meta_boxes;
}
?>