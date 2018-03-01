<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- set options before less.js script -->
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.typekit.net/lpc2eta.css">
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<?php
$header_layout = TT::get_mod('header_layout');
global $rozario_menu_layout;
$header_layout = !empty($rozario_menu_layout) ? $rozario_menu_layout : $header_layout;
switch($header_layout){
    case 'menu_above_logo':
        get_template_part('layouts/header', 'menu-above-logo');
        break;
    case 'menu_full':
        get_template_part('layouts/header', 'menu-full-bg');
        break;
    case 'menu_top_center':
        get_template_part('layouts/header', 'menu-top-center');
        break;
    case 'menu_top_left':
        get_template_part('layouts/header', 'menu-top-left');
        break;
    default:
        // menu_below_logo
        get_template_part('layouts/header', 'menu-below-logo');
        break;
}
?>