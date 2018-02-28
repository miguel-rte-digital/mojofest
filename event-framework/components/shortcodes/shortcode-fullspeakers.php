<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_fullspeakers($atts, $content) {

    $hero_title = isset($atts['hero_title']) ? $atts['hero_title'] : '';
    $hero_subtitle = isset($atts['hero_subtitle']) ? $atts['hero_subtitle'] : '';
    $hero_subtitle_mobile = isset($atts['hero_subtitle_mobile']) ? $atts['hero_subtitle_mobile'] : '';
    $hero_background_image = isset($atts['hero_background_image']) ? $atts['hero_background_image'] : '';
    $showpagination = absint(isset($atts['show_pagination']));
    $entities = isset($atts['entities']) ? $atts['entities'] : '';

    $style_items = array(
        'hero' => array(
           'background-color' => 'hero_background_color',
            'margin-top' => 'margin_top',

        ),
        'hero_title' => array(
            'color' => 'header_title_font_color',
            'font-size' => 'header_title_font_size',
        ),
        'hero_subtitle' => array(
           'color' => 'header_subtitle_font_color',
            'font-size' => 'header_subtitle_font_size',
        ),
        'section' => array(
            'margin-bottom' => 'margin_bottom',
            'background-color' => 'background_color',
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
            'posts_per_page' => $showpagination == 1 ? 8 : -1,
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

    echo apply_filters('efcb_shortcode_render', '', 'efcb_fullspeakers', array(
        'hero_title' => $hero_title,
        'hero_subtitle' => $hero_subtitle,
        'hero_subtitle_mobile' => $hero_subtitle_mobile,
        'hero_background_image' => $hero_background_image,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'speakers' => $speakers->posts,
        'total' => $speakers->max_num_pages,
        'paged' => $paged
    ));
}

// Register Shortcode
add_shortcode('efcb-section-fullspeakers', 'efcb_fullspeakers');
