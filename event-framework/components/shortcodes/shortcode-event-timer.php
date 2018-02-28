<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_event_timer($atts, $content) {
    $ef_options = EF_Event_Options::get_theme_options();
    $datetime   = isset($atts['datetime']) ? $atts['datetime'] : '';
    $background_color_left       = isset($atts['background_color_left']) ? $atts['background_color_left'] : '';
    $background_color_right       = isset($atts['background_color_right']) ? $atts['background_color_right'] : '';

    $style_items = array(
        'section' => array(
            'color'            => 'text_font_color',
            'margin-top'       => 'margin_top',
            'margin-bottom'    => 'margin_bottom',
        ),
        'days'  => array(
            'background-color' => 'background_color_days'
        ),
        'hours'  => array(
            'background-color' => 'background_color_hours'
        ),
        'minutes'  => array(
            'background-color' => 'background_color_minutes'
        ),
        'seconds'  => array(
            'background-color' => 'background_color_seconds'
        ),
        'label' => array(
            'font-size' => 'label_font_size'
        ),
        'text' => array(
            'font-size' => 'text_font_size'
        )
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_event_timer', array(
        'background_color_left' => $background_color_left,
        'background_color_right' => $background_color_right,
        'date'   => $datetime,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-timer', 'efcb_event_timer');
