<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_instagram_wrap($atts, $content) {
    global $instagram;

    $text                 = isset($atts['text']) ? $atts['text'] : '';
    $view_fullscreen_text = isset($atts['view_fullscreen_text']) ? $atts['view_fullscreen_text'] : '';
    $tag                  = isset($atts['tag']) ? $atts['tag'] : '';
    $photoscount          = isset($atts['pictures_count']) ? $atts['pictures_count'] : '';
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
    if (!empty($instagram) && !empty($tag)) {
        $photos = $instagram->getTagMedia($tag, $photoscount, true);
    } else {
        $photos = array();
    }

    do_action('set_ajax_params', $tag, $photoscount);

    $style_items = array(
        'section' => array(
            'background'    => 'section_background_color',
            'margin-top'    => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
        'title'   => array(
            'color'     => 'text_font_color',
            'font-size' => 'text_font_size',
        ),
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_instagram_wrap', array(
        'title'                => $text,
        'view_fullscreen_text' => $view_fullscreen_text,
        '_instagrams'          => $photos,
        'tag'                  => $tag,
        'styles'               => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'size'                 => $size));
}

// Register Shortcode
add_shortcode('efcb-section-instagram-wrap', 'efcb_instagram_wrap');
