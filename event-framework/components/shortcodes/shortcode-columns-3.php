<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_columns_3($atts, $content) {
    $content1 = EF_Framework_Helper::get_text_between_two_tags($content, '[content1]', '[/content1]');
    $content2 = EF_Framework_Helper::get_text_between_two_tags($content, '[content2]', '[/content2]');
    $content3 = EF_Framework_Helper::get_text_between_two_tags($content, '[content3]', '[/content3]');

    $style_items = array(
        'section' => array(
            'text-align' => 'text_alignment',
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'text' => array(
            'color' => 'text_font_color',
            'font-size' => 'text_font_size',
            'text-align' => 'text_alignment',
        ),
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_columns_3', array(
        'content1' => $content1,
        'content2' => $content2,
        'content3' => $content3,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts)
    ));
}

// Register Shortcode
add_shortcode('efcb-section-columns-3', 'efcb_columns_3');

