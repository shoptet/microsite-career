<?php /* Template Name: One Page template */ ?>
<?php get_header(); ?>

<?php get_template_part( 'src/template-parts/page/content', 'claim' ); ?>

<?php
// GET PAGES AND LOAD TEMPLATES
$output = '';
$args = array(
    'parent' => $post->ID,
    'sort_column' => 'menu_order',
);
$pages = get_pages( $args );

foreach ( $pages as $page ) {
	$pageID = $page->ID;
	$page_content = '';

    ob_start();
    $template_name = get_page_template_slug( $page->ID );

    if ( !empty( $template_name ) && 0 === validate_file( $template_name ) ) {
        include( locate_template( $template_name, false, false ) );
    }

    $page_content = ob_get_clean();
	$output .= $page_content;
}

wp_reset_query();
echo $output;
?>

<?php get_footer(); ?>
