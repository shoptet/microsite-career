<?php
/**
 * Register widgets
 */
function shp_career_widgets_init() {
    register_sidebar( array(
        'name'          => 'Second Page Half',
        'id'            => 'second_page_half',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'shp_career_widgets_init' );

?>

