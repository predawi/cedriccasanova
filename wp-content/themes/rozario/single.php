<?php get_header(); ?>

    <?php get_template_part('tpl', 'page-title'); ?>

    <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 with-sidebar">
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                        get_template_part( 'content', get_post_format() );
                        if(TT::get_mod('tt_post_author') == '1') {
                            tt_related_posts();
                        }
                        if ( comments_open() || get_comments_number() ) : comments_template();
                        endif;
                        

                    endwhile;
                    ?>
                </div>
                <?php get_sidebar(); ?>


            </div>
        </div>
    </section>


<?php get_footer(); ?>