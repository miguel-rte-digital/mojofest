<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_followus($atts) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $hashtag = isset($atts['hashtag']) ? $atts['hashtag'] : '';
    $facebook = isset($atts['facebook']) ? $atts['facebook'] : '';
    $style_items = array(
        'section' => array(
            'background-color' => 'background_color',
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
        'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
    );
    echo apply_filters('efcb_shortcode_render', '', 'efcb_followus', array(
        'title' => $title,
        'hashtag' => $hashtag,
        'facebook' => $facebook,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-followus', 'efcb_followus');