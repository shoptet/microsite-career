<?php /* Template Name: Flex - Justify Between */ ?>

<?php if( !isset($singleView) || $singleView ) { get_header();  ?>

<section class="section section-primary">
    <div class="section-inner container">
        <?php get_template_part( 'template-parts/utils/content', 'breadcrumb' ); ?>
        <h1><?php the_title(); ?></h1>
        <div class="flex-row-items">
            <?php the_content(); ?>
        </div>
        <?php get_template_part( 'template-parts/page/content', 'widget' ); ?>
    </div>
</section>

<?php get_footer(); } else { ?>

<section class="section section-secondary">
    <div class="section-inner container">
        <h2 class="text-center"><?php echo apply_filters( 'the_content', $page->post_title ); ?></h2>
        <div class="flex-row-items">
            <?php echo apply_filters( 'the_content', $page->post_content ); ?>
        </div>
    </div>
</section>

<?php } ?>

