<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_picture_title($atts) {
    $url_desktop = isset($atts['url_desktop']) ? $atts['url_desktop'] : '';
    $url_tablet  = isset($atts['url_tablet']) ? $atts['url_tablet'] : '';
    $url_mobile  = isset($atts['url_mobile']) ? $atts['url_mobile'] : '';
    $section_url = isset($atts['section_url']) ? $atts['section_url'] : '';
    $alt         = isset($atts['alt']) ? $atts['alt'] : '';
    $width       = isset($atts['width']) ? $atts['width'] : '';
    $height      = isset($atts['height']) ? $atts['height'] : '';
    $title       = isset($atts['title']) ? $atts['title'] : '';
    $sub_title   = isset($atts['subtitle']) ? $atts['subtitle'] : '';

    $style_items = array(
        'section' => array(
            'margin-top'    => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
        'arrow'   => array(
            'color'     => 'arrow_color',
            'font-size' => 'arrow_size',
        ),
    );
    echo apply_filters('efcb_shortcode_render', '', 'efcb_picture_title', array(
        'url_desktop' => $url_desktop,
        'url_tablet'  => $url_tablet,
        'url_mobile'  => $url_mobile,
        'section_url' => $section_url,
        'title'       => $title,
        'subtitle'    => $sub_title,
        'styles'      => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts)
    ));
}

// Register Shortcode
add_shortcode('efcb-section-picture-title', 'efcb_picture_title');

