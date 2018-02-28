<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_speakers($atts, $content) {

    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $viewtext = isset($atts['view_text']) ? $atts['view_text'] : '';
    $showpagination = isset($atts['show_pagination']) ? $atts['show_pagination'] : '';
    $entities = isset($atts['entities']) ? $atts['entities'] : '';

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
        'subtitle' => array(
            'color' => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size',
        ),
        'speaker_title' => array(
            'color' => 'speaker_title_font_color',
            'font-size' => 'speaker_title_font_size',
        ),
        'speaker_subtitle' => array(
            'color' => 'speaker_subtitle_font_color',
            'font-size' => 'speaker_subtitle_font_size',
        ),
        'speaker_detail_button' => array(
            'color' => 'speaker_detail_button_font_color',
            'font-size' => 'speaker_detail_button_font_size',
        ),
        'speaker_pagination_active' => array(
            'color' => 'speaker_pagination_active_font_color',
        ),
        'speaker_pagination_disabled' => array(
            'color' => 'speaker_pagination_disabled_font_color',
        ),
    );
    $paged = !empty($_REQUEST['paged']) ? absint($_REQUEST['paged']) : 1;
    if (!empty($entities)) {
        $speakers = new WP_Query(array(
            'post_type' => 'speaker',
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

    echo apply_filters('efcb_shortcode_render', '', 'efcb_speakers', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'view_text' => $viewtext,
        'show_pagination' => $showpagination,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'speakers' => $speakers->posts,
        'total' => $speakers->max_num_pages,
        'paged' => $paged
    ));
}

// Register Shortcode
add_shortcode('efcb-section-speakers', 'efcb_speakers');