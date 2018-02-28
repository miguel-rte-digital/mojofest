<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_event_description($atts, $content) {
    $content = EF_Framework_Helper::get_text_between_two_tags($content, '[content]', '[/content]');
    $title = isset($atts['title']) ? $atts['title'] : '';

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color'
        ),
        'content' => array(
            'color' => 'text_font_color',
            'text-align' => 'text_alignment',
        ),
        'title' => array(
            'color' => 'title_font_color'
        )
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_event_description', array(
        'content' => $content,
        'title' => $title,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-event-description', 'efcb_event_description');