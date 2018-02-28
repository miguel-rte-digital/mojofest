<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_media($atts, $content) {
    $element_id = 'efcb-media-' . rand(100, 1000);
    $display_num = apply_filters('fudge_media_count', 9);
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $medias = isset($atts['entities']) ? explode(',', $atts['entities']) : array();
    $icon_font_color = isset($atts['icon_font_color']) ? $atts['icon_font_color'] : '';
    $show_load = false;
    $remaining = array();
    if ( is_array($medias) && count($medias) > $display_num) {
        $remaining = array_slice($medias, $display_num);
        $medias = array_slice($medias, 0 ,$display_num);
        $show_load = true;
    }
    $style_items = array(
        'section' => array(
            'background-color' => 'background_color',
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
        'icon' => array(
            'color' => 'icon_font_color',
        ),
        'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
        'subtitle' => array(
            'color' => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size',
        ),
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_media', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'medias' => $medias,
        'remaining' => $remaining,
        'show_load' => $show_load,
        'element_id' => $element_id,
        'icon_font_color' => $icon_font_color,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts)
    ));
}

// Register Shortcode
add_shortcode('efcb-section-media', 'efcb_media');
