<?php

global $rozario_social_icons;
$rozario_social_icons = array(
    "facebook" => "facebook",
    "twitter" => "twitter",
    "pinterest" => "pinterest",
    "instagram" => "instagram",
    "googleplus" => "google-plus",
);


add_action('admin_enqueue_scripts', 'rozario_admin_common_render_scripts');
function rozario_admin_common_render_scripts() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('themeton-admin-common-style', TT::file_require(get_template_directory_uri().'/framework/admin-assets/common.css', true) );

    wp_enqueue_script('wp-color-picker');
    
    wp_enqueue_script('themeton-admin-common-js', TT::file_require(get_template_directory_uri().'/framework/admin-assets/common.js', true), array('jquery'), false, true);
}


function rozario_add_video_radio($embed) {
    if (strstr($embed, 'http://www.youtube.com/embed/')) {
        return str_replace('?fs=1', '?fs=1&rel=0', $embed);
    } else {
        return $embed;
    }
}

add_filter('oembed_result', 'rozario_add_video_radio', 1, true);

if (!function_exists('custom_upload_mimes')) {
    add_filter('upload_mimes', 'custom_upload_mimes');

    function custom_upload_mimes($existing_mimes = array()) {
        $existing_mimes['ico'] = "image/x-icon";
        return $existing_mimes;
    }

}


if (!function_exists('format_class')) {

    // Returns post format class by string
    function format_class($post_id) {
        $format = get_post_format($post_id);
        if ($format === false)
            $format = 'standard';
        return 'format_' . $format;
    }
}





/**
 * This code filters the Categories archive widget to include the post count inside the link
 */
add_filter('wp_list_categories', 'rozario_cat_count_span');

function rozario_cat_count_span($links) {
    $links = str_replace('</a> (', ' <span>', $links);
    $links = str_replace('<span class="count">(', '<span>', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}

/**
 * This code filters the Archive widget to include the post count inside the link
 */
add_filter('get_archives_link', 'rozario_archive_count_span');

function rozario_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', ' <span>', $links);
    $links = str_replace(')</li>', '</span></a></li>', $links);
    return $links;
}





// ADDING ADMIN BAR MENU
if (!function_exists('rozario_admin_bar_menu')) {
    add_action('admin_bar_menu', 'rozario_admin_bar_menu', 90);

    function rozario_admin_bar_menu() {

        if (!current_user_can('manage_options'))
            return;

        global $wp_admin_bar;

        $admin_url = admin_url('admin.php');

     
    }

}