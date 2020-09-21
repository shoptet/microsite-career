<?php /* Template Name: Available Positions - Page */ ?>

<?php if( !isset($singleView) || $singleView ) { get_header(); } ?>

<section class="section section-primary">
    <div class="section-inner container">
        <?php if( !isset($singleView) || $singleView ) {  ?>

            <?php get_template_part( 'template-parts/utils/content', 'breadcrumb' ); ?>
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

        <?php } else {  ?>

            <h2><?php echo apply_filters( 'the_content', $page->post_title ); ?></h2>
            <?php echo apply_filters( 'the_content', $page->post_content ); ?>

        <?php } ?>

        <?php
        $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

        <?php if ( $wpb_all_query->have_posts() ) : ?>
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

            <div class="row available-position">
                <div class="d-none d-sm-block col-sm-3 col-md-3">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>

                    <div class="entry-more">
                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Přečíst celé</a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php /* _e( 'Aktuálně nemáme žádné volné pozice.' ); */ ?></p>
        <?php endif; ?>

        <?php if( !isset($singleView) || $singleView ) { get_template_part( 'template-parts/page/content', 'widget' ); } ?>
    </div>
</section>

<?php if( !isset($singleView) || $singleView ) { get_footer(); } ?>

