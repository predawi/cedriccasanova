<?php get_header(); ?>
    <?php
        if( TT::getmeta('title_show')!='0' ){
            get_template_part("tpl", "page-title");
        }

        $page_class = '';

        if( TT::getmeta('remove_padding')=='1' ){
            $page_class .= 'no-padding ';
        }
    ?>
    <?php
        while ( have_posts() ) : the_post();
        $panel_attr = '';
        $img = TT::get_meta_bg_value('background_image');
        if( !empty($img) ){
            $panel_attr = $img;
        }
        $panel_bg = TT::getmeta('panel_bg_color');
        if( !empty($panel_bg) ){
            $panel_attr .= "background-color:$panel_bg;";
        }
        $content_attr = '';
        $content_bg_color = TT::getmeta('content_bg_color');
        if( !empty($content_bg_color) ){
            $content_attr .= "background-color:$content_bg_color;";
        }
    ?>
    <?php
       endwhile;
    ?>
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