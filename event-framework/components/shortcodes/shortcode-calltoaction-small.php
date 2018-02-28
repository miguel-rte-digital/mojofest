<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_calltoaction_small($atts, $content) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = EF_Framework_Helper::get_text_between_two_tags($content, '[subtitle]', '[/subtitle]');
    $link_font_color = isset($atts['link_font_color']) ? $atts['link_font_color'] : '';
    $link_hover_font_color = isset($atts['link_hover_font_color']) ? $atts['link_hover_font_color'] : '';
    $element_id = 'efcb-calltoaction-small-' . rand(100, 1000);

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
            'text-align' => 'text_alignment'
        ),
        'title' => array(
            'color' => 'title_color',
            'font-size' => 'title_font_size'
        ),
        'subtitle' => array(
            'color' => 'subtitle_color',
            'font-size' => 'subtitle_font_size'
        ),
    );
    echo apply_filters('efcb_shortcode_render', '', 'efcb_calltoaction_small', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'element_id' => $element_id,
        'link_font_color' => $link_font_color,
        'link_hover_font_color' => $link_hover_font_color,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-calltoaction-small', 'efcb_calltoaction_small');
