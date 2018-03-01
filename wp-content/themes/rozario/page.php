<?php
$page_header = TT::getmeta('page_header');
if( !empty($page_header) && $page_header!='default' ){
    global $rozario_menu_layout;
    $rozario_menu_layout = $page_header;
}
// get header
get_header();
?>
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
            $layout_class = 'col-sm-8 col-md-8';
            $page_layout = TT::getmeta('page_layout');
            if( $page_layout=='full' ){
                $layout_class = 'col-sm-12';
            }
            if( $page_layout=='left' ){
                $layout_class = 'col-sm-8 col-md-8 pull-right';
            }
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
        <section class="section-content <?php echo esc_attr($page_class); ?>">
            <div class="container">
               <div class="row">
                   <div class="<?php echo esc_attr($layout_class); ?>">
                       <?php
                       the_content();
                       if (TT::get_mod('page_nextprev') == '1') {
                           wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'rozario') . '</span>',
                               'after' => '</div>',
                               'link_before' => '<span>',
                               'link_after' => '</span>',
                               'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'rozario') . ' </span>%',
                               'separator' => '<span class="screen-reader-text">, </span>',
                           ));
                       }
                       // If comments are open or we have at least one comment, load up the comment template.
                       ?>
                   </div>
                 
               </div>
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
           </div>

        </section>

        <?php
           endwhile;
        ?>

<?php
$page_footer = TT::getmeta('page_footer');
if( !empty($page_footer) && $page_footer!='default' ){
    global $flayout;
    $flayout = $page_footer;
}
// get footer
get_footer();
?>
