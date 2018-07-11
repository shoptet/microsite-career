<section class="section section-primary">
    <div class="section-inner container">
        <h2>O Shoptet API</h2>
        <div class="halfs indented">
            <?php
                $post = get_post(9);
                if (!empty($post)) {
            ?>
            <div class="half">
                <h5><?php echo $post->post_title;?></h5>
                <p>
                    <?php
                    $content = apply_filters( 'the_content', $post->post_content );
                    echo $content;?>
                </p>
                <p>
                    <a href="<?php echo $post->post_name;?>" class="btn btn-secondary">Přejít na článek</a>
                </p>
            </div>
            <?php
                }
            ?>
            <?php
                $post = get_post(11);
                if (!empty($post)) {
            ?>
            <div class="half">
                <h5><?php echo $post->post_title;?></h5>
                <p>
                    <?php
                    $content = apply_filters( 'the_content', $post->post_content );
                    echo $content;?>
                </p>
                <p>
                    <a href="/<?php echo $post->post_name;?>" class="btn btn-secondary">Přejít na článek</a>
                </p>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>

<section class="section section-primary">
    <div class="section-inner container">
        <?php
        $post = get_post(13);
        if (!empty($post)) {
        ?>
            <h2><?php echo $post->post_title;?></h2>
            <div class="halfs indented">
                <div class="half">
                    <p>
                        <?php
                        $content = apply_filters( 'the_content', $post->post_content );
                        echo $content;?>
                    </p>
                    <p>
                        <a href="<?php echo $post->post_name;?>" class="btn btn-secondary">Přejít na článek</a>
                    </p>
                </div>
                <div class="half">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<section class="section section-primary">
    <div class="section-inner container">
        <?php
        $post = get_post(15);
        if (!empty($post)) {
            ?>
            <h2 id="kontakt"><?php echo $post->post_title;?></h2>
            <div class="halfs aligned-left indented">
                <div class="half">
                    <p>
                        <?php echo $post->post_content;?>
                    </p>
                </div>
                <div class="half">
                    <?php get_template_part( 'template-parts/page/content', 'contact-form' ); ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
