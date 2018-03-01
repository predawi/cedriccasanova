<?php

class WPBakeryShortCode_tt_Title extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {
        extract(shortcode_atts(array(
            "layout" => 'standard',
            'sub_title' => 'Sub title',
            'title' => 'Content Title',
            'image'=>'',
            'text' => '',
            'float' => 'text-center',
            "extra_class" => ""
        ), $atts));
        $image = wp_get_attachment_image($image, 'full');

        $title1 = $title!=''? "<h3 class='$color'>$title</h3>": '';
        $sub_title1 = $sub_title!='' ? "<h4 class='$color'>$sub_title</h4>" : '';

        $title = $title!=''? "<h3>$title</h3>": '';
        $sub_title = $sub_title!='' ? "<h4>$sub_title</h4>" : '';

        if ($layout == 'with-separator') {
            $result = "<div class='heading $float $extra_class'>
                            $title1
                            $sub_title1
                            <div class='line img-icon'>
                                $image
                            </div>
                        </div>";
        } else {
            $result = "<div class='heading-top $extra_class $float'>
                            $title
                            $sub_title
                       </div>";
        }
        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("title", 'rozario'),
    "description" => esc_html__("content title text element", 'rozario'),
    "base" => "tt_title",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Separator", 'rozario'),
            "value" => array(
                "Hide" => "standard",
                "Show" => "with-separator"
            ),
            "std" => "standard"
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
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image", 'rozario'),
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