<?php

class WPBakeryShortCode_tt_separator extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'sub_title' => 'Executive Chef',
            'title' => 'John Peter',
            "extra_class" => ""
        ), $atts));
            $result = " <div class='heading-small $extra_class mv4 mvb0'>
                                    <div>
                                        <h4>$title</h4>
                                        <h6>$sub_title</h6>
                                    </div>
                                </div>";

        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("separator", 'rozario'),
    "description" => esc_html__(" separator element", 'rozario'),
    "base" => "tt_separator",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title text', 'rozario'),
            'param_name' => 'title',
            'admin_label' => true,
            'value' => 'John Peter'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub title text', 'rozario'),
            'param_name' => 'sub_title',
            'value' => 'Executive Chef'
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