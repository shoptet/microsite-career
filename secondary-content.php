<?php /* Template Name: Secondary Content template */ ?>

<section class="section section-secondary">
    <div class="section-inner container">
        <h2><?php echo apply_filters( 'get_the_title', $page->post_title ); ?></h2>

        <?php echo apply_filters( 'the_content', $page->post_content ); ?>
    </div>
</section>
