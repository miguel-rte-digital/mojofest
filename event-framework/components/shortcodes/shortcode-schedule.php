<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_schedule($atts) {
    global $post;
    $title = isset($atts['title']) ? $atts['title'] : '';
    $viewbuttontext = isset($atts['button_text']) && !empty($atts['button_text']) ? $atts['button_text'] : __('VIEW ALL', 'fudge');
    $element_id = 'efcb-schedule-' . rand(100, 1000).$post->ID;
    $background_color = isset($atts['background_color']) ? $atts['background_color'] : '';
    $title_font_color = isset($atts['title_font_color']) ? $atts['title_font_color'] : '';
    $day_bar_background_color = isset($atts['day_bar_background_color']) ? $atts['day_bar_background_color'] : '';
    $session_title_font_color = isset($atts['session_title_font_color']) ? $atts['session_title_font_color'] : '';
    $session_text_font_color = isset($atts['session_text_font_color']) ? $atts['session_text_font_color'] : '';
    $session_time_font_color = isset($atts['session_time_font_color']) ? $atts['session_time_font_color'] : '';
    $session_location_font_color = isset($atts['session_location_font_color']) ? $atts['session_location_font_color'] : '';
    $session_button_font_color = isset($atts['session_button_font_color']) ? $atts['session_button_font_color'] : '';
    $session_button_background_color = isset($atts['session_button_background_color']) ? $atts['session_button_background_color'] : '';
    $session_title_font_size = isset($atts['session_title_font_size']) ? $atts['session_title_font_size'] : '';
    $session_text_font_size = isset($atts['session_text_font_size']) ? $atts['session_text_font_size'] : '';
    $session_time_font_size = isset($atts['session_time_font_size']) ? $atts['session_time_font_size'] : '';
    $session_location_font_size = isset($atts['session_location_font_size']) ? $atts['session_location_font_size'] : '';
    $session_button_font_size = isset($atts['session_button_font_size']) ? $atts['session_button_font_size'] : '';
    $speaker_name_font_color = isset($atts['speaker_name_font_color']) ? $atts['speaker_name_font_color'] : '';
    $speaker_name_font_size = isset($atts['speaker_name_font_size']) ? $atts['speaker_name_font_size'] : '';

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size'
        ),
        'session' => array(
            'background-color' => 'session_background_color',
        ),
        'day_bar' => array(
            'color' => 'day_bar_font_color',
            'font-size' => 'day_bar_font_size'
        ),
    );

    $dates = EF_Session_Helper::ef_get_session_dates();
    $tracks = get_terms('session-track');
    $locations = get_terms('session-location');

    echo apply_filters('efcb_shortcode_render', '', 'efcb_schedule', array(
        'title' => $title,
        'button_text' => $viewbuttontext,
        'dates' => $dates,
        'element_id' => $element_id,
        'labels' => $tracks,
        'locations' => $locations,
        'day_bar_background_color' => $day_bar_background_color,
        'session_title_font_color' => $session_title_font_color,
        'session_text_font_color' => $session_text_font_color,
        'session_time_font_color' => $session_time_font_color,
        'session_location_font_color' => $session_location_font_color,
        'session_button_font_color' => $session_button_font_color,
        'session_button_background_color' => $session_button_background_color,
        'session_title_font_size' => $session_title_font_size,
        'session_text_font_size' => $session_text_font_size,
        'session_time_font_size' => $session_time_font_size,
        'session_location_font_size' => $session_location_font_size,
        'session_button_font_size' => $session_button_font_size,
        'speaker_name_font_color' => $speaker_name_font_color,
        'speaker_name_font_size' => $speaker_name_font_size,
        'background_color' => $background_color,
        'title_font_color' => $title_font_color,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'atts' => $atts
    ));
}

// Register Shortcode
add_shortcode('efcb-section-schedule', 'efcb_schedule');
