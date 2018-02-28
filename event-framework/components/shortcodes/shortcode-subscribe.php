<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_subscribe($atts, $content) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    if (empty($atts['size'])) {
        $atts['size'] = 'small';
    }

    if (isset($atts['size']) && strlen($atts['size'])) {
        switch ($atts['size']) {
            case 'large':
                $size = '2';
                break;
            case 'medium':
                $size = '3';
                break;
            case 'small':
                $size = '4';
                break;
        }
    }

    $style_items = array(
        'section' => array(
            'margin-top' => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
		'title' => array(
			'color'	=> 'title_font_color',
			'font-size'	=> 'title_font_size',
		),
		'subtitle' => array(
			'color'	=> 'subtitle_font_color',
			'font-size'	=> 'subtitle_font_size',
		),
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_subscribe', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'size' => $size));
}

// Register Shortcode
add_shortcode('efcb-section-subscribe', 'efcb_subscribe');

