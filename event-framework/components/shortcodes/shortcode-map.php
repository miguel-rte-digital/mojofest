<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * efcb_explore shortcode function.
 *
 *
 * @package Event Framework
 * @since 1.0.0
 */
function efcb_map($atts, $content) {

    $title    = isset($atts['title']) ? $atts['title'] : '';
    $subtitle = isset($atts['subtitle']) ? $atts['subtitle'] : '';


    $style_items = array(
        'section'  => array(
            'margin-top'    => 'margin_top',
            'margin-bottom' => 'margin_bottom',
        ),
        'title'    => array(
            'color'     => 'title_font_color',
            'font-size' => 'title_font_size',
        ),
        'subtitle' => array(
            'color'     => 'subtitle_font_color',
            'font-size' => 'subtitle_font_size',
        ),
        'popup'    => array(
            'background-color' => 'background_color',
        ),
    );

    $pois_arr = array('locations' => array());
    if (!empty($atts['entities'])) {
        $pois_slice = $atts['entities'];
        $pois_db    = get_posts(
                array(
                    'post_type'        => 'poi',
                    'posts_per_page'   => 3,
                    'suppress_filters' => false,
                    'post__in'         => explode(',', $pois_slice),
                    'order'            => 'menu_order',
                    'meta_query'       => array(
                        array(
                            'key'     => 'poi_address',
                            'compare' => 'EXISTS',
                        ),
                        array(
                            'key'     => 'poi_latitude',
                            'compare' => 'EXISTS',
                        ),
                        array(
                            'key'     => 'poi_longitude',
                            'compare' => 'EXISTS',
                        )
                    )
                )
        );
        $i          = 0;
        foreach ($pois_db as $poi_db) {
            $i++;
            $pois_arr['locations'][] = array(
                'id'          => $poi_db->ID,
                'color'       => $poi_db->poi_background_color,
                'coordinates' => array($poi_db->poi_latitude, $poi_db->poi_longitude),
                'description' => $poi_db->poi_address,
                'title'       => $poi_db->post_title,
                'icon'        => get_template_directory_uri() . '/assets/img/marker1.png'
            );
        }
    }

    echo apply_filters('efcb_shortcode_render', '', 'efcb_map', array(
        'title'     => $title,
        'subtitle'  => $subtitle,
        'styles'    => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'pois_data' => json_encode($pois_arr, JSON_HEX_APOS),
            )
    );
}

// Register Shortcode
add_shortcode('efcb-section-map', 'efcb_map');

