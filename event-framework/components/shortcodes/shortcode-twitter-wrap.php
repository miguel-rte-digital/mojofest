<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

function efcb_twitter_wrap($atts, $content) {
    global $twitter;
    $tweets = array();

    $hashtag = isset($atts['hashtag']) ? $atts['hashtag'] : '';
    $tweetscount = !empty($atts['tweets_count']) ? $atts['tweets_count'] : 4;
    $tweets_link_color = !empty($atts['tweet_link_font_color']) ? $atts['tweet_link_font_color'] : '';
    $element_id = 'efcb-twitter-' . rand(100, 1000);

    if (empty($atts['size'])) {
        $atts['size'] = 'small';
    }

    if (isset($twitter) && !empty($hashtag)) {
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = "?q=#$hashtag&result_type=mixed&count=" . $tweetscount;
        $requestMethod = 'GET';
        $store = $twitter->setGetfield($getfield)
            ->buildOauth($url, $requestMethod)
            ->performRequest();
        $tweets        = json_decode($store);
    }

    $style_items = array(
        'section'    => array(
            'background-color' => 'background_color',
            'margin-top'       => 'margin_top',
            'margin-bottom'    => 'margin_bottom',
        ),
        'tweet'      => array(
            'background-color' => 'tweet_background_color',
        ),
        'tweet_text' => array(
            'color' => 'tweet_text_font_color',
        ),
        'tweet_name' => array(
            'color' => 'tweet_name_font_color',
        )
    );

    echo apply_filters('efcb_shortcode_render', '', 'efcb_twitter_wrap', array(
        'tweets' => $tweets,
        'hashtag' => $hashtag,
        'tweets_link_color' => $tweets_link_color,
        'element_id' => $element_id,
        'styles' => EF_Framework_Helper::get_styles_from_shortcode_attributes($style_items, $atts))
    );
}

// Register Shortcode
add_shortcode('efcb-section-twitter-wrap', 'efcb_twitter_wrap');
