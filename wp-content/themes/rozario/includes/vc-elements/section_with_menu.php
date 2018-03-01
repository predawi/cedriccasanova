<?php

class WPBakeryShortCode_tt_section_menu extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'title' => 'Title',
            'text' => '',
            'price'=>'$',
            'extra_class' => ''
        ), $atts));
        $return = "<div class='fullwidth-tabs'>
 <div class='container-large tabs-nav'>
                            <div class='row'>
                                <div class='col-md-8'>
                                    <ul>
                                        <li><a href='javascript:;'><i class='fa fa-cutlery'></i> Our Menu</a></li>
                                        <li class='active'><a href='javascript:;'><i class='fa fa-clock-o'></i> Breakfast</a></li>
                                        <li><a href='javascript:;'><i class='fa fa-clock-o'></i> Lunch</a></li>
                                        <li><a href='javascript:;'><i class='fa fa-clock-o'></i> Dinner</a></li>
                                    </ul>
                                </div>
                                <div class='col-md-4'>
                                    <a href='javascript:;' class='button small fill with-icon'><i class='fa fa-tags'></i> Order Online</a>
                                    &nbsp;
                                    <a href='javascript:;' class='button small fill black with-icon'><i class='fa fa-shopping-cart'></i> Free Delivery</a>
                                </div>
                            </div>
                        </div> </div>";
        return $return;
    }
}
vc_map( array(
    "name" => esc_html__('Section', 'rozario'),
    "description" => esc_html__("section menu", 'rozario'),
    "base" => 'tt_section_menu',
    "icon" => "icon-wpb-themeton",
    "content_element" => true,
    "category" => esc_html__('rozario', 'rozario'),
    'params' => array(


        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'rozario'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'rozario'),
        )
    )
));