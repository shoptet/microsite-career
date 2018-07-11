<?php /* Template Name: Images Flex Justify Between template */ ?>

<section class="section section-secondary">
    <div class="section-inner container">
        <h2 class="text-center"><?php echo apply_filters( 'the_content', $page->post_title ); ?></h2>
        <div class="flex-row-items">
            <?php echo apply_filters( 'the_content', $page->post_content ); ?>
        </div>
    </div>
</section>
