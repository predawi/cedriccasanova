<?php

class WPBakeryShortCode_Image_Box extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'image' => '',
            'text' => 'FREAKFAST',
            'float' => 'center',
            'extra_class' => ''
        ), $atts));

        $atach_src2 = wp_get_attachment_image_src($image, 'full');
        $image = is_array($atach_src2) ? $atach_src2[0] : "";

        $return = "<div class='".$float." text-center pv2 bg-contain bg-center-center ' data-bg-image='".$image."'>

                                <h3>$text</h3>
                            </div>";
           return $return;
    }
}

vc_map( array(
    "name" => esc_html__('Image menu title', 'rozario'),
    "description" => esc_html__("Image and text title", 'rozario'),
    "base" => 'image_box',
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
            'type' => 'textfield',
            'heading' => esc_html__('Title text', 'rozario'),
            'param_name' => 'text',
            'admin_label' => true,
            'value' => ''
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