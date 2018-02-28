<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_calltoaction($atts) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $background_image = isset($atts['image']) ? $atts['image'] : '';
    $background_image_tablet = isset($atts['image_tablet']) ? $atts['image_tablet'] : '';
    $background_image_mobile = isset($atts['image_mobile']) ? $atts['image_mobile'] : '';
    $button_text = isset($atts['button_text']) ? $atts['button_text'] : '';
    $button_url = isset($atts['button_url']) ? $atts['button_url'] : '';
    $button_hover_font_color = isset($atts['button_hover_font_color']) ? $atts['button_hover_font_color'] : '';
    $button_hover_background_color = isset($atts['button_hover_background_color']) ? $atts['button_hover_background_color'] : '';
    $element_id = 'efcb-calltoaction-' . rand(100, 1000);

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'title' => array(
            'color' => 'title_color',
            'font-size' => 'title_font_size'
        ),
        'subtitle' => array(
            'color' => 'subtitle_color',
            'font-size' => 'subtitle_font_size'
        ),
        'button' => array(
            'color' => 'button_font_color',
            'background-color' => 'button_background_color',
            'border-color' => 'button_background_color',
            'font-size' => 'button_font_size'
        ),
        'content_element' => array(
            'text-align' => 'text_alignment'
        ),
    );
    echo apply_filters('efcb_shortcode_render', '', 'efcb_calltoaction', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'button_text' => $button_text,
        'button_url' => $button_url,
        'element_id' => $element_id,
        'background_image' => $background_image,
        'background_image_tablet' => $background_image_tablet,
        'background_image_mobile' => $background_image_mobile,
        'button_hover_font_color' => $button_hover_font_color,
        'button_hover_background_color' => $button_hover_background_color,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-calltoaction', 'efcb_calltoaction');
