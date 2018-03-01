<?php
/* Template Name: Blog */
get_header();
?>
<?php get_template_part("tpl", "page-title"); ?>
    <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 with-sidebar">
                    <?php
                    // The Loop
                    while (have_posts()) : the_post();
                        get_template_part('content');
                    endwhile;
                    ?>
                    <?php
                    $pagination = TPL::pagination();
                    if( !empty($pagination) ){
                        echo "<div class='post-navigation mv5'>$pagination</div>";
                    }
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>