<?php

class WPBakeryShortCode_Tt_carousel_Slider extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract( shortcode_atts( array(
            "layout" => 'standard',
            "arrows" => 'show',
            "bullets" => "show",
            "image_member" => "",
            "list" => "",
            "extra_class" => ""
        ), $atts ) );

        $list = vc_param_group_parse_atts($list);
        $lists = '';

        $slider_arrows = "<div class='swiper-button-prev'></div>
                          <div class='swiper-button-next'></div>";
        $slider_bullets = "<div class='swiper-pagination'></div>";

        if ($layout != 'rounded-image') {
            if ($arrows == 'hide') {
                $slider_arrows = '';
            }
            if ($bullets == '') {
                $slider_bullets = '';
            }
        }

 
        
        if( is_array($list) ){
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";
                $image_m = isset($item['image_member']) ? $item['image_member'] : "ppp";
                $title = isset($item['title']) ? $item['title'] : "";
                $title = !empty($title) ? "<h3 class='post-title'>$title</h3>" : "";
                $image = wp_get_attachment_image($image, 'full');

                $atach_src = wp_get_attachment_image_src($image_m, 'thumbnail');
                $image_member = is_array($atach_src) ? $atach_src[0] : "";
              

                if($layout =='rounded-image'){
                    $lists .= "<div class='swiper-slide'>
                                            <div class='rounded-image'>
                                                <a href='javascript:;'>
                                                $image
                                                </a>
                                            </div>
                                        </div>";
                }
                elseif($layout =='small_carousel'){
                    $lists.="<div class='swiper-slide'>
                                    <div class='chef-round'>
                                        <a href='javascript:;' data-bg-image='".$image_member."'></a>
                                    </div>
                              </div>";
                }
                else{
                    $lists .= "<div class='swiper-slide'>
                                    <div class='client-logo'>
                                         <a href='javascript:;'>$image</a>
                                    </div>
                               </div>";
                }
            }
        }
        if($layout == 'rounded-image') {
            $result = "<div class='container-large'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='swiper-container carousel-container rounded-images' data-col='7'>
                                    <div class='swiper-wrapper'>
                                        $lists
                                    </div>
                                    <div class='swiper-button-prev'></div>
                                    <div class='swiper-button-next'></div>
                                </div>

                            </div>
                        </div>
                    </div>";
        }
        elseif($layout =='small_carousel'){
                
                $result="<div class='chefs-carousel pv4 ". esc_attr($extra_class) . "'>
                                                <div class='swiper-container'>
                                                    <div class='swiper-wrapper'>
                                                       $lists
                                                    </div>
                                                    <div class='swiper-button-prev'></div>
                                                    <div class='swiper-button-next'></div>
                                                </div>
                                            </div>";
                 }
        else{
            $result = "<div class='fullscreen-section ". esc_attr($extra_class) . "'>
                            <div class='container-large'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='clients-carousel' data-cols='5'>
                                            <div class='swiper-container'>
                                                <div class='swiper-wrapper'>
                                                    $lists
                                                </div>
                                                <div class='swiper-pagination'></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>";
            }
        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("carousel  Slider", 'rozario'),
    "description" => esc_html__("Swiper carousel Slider", 'rozario'),
    "base" => "Tt_carousel_Slider",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Image style", 'rozario'),
            "value" => array(
                "Rounded" => "rounded-image",
                "Small Carousel" => "small_carousel",
                "Boxed" => "standard",
            ),
            "std" => "standard"
        ),
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
                    "heading" => esc_html__("Big image", 'rozario'),
                ),
                array(
                    'type' => 'attach_image',
                    "param_name" => "image_member",
                    "heading" => esc_html__("Thumbnail image", 'rozario'),
                    "description" => esc_html__("Optional. Works on Small caraousel layout only.", 'rozario'),
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