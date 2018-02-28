<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the Facebook Rsvp shortcodes
 *
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * efcb_facebook_rsvp Facebook shortcodes.
 *
 *
 * @package Event Framework
 * @since 1.0.0
 */
function efcb_facebook_box($atts, $content) {
    global $facebook;

    $ef_options    = EF_Event_Options::get_theme_options();
    $eventid       = $ef_options['efcb_facebook_rsvp_event_id'];
    $preeventlink  = isset($atts['pre_event_link_text']) ? $atts['pre_event_link_text'] : '';
    $eventlink     = isset($atts['event_link']) ? $atts['event_link'] : '';
    $eventlinktext = isset($atts['event_link_text']) ? $atts['event_link_text'] : '';

    $style_items = array(
        'section'        => array(
            'margin-top'       => 'margin_top',
            'margin-bottom'    => 'margin_bottom',
            'background-color' => 'background_color',
        ),
        'icon'           => array(
            'color' => 'icon_font_color',
        ),
        'number'         => array(
            'color'     => 'number_font_color',
            'font-size' => 'number_font_size',
        ),
        'label'          => array(
            'color'     => 'label_font_color',
            'font-size' => 'label_font_size',
        ),
        'event_link'     => array(
            'color'     => 'event_link_font_color',
            'font-size' => 'event_link_font_size',
        ),
        'pre_event_link' => array(
            'font-size' => 'pre_event_link_font_size',
        ),
        'box'            => array(
            'background-color' => 'box_background_color',
        ),
    );

    $attendees = array(
        'interested' => 0,
        'going'      => 0,
        'photos'     => array()
    );
    //$event_name = '';

    if (isset($facebook) && !empty($eventid)) {
        try {
            $event = $facebook->api("/$eventid?fields=attending_count,interested_count,name,attending.limit(30){picture,link}");
            if (isset($event)) {
                $attendees['going']      = $event['attending_count'];
                $attendees['interested'] = $event['interested_count'];
                //$event_name              = $event['name'];
                if (isset($event['attending'])) {
                    foreach ($event['attending']['data'] as $attendee) {
                        if (isset($attendee['picture']) && isset($attendee['picture']['data'])) {
                            $attendees['attendees'][] = array(
                                'picture' => $attendee['picture']['data']['url'],
                                'link'    => $attendee['link']
                            );
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            error_log("[{$ex->getType()}]: {$ex->getMessage()}");
        }
    }

    echo apply_filters('efcb_shortcode_render', '', 'efcb_facebook_box', array(
        'pre_event_link'  => $preeventlink,
        'event_link'      => $eventlink,
        'event_link_text' => $eventlinktext,
        'styles'          => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts),
        'attendees'       => $attendees));
}

//Register Shortcode
add_shortcode('efcb-section-facebook-box', 'efcb_facebook_box');
