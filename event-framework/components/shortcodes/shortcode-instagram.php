<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * efcb_instagram Shortcode function.
 *
 *
 * @package Event Framework
 * @since 1.0.0
 */
function efcb_instagram($atts, $content) {
    global $instagram;

    $title         = isset($atts['title']) ? $atts['title'] : '';
    $subtitle      = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $tag           = isset($atts['tag']) ? $atts['tag'] : '';
    $button_text   = isset($atts['button_text']) ? $atts['button_text'] : '';
    $pages_links   = get_option('pages_links');
    $button_url    = !empty($pages_links['instagram']) ? $pages_links['instagram'] : '';
    $photoscount   = isset($atts['pictures_count']) ? $atts['pictures_count'] : '';
    $element_class = 'efcb-samplepage-' . rand(100, 1000);

    $style_items = array(
        'section'  => array(
            'margin-top'       => 'margin_top',
            'margin-bottom'    => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'title'    => array(
            'color'     => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
        'subtitle' => array(
            'color'     => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size',
        ),
        'button'   => array(
            'color'      => 'button_color',
            'font-size'  => 'button_font_size',
            'background' => 'button_bg',
        ),
    );
    $add_styles  = array(
        'hover_background' => !empty($atts['button_bg_hover']) ? 'background:' . $atts['button_bg_hover'] . ';' : '',
    );
    if (!empty($instagram) && !empty($tag)) {
        $photos = $instagram->getTagMedia($tag, $photoscount, true);
    } else {
        $photos = array();
    }

    do_action('set_ajax_params', $tag, $photoscount);

    echo apply_filters('efcb_shortcode_render', '', 'efcb_instagram', array(
        'title'         => $title,
        'subtitle'      => $subtitle,
        'tag'           => $tag,
        'button_text'   => $button_text,
        'button_url'    => $button_url,
        'add_styles'    => $add_styles,
        'element_class' => $element_class,
        'styles'        => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'photos'        => $photos));
}

// Register Shortcode

add_shortcode('efcb-section-instagram', 'efcb_instagram');



