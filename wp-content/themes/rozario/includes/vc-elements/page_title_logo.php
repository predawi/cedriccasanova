<?php

class WPBakeryShortCode_tt_page_title extends WPBakeryShortCode
{
    protected function content($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'sub_title' => 'We Serve Food with Smile',
            'title' => 'The italian Sizzling Delights',

            'button1'=>'CONTACT US',
            'button2'=>'RESERVE A TABLE',
            'image_top'=>'',
            'image_bottom'=>'',
            'link1'=>'#',
            'link2'=>'#',
            'button'=>'yes',
            'text' => '',
            'float' => 'text-center',
            "extra_class" => ""
        ), $atts));


        if($button=='yes'){
              $link_button="<a href='$link1' class='button small'>$button1</a>
                        &nbsp;&nbsp;
                           <a href='$link2' class='button small fill'>$button2</a>";
        }
        $atach_src = wp_get_attachment_image_src($image_top, 'full');
        $image_top = is_array($atach_src) ? $atach_src[0] : "";

        $atach_src2 = wp_get_attachment_image_src($image_bottom, 'full');
        $image_bottom = is_array($atach_src2) ? $atach_src2[0] : "";


        $result = "<div class='home4-caption $float'>
                                    <div class='mv3'> 
                                       <img  src='".$image_top."' data-width='242px' alt='".esc_attr__('image', 'rozario')."' >
									 
                                     </div>
                                    <h2>$title</h2>
                                    <h4>$sub_title</h4>
                                    <p>
                                       $link_button
                                    </p>
                                    <div class='mv3'><img  src='".$image_bottom." ' data-width='242px' alt='".esc_attr__('image', 'rozario')."'></div>
                        </div>";
        
        return $result;
    }
}
vc_map(array(
    "name" => esc_html__("tt_page_title", 'rozario'),
    "description" => esc_html__("Page title text element", 'rozario'),
    "base" => "tt_page_title",
    "class" => "",
    "icon" => "icon-wpb-quickload",
    "category" => 'rozario',
    "show_settings_on_create" => true,
    "params" => array(
       
        array(
            "type" => "dropdown",
            "param_name" => "float",
            "heading" => esc_html__("Float", 'rozario'),
            "value" => array(
                "Left" => "text-left",
                "Center" => "text-center",
                "Right" => "text-right"
            ),
            "std" => "text-center"
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title text', 'rozario'),
            'param_name' => 'title',
            'admin_label' => true,
            'value' => 'The italian Sizzling Delights'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Sub title text', 'rozario'),
            'param_name' => 'sub_title',
            'value' => 'We Serve Food with Smile'
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image_top",
            "heading" => esc_html__(" Top Image", 'rozario')
        ),
        array(
            'type' => 'attach_image',
            "param_name" => "image_bottom",
            "heading" => esc_html__("Bottom Image", 'rozario')
        ),

        array(
            "type" => "dropdown",
            "param_name" => "button",
            "heading" => esc_html__("Button ", 'rozario'),
            "value" => array(
                "Yes" => "yes",
                "No" => "no"
            ),
            "std" => "yes"
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button1 Name', 'rozario'),
            'param_name' => 'button1',
            'value' => 'CONTACT US',
			"dependency" => Array("element" => "button", "value" => array("yes"))
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'rozario'),
            'param_name' => 'link1',
            'value' => '#',
            "dependency" => Array("element" => "button", "value" => array("yes"))
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button2 Name', 'rozario'),
            'param_name' => 'button2',
            'value' => 'RESERVE A TABLE',
            "dependency" => Array("element" => "button", "value" => array("yes"))
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'rozario'),
            'param_name' => 'link2',
            'value' => '#',
            "dependency" => Array("element" => "button", "value" => array("yes"))
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