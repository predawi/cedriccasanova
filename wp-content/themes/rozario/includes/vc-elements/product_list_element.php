<?php

class WPBakeryShortCode_tt_product extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {
        extract(shortcode_atts(array(
            "layout" => 'standard',
            'title' => 'Content Title',
            'image'=>'',
            'details' => '',
            'price' => '',
            "extra_class" => ""
        ), $atts));
        $image = wp_get_attachment_image($image, 'full');

        if ($layout == 'with-image') {
            $result = "<table class='food-price-table  mv4 mvt0 '>
                            <tr>
                                <td class='brdn'>
                                   $image
                                </td>
                                <td class='brdn'>
                                    <div class='food-price'>
                                        <h4>$title</h4>
                                        <p>
                                            <span class='fp-title'>$details</span>
                                           <span class='fp-amount'>$price</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>";
        } else {
            $result = "<div class='food-price $extra_class'>
                                   <h4>$title</h4>
                                  <p>
                                   <span class='fp-title'>$details</span>
                                   <span class='fp-amount'>$price</span>
                                  </p>
                    </div>";
        }
        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("Product list", 'rozario'),
    "description" => esc_html__("Product menu  element", 'rozario'),
    "base" => "tt_product",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "param_name" => "layout",
            "heading" => esc_html__("Product image", 'rozario'),
            "value" => array(
                "Hide" => "standard",
                "Show" => "with-image"
            ),
            "std" => "standard"
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
            'heading' => esc_html__('Detail text', 'rozario'),
            'param_name' => 'details',
            'value' => 'Detail text'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Price', 'rozario'),
            'param_name' => 'price',
            'value' => '$45'
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image",
            "heading" => esc_html__("Image", 'rozario'),
            "value" => '',
            "std" => "show",
            "dependency" => Array("element" => "layout", "value" => array("with-image"))

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