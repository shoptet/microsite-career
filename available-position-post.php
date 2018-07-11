<?php
/*
Template Name: Available Position template
Template Post Type: post
*/
?>
<?php get_header(); ?>

    <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

        get_template_part( 'src/template-parts/post/content', 'header' );

        get_template_part( 'src/template-parts/post/content', 'thumbnail' );

        get_template_part( 'src/template-parts/post/content', 'content' );

        endwhile; // End of the loop.
    ?>

<?php
    // GET PAGES AND LOAD TEMPLATES
    $output = '';
    $args = array(
        'meta_query' => array(
            array(
                'key' => 'show_in_post_footer',
                'value' => 'true'
            )
        ),
        'orderby' => 'menu_order',
        'order' => 'asc',
        'post_type' => 'page',
        'posts_per_page' => -1
    );
    $pages = get_posts($args);

    foreach ( $pages as $page ) {
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
