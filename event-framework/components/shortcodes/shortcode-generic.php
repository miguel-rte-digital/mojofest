<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_generic($atts) {
    $element_id = 'efcb-generic-' . rand(100, 1000);

    $section_1_text = isset($atts['section_1_text']) ? $atts['section_1_text'] : '';
    $section_1_url = isset($atts['section_1_url']) ? $atts['section_1_url'] : '';
    $section_1_icon = isset($atts['section_1_icon']) ? $atts['section_1_icon'] : '';
    $section_2_text = isset($atts['section_2_text']) ? $atts['section_2_text'] : '';
    $section_2_url = isset($atts['section_2_url']) ? $atts['section_2_url'] : '';
    $section_2_icon = isset($atts['section_2_icon']) ? $atts['section_2_icon'] : '';
    $section_3_text = isset($atts['section_3_text']) ? $atts['section_3_text'] : '';
    $section_3_url = isset($atts['section_3_url']) ? $atts['section_3_url'] : '';
    $section_3_icon = isset($atts['section_3_icon']) ? $atts['section_3_icon'] : '';

    $section_1_hover_background_color = isset($atts['section_1_hover_background_color']) ? $atts['section_1_hover_background_color'] : '';
    $section_2_hover_background_color = isset($atts['section_2_hover_background_color']) ? $atts['section_2_hover_background_color'] : '';
    $section_3_hover_background_color = isset($atts['section_3_hover_background_color']) ? $atts['section_3_hover_background_color'] : '';

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom'
        ),
        'section_1' => array(
            'background-color' => 'section_1_background_color',
        ),
        'section_1_icon' => array(
            'background-color' => 'section_1_icon_background_color',
            'color' => 'section_1_icon_color'
        ),
        'section_1_text' => array(
            'color' => 'section_1_text_color',
            'font-size' => 'text_font_size'
        ),
        'section_2' => array(
            'background-color' => 'section_2_background_color',
            'color' => 'section_2_text_color'
        ),
        'section_2_icon' => array(
            'background-color' => 'section_2_icon_background_color',
            'color' => 'section_2_icon_color',
        ),
        'section_2_text' => array(
            'color' => 'section_2_text_color',
            'font-size' => 'text_font_size'
        ),
        'section_3' => array(
            'background-color' => 'section_3_background_color',
            'color' => 'section_3_text_color'
        ),
        'section_3_icon' => array(
            'background-color' => 'section_3_icon_background_color',
            'color' => 'section_3_icon_color',
        ),
        'section_3_text' => array(
            'color' => 'section_3_text_color',
            'font-size' => 'text_font_size'
        ),
        'icon' => array(
            'font-size' => 'icon_font_size'
        )
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_generic', array(
        'section_1_text' => $section_1_text,
        'section_1_url' => $section_1_url,
        'section_1_icon' => $section_1_icon,
        'section_2_text' => $section_2_text,
        'section_2_url' => $section_2_url,
        'section_2_icon' => $section_2_icon,
        'section_3_text' => $section_3_text,
        'section_3_url' => $section_3_url,
        'section_3_icon' => $section_3_icon,
        'section_1_hover_background_color' => $section_1_hover_background_color,
        'section_2_hover_background_color' => $section_2_hover_background_color,
        'section_3_hover_background_color' => $section_3_hover_background_color,
        'element_id' => $element_id,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts)
    ));

}

// Register Shortcode
add_shortcode('efcb-section-generic', 'efcb_generic');
