<?php

class WPBakeryShortCode_Tt_Content_team_Slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract( shortcode_atts( array(
            "layout" => 'standard',
            "arrows" => 'show',
            "bullets" => "show",
            "social_facebook" => "",
            "social_twitter" => "",
            "social_linkedin" => "",
            "social_instagram" => "",
            "list" => "",
            "extra_class" => ""
        ), $atts ) );


        $list = vc_param_group_parse_atts($list);
        $lists = '';
        $slider_bullets = "<div class='swiper-pagination'></div>";

        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                
                $sub_title = isset($item['sub_title']) ? $item['sub_title'] : "";
                $sub_title = !empty($sub_title) ? "<h5 class='entry-date'><span>$sub_title</span></h5>" : "";

                $title = isset($item['title']) ? $item['title'] : "";
                $title = !empty($title) ? "<h3 class='post-title'>$title</h3>" : "";


                $atach_src = wp_get_attachment_image_src($image, 'large');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                    $lists .= "<div class='swiper-slide col-sm-4 '>
                                  <div class='team-member'>
	                                  <div class='entry-image'>
                                         <img src='".esc_attr($image)."' alt='team image'>
	                                         <div class='entry-overlay'></div>
	                                         <div class='entry-info'>
                                                 $title
                                                 $sub_title
                                                   
                                            </div>
		                                </div>
	                                </div>
			                     </div>";
            }
        }
            $result = "<div class='container-large'>
                            <div class='team-carousel'>
                                <div class='swiper-container'>
                                    <div class='swiper-wrapper'>
                                       $lists
                                    </div>
                                    <div class='swiper-pagination'></div>
                                </div>
                            </div>
                </div>";

        return $result;
    }
}

vc_map( array(
    "name" => esc_html__("Team Slider", 'rozario'),
    "description" => esc_html__("Swiper Team Slider", 'rozario'),
    "base" => "tt_Content_team_Slider",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'rozario'),
            'param_name' => 'list',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    "param_name" => "image",
                    "heading" => esc_html__("Image", 'rozario')
                ),

                // title text
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title text', 'rozario'),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'value' => 'Title'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Sub title text', 'rozario'),
                    'param_name' => 'sub_title',
                    'value' => 'Sub Title'
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "social_twitter",
                    "heading" => esc_html__("Twitter", 'rozario'),
                    "value" => '#'
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "social_linkedin",
                    "heading" => esc_html__("Linkedin", 'rozario'),
                    "value" => ''
                ),
                array(
                    'type' => 'textfield',
                    "param_name" => "social_instagram",
                    "heading" => esc_html__("Instagram", 'rozario'),
                    "value" => ''
                )
            )
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'rozario'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'rozario'),
        )
    )
) );