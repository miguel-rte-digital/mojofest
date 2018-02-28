<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;
function efcb_speakers_slider($atts, $content) {
    $title_biography = isset($atts['title_biography']) ? $atts['title_biography'] : '';
    $all_speakers_text = isset($atts['all_speakers_text']) ? $atts['all_speakers_text'] : '';
    $showpagination = absint(isset($atts['show_pagination']));
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
		'icon' => array(
			'color' => 'img_icon_font_color',
			'font-size' => 'img_icon_font_size',
		),
		'text' => array(
			'color' => 'text_font_color',
			'font-size' => 'text_font_size',
		),
		'arrows' => array(
			'color' => 'arrows_font_color',
			'font-size' => 'arrows_font_size',
		),
		'button' => array(
			'color' => 'button_font_color',
			'font-size' => 'button_font_size',
		),
		'button_backgrounds' => array(
			'background' => 'button_background_color',
			'background_hover' => 'button_hover_background_color',
		),
    );
    $paged = !empty($_REQUEST['paged']) ? absint($_REQUEST['paged']) : 1;
    if (!empty($entities)) {
        $speakers = new WP_Query(array(
            'post_type' => 'speaker',
            'posts_per_page' => $showpagination == 1 ? 6 : -1,
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
    echo apply_filters('efcb_shortcode_render', '', 'efcb_speakers_slider', array(
        'title_biography' => $title_biography,
        'all_speakers_text' => $all_speakers_text,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'speakers' => $speakers->posts,
        'total' => $speakers->max_num_pages,
        'paged' => $paged
    ));
}
// Register Shortcode
add_shortcode('efcb-section-speakers-slider', 'efcb_speakers_slider');