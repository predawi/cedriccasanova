<?php get_header(); ?>

<?php get_template_part("tpl", "page-title"); ?>

    <section class="section-content single-folio">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 page-content">
                 
                   <div class="feature_image"> 
                    <?php
                        if (has_post_thumbnail()) {
                            $thumb_img = wp_get_attachment_image(get_post_thumbnail_id(), 'full');
                            print($thumb_img);
                        }
                   ?>
                   </div>
                        <?php the_content();
                            wp_link_pages(array(
                                'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'rozario') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'rozario') . ' </span>%',
                                'separator' => '<span class="screen-reader-text">, </span>',
                            ));
                            ?>
                        <?php echo TPL::get_related_posts(); ?>

                       <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>

                </div>
            </div>
        </div>
    <?php endwhile?>

    </section>


<?php get_footer(); ?>