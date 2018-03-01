<?php

class WPBakeryShortCode_tt_chef_slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract( shortcode_atts( array(
            "arrows" => 'show',
            "bullets" => "show",
            "list" => "",
            "extra_class" => ""
        ), $atts ) );
        
        $list = vc_param_group_parse_atts($list);
        $lists = '';
        
        $slider_arrows = "<div class='swiper-button-prev'></div>
                          <div class='swiper-button-next'></div>";
        $slider_bullets = "<div class='swiper-pagination'></div>";
        
        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $title = isset($item['title']) ? $item['title'] : "";
                $title = !empty($title) ? "<h3 class='post-title'>$title</h3>" : "";
                $image = wp_get_attachment_image($image, 'thumbnail');
                
               
                    $lists .= "<div class='swiper-slide'>
                                    <div class='chef-round'>
                                        <a href='javascript:;'>$image</a>
                                    </div>
                                </div>";
                
            }
        }
            $result = " <div class='chefs-carousel $extra_class'>
                        <div class='swiper-container'>
                            <div class='swiper-wrapper'>
                                $lists
                            </div>
                            $slider_arrows
                        </div>
                    </div>";
        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("chef slider", 'rozario'),
    "description" => esc_html__("Chef small slider", 'rozario'),
    "base" => "tt_carousel_Slider",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(

        array(
            "type" => "dropdown",
            "param_name" => "arrows",
            "heading" => esc_html__("Slider Arrows", 'rozario'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "show",
        ),
        array(
            "type" => "dropdown",
            "param_name" => "bullets",
            "heading" => esc_html__("Slider Bullets", 'rozario'),
            "value" => array(
                "Show" => "show",
                "Hide" => "hide"
            ),
            "std" => "show",
        ),
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
));