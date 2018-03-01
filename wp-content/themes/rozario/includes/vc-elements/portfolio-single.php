<?php

class WPBakeryShortCode_tt_single_detial extends WPBakeryShortCode
{
	protected function content($atts, $content = null)
	{
		extract(shortcode_atts(array(
			"list" => "",	
			"title" =>"Details",
			"extra_class" => ""
		), $atts));

		$list = vc_param_group_parse_atts($list);
		$lists = '';

		if (is_array($list)) {
			foreach ($list as $item) {
				$image = isset($item['image']) ? $item['image'] : "";


				$name = isset($item['name']) ? $item['name'] : "";
				$name = !empty($name) ? "$name" : "";

				$detail_text = isset($item['detail_text']) ? $item['detail_text'] : "";
				$detail_text = !empty($detail_text) ? "$detail_text" : "";

					$lists .= "<tr>
	                                <td class='entry-title'>$name</td>
	                                <td><em>$detail_text</em></td>
                              </tr>";
				}

		}

		$result = "<div class='address-box ".$extra_class." mv3 mvt0'>
		                            <h4>".$title."</h4>
		                            <table>
		                                $lists
		                            </table>
		                        </div>";

		return $result;
	}
}
vc_map(array(
	"name" => esc_html__("Portfolio single ", 'rozario'),
	"description" => esc_html__("content ", 'rozario'),
	"base" => "tt_single_detial",
	"class" => "",
	"icon" => "icon-wpb-quickload",
	"category" => 'rozario',
	"show_settings_on_create" => true,
	"params" => array(
		array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'rozario'),
					'param_name' => 'title',
					'value' => 'Details'
				),
		array(
			'type' => 'param_group',
			'heading' => esc_html__('Values', 'rozario'),
			'param_name' => 'list',
			'value' => '',
			'params' => array(
				
				// title text

				array(
					'type' => 'textfield',
					'heading' => esc_html__('Name', 'rozario'),
					'param_name' => 'name',
					'value' => 'Recipe'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Detail text', 'rozario'),
					'param_name' => 'detail_text',
					'value' => 'Spring rolls'
				),

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