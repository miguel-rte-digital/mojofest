<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_conference($atts, $content) {
    $a = shortcode_atts( array(
        'layout' => 'default',
        'title' => '',
        'image' => '',
        'date' => '',
        'datetext' => '',
        'location' => '',
        'view_text' => '',
        'view_url' => '',
        'hide_register_button' => 0,
        'youtube_code' => '',
        'background_image_desktop' => '',
        'background_image_tablet' => '',
        'background_image_mobile' => '',
        'background_color' => '',
        'title_font_color' => '',
        'separator_color' => '',
        'date_location_color' => '',
        'register_button_background' => '',
        'register_button_color' => '',
        'title_font_size' => '',
        'date_location_font_size' => '',
        'register_button_font_size' => '',
        'margin_top' => '',
        'margin_bottom' => '',
        'calendar_text' => '',
        'hide_calendar' => '',
        'size' => 'small',
        'entities' => array()
    ), $atts );
    $a['element_id'] = 'efcb-conference-' . rand(100, 1000);
    $a['entities'] = !empty($a['entities']) ? explode(',', $a['entities']) : array();
    if (isset($a['size']) && strlen($a['size'])) {
        switch ($a['size']) {
            case 'large':
                $a['size'] = '2';
                break;
            case 'medium':
                $a['size'] = '3';
                break;
            case 'small':
                $a['size'] = '4';
                break;
        }
    }

    $style_items = array(
        'section' => array(
            'background-color' => 'background_color',
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
		'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size'
        ),
        'date_location' => array(
            'color' => 'date_location_color',
            'font-size' => 'date_location_font_size'
        ),
        'separator' => array(
            'background-color' => 'separator_color'
        ),
        'register_button' => array(
            'background-color' => 'register_button_background',
            'color' => 'register_button_color',
            'font-size' => 'register_button_font_size'
        )
    );
    $a['styles'] = EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $a);

    echo apply_filters('efcb_shortcode_render', '', 'efcb_conference', $a);
}

// Register Shortcode
add_shortcode('efcb-section-conference', 'efcb_conference');

