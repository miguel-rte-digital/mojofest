<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_news($atts, $content) {
    $title = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';
    $view_button_text = ( isset($atts['view_button_text']) && !empty($atts['view_button_text']) ) ? $atts['view_button_text'] : __('LOAD MORE', 'fudge');
    $view_all_button_text = ( isset($atts['view_all_button_text']) && !empty($atts['view_all_button_text']) ) ? $atts['view_all_button_text'] : __('View all', 'fudge');
    $view_all_button_url = ( isset($atts['view_all_button_url']) ) ? $atts['view_all_button_url'] : '';
    $category_ids = isset($atts['categories']) ? explode(',', $atts['categories']) : '';
    $entities = isset($atts['entities']) ? explode(',', $atts['entities']) : '';

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
        'news_title' => array(
            'color' => 'news_title_font_color',
            'font-size' => 'news_title_font_size',
        ),
        'news_subtitle' => array(
            'color' => 'news_subtitle_font_color',
            'font-size' => 'news_subtitle_font_size',
        ),
        'news_detail_button' => array(
            'color' => 'news_detail_button_font_color',
            'font-size' => 'news_detail_button_font_size',
        ),
    );
    $additional_styles = array(
        'search_form' => array(
            'color' => !empty($atts['search_form_font_color']) ? $atts['search_form_font_color'] : '',
        ),
    );

    if (is_category() || is_archive()) {
        global $wp_query;
        $news = $wp_query;
    } else {
        if (!empty($entities)) {
            $posts_per_page = apply_filters('fudge_news_count', 4);
            $paged = !empty($_REQUEST['paged']) ? absint($_REQUEST['paged']) : 1;
            $text = !empty($_REQUEST['text']) ? $_REQUEST['text'] : '';
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'orderby' => 'post__in',
                'post__in' => $entities,
                's' => $text
            );
            $entities = array_slice($entities, $posts_per_page);
            $news = new WP_Query($news_args);
        } else {
            $news = array();
        }
    }
    echo apply_filters('efcb_shortcode_render', '', 'efcb_news', array(
        'title' => $title,
        'subtitle' => $subtitle,
        'view_button_text' => $view_button_text,
        'news' => !empty($news) ? $news->posts : array(),
        'total' => !empty($news) ? $news->max_num_pages : 0,
        'paged' => !empty($news) ? $paged : 0,
        'remaining' => $entities,
        'view_all_button_text' => $view_all_button_text,
        'view_all_button_url' => $view_all_button_url,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'additional_styles' => $additional_styles
    ));
}

// Register Shortcode
add_shortcode('efcb-section-news', 'efcb_news');
