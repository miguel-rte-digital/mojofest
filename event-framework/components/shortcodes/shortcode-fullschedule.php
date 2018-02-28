<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_fullschedule($atts, $content) {
    global $post;
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $element_id = 'efcb-fullschedule-' . rand(100, 1000).$post->ID;
    $background_color = isset($atts['background_color']) ? $atts['background_color'] : '';
    $title_font_color = isset($atts['title_font_color']) ? $atts['title_font_color'] : '';
    $day_bar_background_color = isset($atts['day_bar_background_color']) ? $atts['day_bar_background_color'] : '';
    $session_title_font_color = isset($atts['session_title_font_color']) ? $atts['session_title_font_color'] : '';
    $session_time_font_color = isset($atts['session_time_font_color']) ? $atts['session_time_font_color'] : '';
    $session_location_font_color = isset($atts['session_location_font_color']) ? $atts['session_location_font_color'] : '';
    $session_button_font_color = isset($atts['session_button_font_color']) ? $atts['session_button_font_color'] : '';
    $session_button_background_color = isset($atts['session_button_background_color']) ? $atts['session_button_background_color'] : '';
    $session_title_font_size = isset($atts['session_title_font_size']) ? $atts['session_title_font_size'] : '';
    $session_time_font_size = isset($atts['session_time_font_size']) ? $atts['session_time_font_size'] : '';
    $session_location_font_size = isset($atts['session_location_font_size']) ? $atts['session_location_font_size'] : '';
    $session_button_font_size = isset($atts['session_button_font_size']) ? $atts['session_button_font_size'] : '';
    $hero_background_image = isset($atts['hero_background_image']) ? $atts['hero_background_image'] : '';

    $style_items = array(
        'section' => array(
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size'
        ),
        'subtitle' => array(
            'color' => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size'
        ),
        'session' => array(
            'background-color' => 'session_background_color',
        ),
        'day_bar' => array(
            'color' => 'day_bar_font_color',
            'font-size' => 'day_bar_font_size'
        ),
        'hero' => array(
            'background-color' => 'hero_background_color',
            'margin-top' => 'margin_top',
        ),
    );

    $dates = EF_Session_Helper::ef_get_session_dates();
    $tracks = get_terms('session-track');
    $locations = get_terms('session-location');

    echo apply_filters('efcb_shortcode_render', '', 'efcb_fullschedule', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'dates' => $dates,
        'element_id' => $element_id,
        'labels' => $tracks,
        'locations' => $locations,
        'day_bar_background_color' => $day_bar_background_color,
        'session_title_font_color' => $session_title_font_color,
        'session_time_font_color' => $session_time_font_color,
        'session_location_font_color' => $session_location_font_color,
        'session_button_font_color' => $session_button_font_color,
        'session_button_background_color' => $session_button_background_color,
        'session_title_font_size' => $session_title_font_size,
        'session_time_font_size' => $session_time_font_size,
        'session_location_font_size' => $session_location_font_size,
        'session_button_font_size' => $session_button_font_size,
        'background_color' => $background_color,
        'title_font_color' => $title_font_color,
        'hero_background_image' => $hero_background_image,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'atts' => $atts
    ));
}

function efcb_home_schedule_where($where) {
    return $where . ' AND menu_order > 0';
}

// Register Shortcode
add_shortcode('efcb-section-fullschedule', 'efcb_fullschedule');
