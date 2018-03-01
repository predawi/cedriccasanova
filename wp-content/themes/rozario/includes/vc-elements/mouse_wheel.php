<?php

class WPBakeryShortCode_Tt_mouse_wheel extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'float' => '',
            'extra_class' => ''
        ), $atts));
        $return = " <span class='mouse-wheel $float $extra_class'></span>
                  ";
        return $return;
    }
}
vc_map( array(
    "name" => esc_html__('Mouse wheel', 'rozario'),
    "description" => esc_html__("mouse wheel", 'rozario'),
    "base" => 'tt_mouse_wheel',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => esc_html__('rozario', 'rozario'),
    'params' => array(
//        array(
//            "type" => "dropdown",
//            "param_name" => "float",
//            "heading" => esc_html__("Float", 'rozario'),
//            "value" => array(
//                "Left" => "text-left",
//                "Center" => "text-center",
//                "Right" => "text-right"
//            ),
//            "std" => "text-left"
//        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'rozario'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'rozario'),
        )
    )
));