<?php

class WPBakeryShortCode_Tt_Content_Slider extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {
        extract(shortcode_atts(array(
            "layout" => 'standard',
            "arrows" => 'show',
            "bullets" => "show",
            "list" => "",
            "extra_class" => ""
        ), $atts));

        $list = vc_param_group_parse_atts($list);
        $lists = '';
           
        if (is_array($list)) {
            foreach ($list as $item) {
                $image = isset($item['image']) ? $item['image'] : "";

                $atach_src = wp_get_attachment_image_src($image, 'tumbnail');
                $image = is_array($atach_src) ? $atach_src[0] : "";

                $role = isset($item['role']) ? $item['role'] : "";
                $role = !empty($role) ? "$role" : "";

                $name = isset($item['name']) ? $item['name'] : "";
                $name = !empty($name) ? "<h4 class='post-name'>$name</h4>" : "";

                $detail_text = isset($item['detail_text']) ? $item['detail_text'] : "";
                $detail_text = !empty($detail_text) ? "$detail_text" : "";

                $position = isset($item['position']) ? $item['position'] : "";
                $position = !empty($position) ? "<p>$position</p>" : "";


    

                if ($layout != 'with-avatar') {
                    $lists .= "<div class='swiper-slide'>
                                            <div class='row'>
                                                <div class='col-md-8 col-md-offset-2'>
                                                    <div class='testimonial'>
                                                       $detail_text
                                                        <div class='entry-meta'>
                                                            $name
                                                            <p>$role</p>
                                                            $position
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                } else {
                    $lists .= "<div class='swiper-slide'>
                                            <div class='row'>
                                                <div class='col-sm-8 col-sm-offset-2'>
                                                    <div class='testimonial with-avatar $extra_class'>
                                                        <img src='".esc_attr($image)."' alt='author image'>
                                                          <p>$detail_text</p>
                                                       <div class='entry-meta'>
                                                             $name
                                                            <p>$role</p>
                                                            <p class='color-brand'>
                                                                <i class='fa fa-star'></i>
                                                                <i class='fa fa-star'></i>
                                                                <i class='fa fa-star'></i>
                                                                <i class='fa fa-star'></i>
                                                                <i class='fa fa-star-half-full'></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                }
            }
        }
        /*arrow */
        $slider_arrows='';
        if ($arrows == 'show') {
                $slider_arrows = "<div class='swiper-button-prev'></div>
                                  <div class='swiper-button-next'></div>";
            }

        /*bullets*/
        $slider_bullets='';
        if ($bullets == 'show') {
                $slider_bullets = "<div class='swiper-pagination'></div>";
            }

        if ($layout == 'with-avatar') {
            $result = "<div class='swiper-container carousel-container ".$extra_class."'>
                            <div class='swiper-wrapper'>
                                $lists
                            </div>
                             $slider_arrows
                             $slider_bullets
                       </div>";
        } else {
            $result = "<div class='swiper-container carousel-container ".$extra_class."'>
                            <div class='swiper-wrapper'>
                                $lists
                            </div>
                            $slider_arrows
                            $slider_bullets
                          </div>";
        }
        return $result;
    }
}

vc_map(array(
    "name" => esc_html__("Testimonials", 'rozario'),
    "description" => esc_html__("Swiper  Slider", 'rozario'),
    "base" => "tt_content_slider",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Layout", 'rozario'),
            "value" => array(
                "Standard" => "standard",
                "With avatar" => "with-avatar"
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
                    "heading" => esc_html__("Image", 'rozario')
                ),


                // title text
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Role', 'rozario'),
                    'param_name' => 'role',
                    'value' => 'Co-Founder'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Name', 'rozario'),
                    'param_name' => 'name',
                    'value' => 'Shela Mathews'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Detail text', 'rozario'),
                    'param_name' => 'detail_text',
                    'value' => '""'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Position', 'rozario'),
                    'param_name' => 'position',
                    'value' =>'Freshy Food, UK'
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