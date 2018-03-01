<?php

class WPBakeryShortCode_Tt_Portfolio extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'filter' => 'yes',
            'count' => '8',
            'pager' => 'no',
            'space' => 'yes',
            'categories' => '',
            'extra_class' => ''
        ), $atts));

        // Build category ids
        global $paged;
        if( is_front_page() ){
            $paged = get_query_var('page') ? get_query_var('page') : 1;
        }


        // build category ids
        $cats = array();
        if( !empty($categories) ){
            $exps = explode(",", $categories);
            foreach($exps as $val){
                if( (int)$val>-1 ){
                    $cats[]=(int)$val;
                }
            }
        }


        // build query
        $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => $count,
                        'ignore_sticky_posts' => true,
                        'paged' => $paged
                    );
        if(!empty($cats)){
            $args['tax_query'] = array(
                                    'relation' => 'IN',
                                    array(
                                        'taxonomy' => 'portfolio_entries',
                                        'field' => 'id',
                                        'terms' => $cats
                                    )
                                );
        }

        $filter_html = '';
        $cat_array = array();
        $items = '';
        $grid_class = '';
        $posts_query = new WP_Query($args);
        while ( $posts_query->have_posts() ) {
            $posts_query->the_post();

            $img_size=TT::getmeta('folio_size')!='' ? TT::getmeta('folio_size'): '1x1';
            $col_class= 'col-md-3';
            $img = '';
            $thumb = '';
            if( TT::getmeta('folio_size') == '2x1' || TT::getmeta('folio_size') == '2x2' ) {
                $col_class = 'col-md-6';
            }


            if( has_post_thumbnail() ){
                $thumb = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), "rozario-portfolio-".$img_size );
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                $img = !empty($img) ? $img[0] : '';
            } else {
                $img = get_template_directory_uri().'/images/4x3-gray.png';
                $thumb = "<img src='$img' alt='".esc_attr__('No image', 'rozario')."'>";
            }


            // Categories
            $cats = '';
            $last_cat = '';
            $cat_titles = array();
            $terms = wp_get_post_terms(get_the_ID(), 'portfolio_entries');
            foreach ($terms as $term){
                $cat_title = $term->name;
                $cat_slug = $term->slug;

                $cat_titles []= $cat_title;
                if( $filter=='yes' && !in_array($term->term_id, $cat_array) ){
                    $filter_html .= '<li><a href="javascript:;" data-filter=".'.$cat_slug.'">'. $cat_title .'</a></li> ';
                    $cat_array[] = $term->term_id;
                }

                $cats .= "$cat_slug ";
                $last_cat = $cat_title;
            }
            
            // Hover
            $hover_html = "<div class='entry-hover'>
                                <div class='entry-meta'>
                                    <div class='entry-actions'>
                                        <a href='".get_permalink()."'><i class='fa fa-link'></i></a>
                                        <a href='$img' class='image-link'><i class='fa fa-search'></i></a>
                                    </div>
                                    <h3>".get_the_title()."</h3>
                                    <a href='".get_the_permalink()."' class='post-link'>".esc_html__('View more', 'rozario') . "</a>
                                </div>
                            </div>";

             $space_active='';
                if ($space == 'yes') {
                        $space_active = "pvt3";
                    }
                    else{
                         $space_active = "ph0";
                    }
        

            $items .= "<div class='col-xs-12 col-sm-4 $col_class $cats  $space_active  masonry-item'>
                            <div class='portfolio-item'>
                               $thumb
                               $hover_html
                            </div>
                        </div>";
        }

     // Pager
        $pagination = '';
        if( $pager=='yes' ){
            
            $pager_result = '';
            ob_start();
            TPL::pagination($posts_query);
            $pager_result .= ob_get_contents();
            ob_end_clean();

            $pagination = "<div class='post-navigation boxed mv6'>
                               $pager_result
                            </div>";
        }
        else {
            $pagination = '';
        }

        // reset query
        wp_reset_postdata();
     
      
        // filter
        if( $filter=='yes' ){
            $filter_html = "<div class='portfolio-filter'>
                                <ul>
                                    <li class='active'><a href='javascript:;' data-filter='*' >".esc_attr__('All', 'rozario')."</a></li>
                                    $filter_html
                                </ul>
                            </div>";
        }
        else{
            $filter_html = "";
        } 

        return "<div class='portfolio-section'>
                    $filter_html
                    <div class='portfolio-container masonry' data-col-width='.col-md-3' >                    
                        $items
                    </div>
                    $pagination
                </div><!-- /.portfolio-section -->";
    }
}

vc_map( array(
    "name" => esc_html__('Portfolio', 'rozario'),
    "description" => esc_html__("post type: portfolio", 'rozario'),
    "base" => 'tt_portfolio',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => esc_html__('rozario', 'rozario'),
    'params' => array(

        
        array(
            "type" => "dropdown",
            "param_name" => "filter",
            "heading" => esc_html__("Filter", 'rozario'),
            "value" => array(
                "Yes" => "yes",
                "No" => "no"
            ),
            "std" => "yes"
        ),
         array(
                    "type" => "dropdown",
                    "param_name" => "space",
                    "heading" => esc_html__("Space", 'rozario'),
                    "value" => array(
                        "Yes" => "yes",
                        "No" => "no"
                    ),
                    "std" => "yes"
                ),

        array(
            "type" => 'textfield',
            "param_name" => "count",
            "heading" => esc_html__("Posts per page", 'rozario'),
            "value" => '8'
        ),

        array(
            "type" => "dropdown",
            "param_name" => "pager",
            "heading" => esc_html__("Pagination", 'rozario'),
            "value" => array(
                "No" => "no",
                "Yes" => "yes"
            ),
            "std" => "no"
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'rozario'),
        )
    )
));