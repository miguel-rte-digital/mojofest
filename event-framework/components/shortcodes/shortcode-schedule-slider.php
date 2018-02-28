<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_schedule_slider($atts, $content) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $view_button_text = isset($atts['view_button_text']) ? $atts['view_button_text'] : '';
	$entities = isset($atts['entities']) ? $atts['entities'] : '';

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
        'day_bar' => array(
            'color' => 'day_bar_font_color',
            'background-color' => 'day_bar_background_color',
            'font-size' => 'day_bar_font_size'
        ),
        'session_time' => array(
            'color' => 'session_time_font_color',
            'font-size' => 'session_time_font_size'
        ),
        'session_location' => array(
            'color' => 'session_location_font_color',
            'font-size' => 'session_location_font_size'
        ),
        'session_button' => array(
            'color' => 'session_button_font_color',
            'font-size' => 'session_button_font_size'
        ),
    );
	$paged = !empty($_REQUEST['paged']) ? absint($_REQUEST['paged']) : 1;
    if (!empty($entities)) {
        $speakers = new WP_Query(array(
            'post_type' => 'session',
            'posts_per_page' => -1,
            'paged' => $paged,
            'orderby' => 'post__in',
            'post__in' => explode(',', $entities)
        ));
    } else {
		// Make sure it doesn't break if no speakers are defined;
        $speakers = new stdClass;
		$speakers->posts = '';
		$speakers->max_num_pages = '';
    }

    $dates = EF_Session_Helper::ef_get_session_dates();
    $tracks = get_terms('session-track');
    $locations = get_terms('session-location');

    echo apply_filters('efcb_shortcode_render', '', 'efcb_schedule_slider', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'view_button_text' => $view_button_text,
        'dates' => $dates,
        'tracks' => $tracks,
        'locations' => $locations,
		'sessions' => $speakers->posts,
        'total' => $speakers->max_num_pages,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'atts' => $atts
    ));
}

function efcb_home_schedule_slider_where($where) {
    return $where . ' AND menu_order > 0';
}

// Register Shortcode
add_shortcode('efcb-section-schedule-slider', 'efcb_schedule_slider');
