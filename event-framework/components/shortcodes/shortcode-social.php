<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_social($atts, $content) {
    $ef_options        = EF_Event_Options::get_theme_options();
    $esc_url_protocols = array('http', 'https', 'feed');
	$title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $element_id        = 'efcb-social-' . rand(100, 1000);
    $entities          = isset($atts['entities']) ? $atts['entities'] : '';

    $style_items            = array(
        'section' => array(
            'margin-top'       => 'margin_top',
            'margin-bottom'    => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'icon'    => array(
            'background-color'     => 'icon_font_color',
            'font-size' => 'icon_font_size',
            'color' => 'icon_text_color'
        ),
		'title' => array(
            'color' => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
        'subtitle' => array(
            'color' => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size',
        ),
    );
    $additional_style_items = array(
        'icon' => array(
            'color' => !empty($atts['icon_hover_font_color']) ? $atts['icon_hover_font_color'] : ''
        )
    );
    echo apply_filters('efcb_shortcode_render', '', 'efcb_social', array(
        'ef_options'        => $ef_options,
		'title'				=> $title,
        'subtitle'			=> $subtitle,
        'items'             => !empty($entities) ? explode(',', $entities) : array(),
        'esc_url_protocols' => $esc_url_protocols,
        'styles'            => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'additional_styles' => $additional_style_items,
        'element_id'        => $element_id
    ));
}

// Register Shortcode
add_shortcode('efcb-section-social', 'efcb_social');
