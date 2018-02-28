<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_exhibitors($atts, $content) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $entities = isset($atts['entities']) ? $atts['entities'] : '';
    $show_search = isset($atts['show_search']) ? $atts['show_search'] : '';
    $filter_background_color = isset($atts['filter_background_color']) ? $atts['filter_background_color'] : '';
    $filter_font_color = isset($atts['filter_font_color']) ? $atts['filter_font_color'] : '';
    $element_id = 'efcb-exhibitors-' . rand(100, 1000);

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
        'subtitle' => array(
            'color' => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size'
        )
    );

    if (!empty($entities)) {
        $exhibitors = get_posts(array(
            'post_type' => 'exhibitor',
            'posts_per_page' => -1,
            'orderby' => 'post__in',
            'post__in' => explode(',', $entities),
            'order' => 'ASC'
        ));
    } else {
        $exhibitors = array();
    }

    echo apply_filters('efcb_shortcode_render', '', 'efcb_exhibitors', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'exhibitors' => $exhibitors,
        'element_id' => $element_id,
        'filter_background_color' => $filter_background_color,
        'filter_font_color' => $filter_font_color,
        'show_search' => $show_search,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
    ));
}

// Register Shortcode
add_shortcode('efcb-section-exhibitors', 'efcb_exhibitors');

