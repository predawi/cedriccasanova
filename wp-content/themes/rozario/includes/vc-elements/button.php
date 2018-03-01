<?php

class WPBakeryShortCode_Button extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'button_text' => 'Read more',
            'button_link' => '#',
            'style' => 'normal',
            'float' => 'float-left',
            'extra_class' => ''
        ), $atts));

        $extra_class .= $style == 'lined' ? 'lined' : '';   

        $return = "<div class='$float'><a href='$button_link' class='button $extra_class'>$button_text</a></div>";

           return $return;
    }
}

vc_map( array(
    "name" => esc_html__('Button', 'rozario'),
    "description" => esc_html__("rozario Button", 'rozario'),
    "base" => 'button',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => esc_html__('rozario', 'rozario'),
    'params' => array(
        array(
            "type" => 'textfield',
            "param_name" => "button_text",
            "heading" => esc_html__("Button text", 'rozario'),
            "value" => 'KNOW MORE',
            "holder" => 'div'
        ),
        array(
            "type" => 'textfield',
            "param_name" => "button_link",
            "heading" => esc_html__("Button link", 'rozario'),
            "value" => '',
        ),
        array(
            "type" => "dropdown",
            "param_name" => "style",
            "heading" => esc_html__("Style", 'rozario'),
            "value" => array(
                "Lined" => "lined",
                "Normal" => "normal"
            ),
            "std" => "normal"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "float",
            "heading" => esc_html__("Float", 'rozario'),
            "value" => array(
                "Left" => "pull-left",
                "Center" => "text-center",
                "Right" => "pull-right"
            ),
            "std" => "pull-left"
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