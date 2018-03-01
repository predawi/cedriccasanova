<?php

class WPBakeryShortCode_Tt_Blog extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'layout' => 'standard', // value: standard | boxed | horizontal
            'columns' => '3',       // value: 1,2,3,4 - standard | boxed
            'masonry' => 'none',    // value: none, masonry - standard
            'img_align' => 'left',  // value: left, mixed - horizontal
            'count' => '3',
            'pager' => 'hiden',
            'categories' => '',
            'extra_class' => ''
        ), $atts));

        $atts['columns'] = $columns;
        $atts['masonry'] = $masonry;
        $atts['img_align'] = $img_align;

        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( (int)$val>-1 ){
                    $cats[]=(int)$val;
                }
            }
        }
        $paged = get_query_var('paged') ? (int)get_query_var('paged') : 1;
        if( is_front_page() ){
            $paged = get_query_var('page') ? (int)get_query_var('page') : $paged;
        }
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'paged' => $paged,
            'ignore_sticky_posts' => true
        );
        if(!empty($cats)){
            $args['category__in'] = $cats;
        }
        $items = '';
        $post_index = 1;
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();

            if( $layout=='boxed' ){
                $items .= $this->get_boxed_items($atts);
            }
            else if( $layout=='horizontal' ){
                $format = get_post_format();
                if( $format=='quote' || $format=='link' ){
                    $post_index = 0;
                }
                $atts['post_index'] = $post_index;
                $items .= $this->get_horizontal_items($atts);
            }

            else{
                $items .= $this->get_standard_items($atts);
            }

            $post_index++;
        }
        $result = '';
        if( $layout=='boxed' ){
            $result = "<div class='container-large'>
                            <div class='row'>$items</div>
                        </div>";
        }
        else if( $layout=='horizontal' ){
            $result = "<div class='blog-horizontal-wrapper'>$items</div>";
        }
        else{
            if( $masonry=='masonry' ){
                $result = "<div class='container-fluid ph0'>
                                <div class='row masonry-padding'>$items</div>
                            </div>";
            }
            else{
                $result = "<div class='container-large'>
                                <div class='row'>$items</div>
                            </div>";
            }
        }

        if( $pager!='hide' ){
            $pagination = TPL::pagination($posts_query);
            if( !empty($pagination) ){
                $result .= "<div class='post-navigation mv10'>$pagination</div>";
            }
        }

        // reset query
        wp_reset_postdata();

        return $result;

    }

    public function get_standard_items($atts){

        $format = get_post_format();

        $category = '';
        $post_categories = wp_get_post_categories(get_the_id());
        foreach($post_categories as $c){
            $cat = get_category($c);
            $category = "<a href='".get_term_link($cat)."'>$cat->name</a>";
        }
        $columns = isset($atts['columns']) && abs($atts['columns'])>0 ? abs($atts['columns']) : 1;
        $masonry = isset($atts['masonry']) && !empty($atts['masonry']) ? $atts['masonry'] : 'none';
        $img_size = 'rozario-st-col1';
        $img_size = $columns>1 ? 'rozario-st-cols' : $img_size;
        $img_size = $masonry=='masonry' ? 'rozario-masonry' : $img_size;

        if( has_post_thumbnail() ){
            $thumb_img = wp_get_attachment_image( get_post_thumbnail_id(), 'rozario-boxed-item' );
        }
        $entry_date = '<div class="entry-date"><span>'.get_the_time('d M, Y').'</span></div>';
        $title = '<div class="entry-title">
                    <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                    <div class="entry-category">'.$category.'</div>
                </div>';
        $entry_meta = '<a href="'.get_permalink().'" class="entry-image">
                                '.$thumb_img.'
                            </a>';
        if( $format=='video' ){
            $video_link = 'javascript:;';
            if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches ) ){
                if(isset($matches[1])){
                    $video_link = $matches[1];
                }
            }
            $entry_date = '<a href="'.esc_attr($video_link).'" class="video-play"><i class="fa fa-play"></i></a>' . $entry_date;
        }


        $result = '<article class="blog-grid-item">
                          '.$entry_date.'
                          '.$entry_meta.'
                          '.$title.'
                    </article>';

        if( $format=='quote' ){
            preg_match("/<blockquote>(.*?)<\/blockquote>/msi", get_the_content(), $matches);
            if( isset($matches[0]) && !empty($matches[0]) ){
                $quote = $matches[0];
                $quote = str_replace("<blockquote", "<blockquote class='quote-element'", $quote);
                $result = '<article class="blog-grid-item">
                          '.$entry_date.'
                          '.$entry_meta.'
                          '.$title.'
                    </article>';
            }
        }
        else if( $format=='link' ){
            preg_match('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', get_the_content(), $matches);
            if( isset($matches[1],$matches[2]) && !empty($matches[2]) ){
                $quote = "<blockquote class='quote-element link-element'>
                            $matches[2]
                            <cite><a href='$matches[1]'>$matches[1]</a></cite>
                          </blockquote>";
                $result = '<article class="blog-grid-item">
                          '.$entry_date.'
                          '.$entry_meta.'
                          '.$title.'
                    </article>';
            }
        }

        $post_class = $masonry=='masonry' ? 'masonry-item' : '';
        if( $columns==2 ){
            $post_class = "col-sm-6";
            return '<div class="'.$post_class.'">'.$result.'</div>';
        }
        else if( $columns==3 ){
            $post_class = "col-sm-4";
            return '<div class="'.$post_class.'">'.$result.'</div>';
        }
        else if( $columns==4 ){
            $post_class = "col-sm-4 ph0 col-md-3";
            return '<div class="'.$post_class.'">'.$result.'</div>';
        }
        else{
            return $result;
        }

    }
    public function get_boxed_items($atts){

        $format = get_post_format();

        $category = '';
        $post_categories = wp_get_post_categories(get_the_id());
        foreach($post_categories as $c){
            $cat = get_category($c);
           http://demo.themeton.com/rozario/home-3/ = "<a href='".get_term_link($cat)."'>$cat->name</a>";
        }

        $post_class = '';

        $entry_media = '<div class="entry-media">
                            <img src="'.get_template_directory_uri().'/images/1x1.png" alt="'.esc_attr__('image', 'rozario').'">
                            <div class="entry-overlay"></div>
                        </div>';

        if( has_post_thumbnail() ){
            $thumb_img = wp_get_attachment_image( get_post_thumbnail_id(), 'rozario-post_tump' );
            $entry_media = ' <div class="entry-media">
                                        <a href="'.get_permalink().'" class="el-link">
                                            '.$thumb_img.'
                                        </a>
                                    </div>';
        }
        $entry_date = '<div class="entry-date">
                            <span>'.get_the_time('M d, Y').' </span>
                        </div>';
        $excerpt = TPL::clear_urls(wp_trim_words( wp_strip_all_tags(do_shortcode(get_the_content())), 20 ));
        $entry_expert = ' <div class="entry-excerpt text-left">
                                        <h2 class="post-title">
                                            <a href="'.get_permalink().'">'.get_the_title().'</a>
                                        </h2>

                                        <div class="entry-category">
                                           '.$category.'
                                        </div>

                                        <p>
                                           '.$excerpt.'
                                        </p>

                                      <div class="read-more">
                                          <a href="'.get_permalink().'" class="button bordered fill small">'.esc_html__('Read More', 'rozario').'</a>
                                      </div>
                                    </div>';
        if( $format=='video' ){
            $video_link = 'javascript:;';
            if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches ) ){
                if(isset($matches[1])){
                    $video_link = $matches[1];
                }
            }
            $entry_date = '<a href="'.esc_attr($video_link).'" class="video-play"><i class="fa fa-play"></i></a>' . $entry_date;
            $readmore = '';
        }
        else if( $format=='quote' ){
            preg_match("/<blockquote>(.*?)<\/blockquote>/msi", get_the_content(), $matches);
            if( isset($matches[0]) && !empty($matches[0]) ){
                $title = $matches[0];
                $post_class = 'post-format-quote';
                $readmore = '';
                $entry_media = '<div class="entry-media">
                                    <img src="'.get_template_directory_uri().'/images/1x1.png" alt="'.esc_attr__('image', 'rozario').'">
                                </div>';
            }
        }
        else if( $format=='link' ){
            preg_match('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', get_the_content(), $matches);
            if( isset($matches[1],$matches[2]) && !empty($matches[2]) ){
                $title = "<blockquote>
                            $matches[2]
                            <cite><a href='$matches[1]'>$matches[1]</a></cite>
                          </blockquote>";
                $post_class = 'post-format-quote format-link';
                $readmore = '';
                $entry_media = '<div class="entry-media">
                                    <img src="'.get_template_directory_uri().'/images/1x1.png" alt="'.esc_attr__('image', 'rozario').'">
                                </div>';
            }
        }

        // columns
        $columns = isset($atts['columns']) && abs($atts['columns'])>0 ? abs($atts['columns']) : 3;
        if( $columns==2 ){
            $post_class = "col-sm-6";
        }
        else if( $columns==3 ){
            $post_class = "col-sm-6 col-md-4";
        }
        else if( $columns==4 ){
            $post_class = "col-sm-6 col-md-4 col-lg-3";
        }
        else{
            $post_class = "col-sm-12";
        }

        $result = '<div class="'.esc_attr($post_class).'">
                      <article class="blog-item">
                        '.$entry_date.'
                        '.$entry_media.'
                        '.$entry_expert.'
                        </article>
                    </div>';

        return $result;
    }
    public function get_horizontal_items($atts){

        $format = get_post_format();
        $category = '';
        $post_categories = wp_get_post_categories(get_the_id());
        foreach($post_categories as $c){
            $cat = get_category($c);
            $category = "<a href='".get_term_link($cat)."'>$cat->name</a>";
        }
        $entry_media = '<td class="entry-media">
                            <a href="'.get_permalink().'" class="el-link">
                            </a>
                        </td>';
        if( has_post_thumbnail() ){
            $thumb_img = wp_get_attachment_image( get_post_thumbnail_id(), 'rozario-horizontal' );
            $entry_media = '<td class="entry-media">
                                <a href="'.get_permalink().'" class="el-link">
                                    '.$thumb_img.'
                                </a>
                            </td>';
        }
        if( $format=='video' ){
            if ( preg_match( '|^\s*(https?://[^\s"]+)\s*$|im', get_the_content(), $matches ) ) {
                if(isset($matches[1])) {
                    $thumb_img = '<img src="'.get_template_directory_uri().'/images/4x3.png" alt="'.esc_attr__('image', 'rozario').'">';
                    $thumb_img = has_post_thumbnail() ? wp_get_attachment_image( get_post_thumbnail_id(), 'rozario-horizontal' ) : $thumb_img;
                    $entry_media ='<td class="entry-media">
                                        <div class="video-element">
                                            <a href="'.esc_attr($matches[1]).'">'.$thumb_img.'</a>
                                        </div>
                                    </td>';
                }
            }
        }
        $excerpt = TPL::clear_urls(wp_trim_words( wp_strip_all_tags(do_shortcode(get_the_content())), 40 ));
        $excerpt = '<td class="entry-excerpt">
                        <div class="entry-date"><span>'.get_the_time('M d, Y').'</span></div>
                            <h2 class="post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                        <div class="entry-category">'.$category.'</div>
                        <p>'.$excerpt.'</p>
                        <div class="read-more">
                            <a href="'.get_permalink().'" class="button bordered fill small text-light">'.esc_html__('Read More', 'rozario').'</a>
                        </div>
                    </td>';
        $left_content = $entry_media;
        $right_content = $excerpt ;
        $img_align = isset($atts['img_align']) && !empty($atts['img_align']) ? $atts['img_align'] : 'right';
        $index = isset($atts['post_index']) && abs($atts['post_index'])>0 ? abs($atts['post_index']) : 1;

        if( $img_align=='mixed' && ($index%2)==0 ){
            $tmp = $left_content;
            $left_content = $right_content;
            $right_content = $tmp;
        }
        if( $img_align=='mixed' ){
            $left_content = str_replace(' text-left">', '">', $left_content);
            $right_content = str_replace(' text-left">', '">', $right_content);

            $left_content = str_replace(' class="entry-excerpt', ' class="entry-excerpt text-right', $left_content);
            $right_content = str_replace(' class="entry-excerpt', ' class="entry-excerpt text-left', $right_content);
        }
        $result = '<article class="blog-item horizontal half-full">
                        <table>
                            <tr>
                                '.$left_content.'
                                '.$right_content.'
                            </tr>
                        </table>
                     </article> ';
        return $result;
    }
}

