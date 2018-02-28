<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_fullsponsors($atts, $content) {
    $element_id = 'efcb-fullsponsors-' . rand(100, 1000);
    $title = isset($atts['title']) ? $atts['title'] : '';
    $sponsors = isset($atts['entities']) ? explode(',', $atts['entities']) : array();
    $tier_class = isset($atts['tier_class']) && !empty($atts['tier_class']) ? $atts['tier_class'] : 'sponsors__item_bronze';
    $tier_line_color = isset($atts['tier_line_color']) ? $atts['tier_line_color'] : '';

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
        'tier' => array(
            'color' => 'tier_font_color',
            'font-size' => 'tier_font_size',
        ),
        'tier-background' => array(
            'background-color' => 'background_color'
        )
    );


    echo apply_filters('efcb_shortcode_render', '', 'efcb_fullsponsors', array(
        'title' => $title,
        'sponsors' => $sponsors,
        'tier_class' => $tier_class,
        'tier_line_color' => $tier_line_color,
        'element_id' => $element_id,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts)
    ));
}

// Register Shortcode
add_shortcode('efcb-section-fullsponsors', 'efcb_fullsponsors');
