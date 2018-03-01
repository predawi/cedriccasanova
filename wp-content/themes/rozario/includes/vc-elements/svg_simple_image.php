<?php

class WPBakeryShortCode_Image_svg extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'image' => '',
            'size' => '136',
            'float' => 'text-center',
            'extra_class' => ''
        ), $atts));

        $atach_src2 = wp_get_attachment_image_src($image, 'full');
        $image = is_array($atach_src2) ? $atach_src2[0] : "";

        $return = "<div class='".$float."'><img src='".$image."' alt='".esc_attr__('image', 'rozario')."' data-width='".$size."'></div>";
           return $return;
    }
}

vc_map( array(
    "name" => esc_html__('Simple image', 'rozario'),
    "description" => esc_html__("SVG simple image ", 'rozario'),
    "base" => 'image_svg',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => esc_html__('rozario', 'rozario'),
    'params' => array(
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image", 'rozario'),
            "value" => ''
        ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Size', 'rozario'),
            'param_name' => 'size',
            'admin_label' => true,
            'value' => '136'
        ),
          array(
            "type" => "dropdown",
            "param_name" => "float",
            "heading" => esc_html__("Float", 'rozario'),
            "value" => array(
                "Left" => "text-left",
                "Center" => "text-center",
                "Right" => "text-right"
            ),
            "std" => "text-left"
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