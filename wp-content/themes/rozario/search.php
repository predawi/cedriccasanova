<?php get_header(); ?>


<?php get_template_part("tpl", "page-title"); ?>


    <section class="section-content">

        <div class="container">

            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 page-content">
                        <?php
                        if ( have_posts() ):
                            // Start the loop.
                            while ( have_posts() ) : the_post();
                                get_template_part( 'content' ,get_post_format() );
                            endwhile;
                        // If no content, include the "No posts found" template.
                        else :
                            get_template_part( 'content', 'none' );
                        endif;
                        ?>
                    <?php
                    $pagination = TPL::pagination();
                    if( !empty($pagination) ){
                        echo "<div class='post-navigation mv5'>$pagination</div>";
                    }
                    ?>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->


    </section><!-- .section-content -->



<?php get_footer(); ?>