vc_map( array(
    "name" => esc_html__('Blog', 'rozario'),
    "description" => esc_html__("Blog posts", 'rozario'),
    "base" => 'tt_blog',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => 'rozario',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Layout Style", 'rozario'),
            "value" => array(
                "standard" => "standard",
                "Grid Item" => "boxed",
                "Horizontal" => "horizontal"
            ),
            "std" => "standard"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "columns",
            "heading" => esc_html__("Columns", 'rozario'),
            "value" => array(
                "1 Column" => "1",
                "2 Columns" => "2",
                "3 Columns" => "3",
            ),
            "std" => "3",
            "dependency" => Array("element" => "layout", "value" => array("standard", "boxed"))
        ),

        // standard
        array(
            "type" => "dropdown",
            "param_name" => "masonry",
            "heading" => esc_html__("Masonry layout", 'rozario'),
            "value" => array(
                "None" => "none",
                "Masonry" => "masonry"
            ),
            "std" => "none",
            "dependency" => Array("element" => "layout", "value" => array("standard"))
        ),

        // horizontal
        array(
            "type" => "dropdown",
            "param_name" => "img_align",
            "heading" => esc_html__("Image Align", 'rozario'),
            "value" => array(
                "Left" => "left",
                "Left, Right mixed" => "mixed"
            ),
            "std" => "left",
            "dependency" => Array("element" => "layout", "value" => array("horizontal"))
        ),

        // common
        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts Count", 'rozario'),
            "value" => '3'
        ),
        array(
            "type" => "dropdown",
            "param_name" => "pager",
            "heading" => esc_html__("Pagination", 'rozario'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "show"
        ),

        array(
            "type" => 'textfield',
            "param_name" => "categories",
            "heading" => esc_html__("Categories", 'rozario'),
            "description" => esc_html__("Specify category Id or leave blank to display items from all categories.", 'rozario'),
            "value" => ''
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'rozario'),
            "value" => "",
            "description" => esc_html__("If you wish text to white, you should add class \"text-light\". If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'rozario'),
        )
    )
));