<?php /* Template Name: Two Halves with Widget template */ ?>

<section class="section section-secondary">
    <div class="section-inner container">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php echo apply_filters( 'get_the_title', $page->post_title ); ?></h2>
                <?php echo apply_filters( 'the_content', $page->post_content ); ?>
            </div>
            <div class="col-sm-6">
                <?php if ( is_active_sidebar( 'second_page_half' )) { dynamic_sidebar( 'second_page_half' ); } ?>
            </div>
        </div>

    </div>
</section>
