<?php
define('THEME_DOMAIN', 'fudge');

require_once 'event-framework/event-framework.php';

add_action('init', array('Fudge_Theme_Functions', 'init'), 15);

class Fudge_Theme_Functions {

    public $ef_options;

    const LINKS_OPTION_NAME = 'fudge_pages_links';

    public function __construct() {
        $this->ef_options = EF_Event_Options::get_theme_options();
        // ******************* Scripts and Styles ****************** //
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_ajax_dynamic-css', array($this, 'dynamic_css'));
        add_action('wp_ajax_nopriv_dynamic-css', array($this, 'dynamic_css'));
        add_action('wp_footer', array($this, 'wp_footer'), 100);
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));


        add_filter('ef_theme_options_logo', array($this, 'set_theme_options_logo'));
        add_filter('wp_edit_nav_menu_walker', array($this, 'custom_nav_edit_walker'), 10, 2);
        add_action('save_post', array($this, 'check_shortcodes_on_save'));
        add_action('fudge_after_body', array($this, 'print_facebook_script'));

        // AJAX calls
        add_action('wp_ajax_fudge_load_speakers', array($this, 'fudge_load_speakers'));
        add_action('wp_ajax_nopriv_fudge_load_speakers', array($this, 'fudge_load_speakers'));
        add_action('wp_ajax_fudge_load_pois', array($this, 'fudge_load_pois'));
        add_action('wp_ajax_nopriv_fudge_load_pois', array($this, 'fudge_load_pois'));
        add_action('wp_ajax_fudge_load_news', array($this, 'fudge_load_news'));
        add_action('wp_ajax_nopriv_fudge_load_news', array($this, 'fudge_load_news'));
        add_action('wp_ajax_fudge_load_tweets', array($this, 'fudge_load_tweets'));
        add_action('wp_ajax_nopriv_fudge_load_tweets', array($this, 'fudge_load_tweets'));
        add_action('wp_ajax_fudge_load_media', array($this, 'fudge_load_media'));
        add_action('wp_ajax_nopriv_fudge_load_media', array($this, 'fudge_load_media'));
        add_action('wp_ajax_nopriv_get_schedule', array('EF_Session_Helper', 'ef_ajax_get_schedule'));
        add_action('wp_ajax_get_schedule', array('EF_Session_Helper', 'ef_ajax_get_schedule'));
        add_action('wp_ajax_nopriv_get_video_thumbnail', array($this, 'ajax_get_video_thumbnail'));
        add_action('wp_ajax_get_video_thumbnail', array($this, 'ajax_get_video_thumbnail'));
        add_action('wp_ajax_nopriv_fudge_load_exhibitors', array($this, 'fudge_load_exhibitors'));
        add_action('wp_ajax_fudge_load_exhibitors', array($this, 'fudge_load_exhibitors'));
        add_action('wp_ajax_nopriv_ef-cb-get-facebook-info', array($this, 'fudge_get_facebook_info'));
        add_action('wp_ajax_ef-cb-get-facebook-info', array($this, 'fudge_get_facebook_info'));
        add_action('wp_ajax_nopriv_ef-cb-get-eventbrite-info', array($this, 'fudge_get_eventbrite_info'));
        add_action('wp_ajax_ef-cb-get-eventbrite-info', array($this, 'fudge_get_eventbrite_info'));
        // next/prev posts links
        add_filter('next_posts_link_attributes', array($this, 'posts_nav_classes'));
        add_filter('previous_posts_link_attributes', array($this, 'posts_nav_classes'));

        // number of posts displayed
        add_action('pre_get_posts', array($this, 'posts_per_page'));

        //social
        $this->setup_social_networks();
        // ical link
        $this->ical_link();
    }

    public static function init() {
        return new Fudge_Theme_Functions();
    }

    public function enqueue_scripts() {
        global $post;

        $google_maps_key = '';
        if (!empty($this->ef_options['efcb_googlemaps_key'])) {
            $google_maps_key = $this->ef_options['efcb_googlemaps_key'];
        }
        // General CSS Files
        wp_enqueue_style('fudge-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0');
        wp_enqueue_style('fudge-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), '3.3.1');
        wp_enqueue_style('fudge-select', get_template_directory_uri() . '/assets/css/select.css');
        wp_enqueue_style('fudge-font-Roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,400italic,500,700,700italic');
        wp_enqueue_style('fudge-style-main', get_template_directory_uri() . '/assets/css/main.css');

        if ($post) {
            $customCss = get_post_meta($post->ID, 'ef-cb-custom-css', true);
            if (!empty($customCss)) {
                wp_add_inline_style('fudge-style-main', $customCss);
            }
        }
        // Specific CSS
        wp_enqueue_style('fudge-speaker-profile', get_template_directory_uri() . '/assets/css/speaker-profile.css');
        wp_enqueue_style('fudge-speakers', get_template_directory_uri() . '/assets/css/speakers.css');
        wp_enqueue_style('fudge-session', get_template_directory_uri() . '/assets/css/session.css');
        wp_enqueue_style('fudge-sponsors-description', get_template_directory_uri() . '/assets/css/sponsors-description.css');
        if (!empty($this->ef_options['ef_font'])) {
            wp_enqueue_style('fudge-font-custom', 'https://fonts.googleapis.com/css?family=' . $this->ef_options['ef_font']);
        }
        wp_enqueue_style('fudge-dynamic-css', admin_url('admin-ajax.php') . '?action=dynamic-css');
        wp_enqueue_style('fudge-style', get_stylesheet_directory_uri() . '/style.css');

        // JS Files
        wp_register_script('fudge-countdown', get_template_directory_uri() . '/assets/js/jquery.count-down.js', array('jquery'), false, true);
        wp_register_script('fudge-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '2.2.2', true);
        wp_register_script('fudge-google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&callback=initMap&key=' . $google_maps_key, array(), false, true);
        wp_register_script('fudge-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array('jquery'), '3.6.6', true);
        wp_register_script('fudge-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), '3.3.1', true);
        wp_register_script('fudge-select', get_template_directory_uri() . '/assets/js/jquery.select.js', array('jquery'), false, true);
        wp_register_script('fudge-youtubebackground', get_template_directory_uri() . '/assets/js/jquery.youtubebackground.js', array('jquery'), false, true);
        wp_register_script('fudge-jquery-main', get_template_directory_uri() . '/assets/js/jquery.main.js', array('jquery', 'fudge-countdown', 'fudge-isotope', 'fudge-google-maps', 'fudge-nicescroll', 'fudge-swiper', 'fudge-select', 'fudge-youtubebackground'), false, true);
        wp_register_script('fudge-jquery-map', get_template_directory_uri() . '/assets/js/jquery.map.js', array('jquery'), false, true);

        //recaptcha
        wp_enqueue_script('fudge-recaptcha', 'https://www.google.com/recaptcha/api.js', false, false, false);

        // specific JS Files
        if (is_singular('speaker')) {
            wp_enqueue_script('fudge-device', get_template_directory_uri() . '/assets/js/device.js', array(), false, true);
        }

        wp_localize_script('fudge-jquery-main', 'fudgeJS', array('ajax_url' => admin_url('admin-ajax.php')));

        wp_enqueue_script('fudge-jquery-map');
        wp_enqueue_script('fudge-jquery-main');
        wp_enqueue_script('fudge-woocommerce', get_template_directory_uri() . '/assets/js/woocommerce.js', array('jquery'), false, true);
    }

    function dynamic_css() {
        require(get_template_directory() . '/assets/css/dynamic.css.php');
        die;
    }

    public function set_theme_options_logo() {
        return get_template_directory_uri() . '/assets/img/logo.png';
    }

    public static function custom_nav_edit_walker($walker, $menu_id) {
        return 'Walker_Nav_Menu_Edit_Custom';
    }

    public static function after_setup_theme() {

        // ******************* Localizations ****************** //
        load_theme_textdomain('fudge', get_template_directory() . '/languages/');

        // ******************* Add Custom Menus ****************** //
        add_theme_support('menus');

        // ******************* Add Post Thumbnails ****************** //
        add_theme_support('post-thumbnails');
        add_image_size('fudge-speaker', 520, 324, true);
        add_image_size('fudge-sponsor', 392, 178, true);
        add_image_size('fudge-news', 520, 220, true); // double size for retina displays
//
        add_image_size('custom-image-large', 900, 720, true);
//        add_image_size('custom-image-medium', 540, 540, true);
//        add_image_size('custom-image-small', 360, 360, true);
        // ******************* Add Navigation Menu ****************** //
        register_nav_menus(
                array(
                    'primary' => __('Navigation Menu', 'fudge'),
                    'footer1' => __('Footer Menu 1', 'fudge'),
                    'footer2' => __('Footer Menu 2', 'fudge'),
                    'footer3' => __('Footer Menu 3', 'fudge')
                )
        );
    }

    public static function get_calendar_link($args, $type = 'google') {
        $time        = strtotime($args['date']);
        $time2       = strtotime($args['date'] . ' + 1 hour');
        $description = __('For details go to ');
        $description .= (!empty($args['view_url'])) ? $args['view_url'] : home_url();
        if ($type == 'google') {
            $baselink = 'https://www.google.com/calendar/render?action=TEMPLATE';
            $baselink = add_query_arg(
                    array(
                'text'        => $args['title'],
                'dates'       => date('Ymd\THis\Z', $time) . '/' . date('Ymd\THis\Z', $time2),
                'location'    => $args['location'],
                'description' => $description,
                'sf'          => 'true',
                'output'      => 'xml'
                    ), $baselink
            );
        } elseif ($type == 'ics') {
            $baselink = home_url();
            $baselink = add_query_arg(
                    array(
                'title'        => $args['title'],
                'date'         => $args['date'],
                'location'     => $args['location'],
                'description'  => $description,
                'view_url'     => $args['view_url'],
                'download_ics' => 1
                    ), $baselink
            );
        } else {
            $baselink = '';
        }
        return $baselink;
    }

    public function ical_link() {
        if (!isset($_GET['download_ics'])) {
            return;
        }
        $args        = $_GET;
        $time        = strtotime($args['date']);
        $time2       = strtotime($args['date'] . ' + 1 hour');
        $description = $args['description'];
        $event       = new ICS($time, $time2, $args['title'], $description, $args['location']);
        $event->show();
        die();
    }

    public function check_shortcodes_on_save($id) {
        $post    = get_post($id);
        $content = ( $post instanceof WP_Post ) ? $post->post_content : "";
        $link    = get_permalink($id);

        $section = 'efcb-section-';

        $pages_links = get_option(Fudge_Theme_Functions::LINKS_OPTION_NAME);
        if (empty($pages_links)) {
            $pages_links = array(
                'speakers'  => '',
                'news'      => '',
                'schedule'  => '',
                'instagram' => '',
                'twitter'   => ''
            );
        }

        if (has_shortcode($content, $section . 'fullspeakers')):
            $pages_links['speakers'] = $link;
        endif;
        if (has_shortcode($content, $section . 'fullnews')):
            $pages_links['news'] = $link;
        endif;
        if (has_shortcode($content, $section . 'fullschedule')):
            $pages_links['schedule'] = $link;
        endif;
        if (has_shortcode($content, $section . 'instagram')):
            $pages_links['instagram'] = $link;
        endif;
        if (has_shortcode($content, $section . 'twitter')):
            $pages_links['twitter'] = $link;
        endif;

        update_option(Fudge_Theme_Functions::LINKS_OPTION_NAME, $pages_links);
    }

    public function fudge_load_speakers() {
        $loaded_items       = $_REQUEST['loadedItems'];
        $loaded_count       = $_REQUEST['loadedCount'];
        $posts_per_page     = 4;
        $content_query_args = array(
            'post_type'      => 'speaker',
            'posts_per_page' => 4,
            'post__not_in'   => explode(',', $loaded_items)
        );
        $content_query      = new WP_Query($content_query_args);
        $response           = array(
            'has_items' => max($content_query->found_posts - $posts_per_page, 0),
            'items'     => array()
        );
        if ($content_query->have_posts()) : while ($content_query->have_posts()) : $content_query->the_post();
                global $post;
                $thumbnail           = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fudge-speaker');
                $permalink           = get_permalink($post->ID);
                $speaker_title       = get_the_title($post->ID);
                $speaker_function    = get_post_meta($post->ID, 'speaker_function', true);
                $speaker_keynote     = get_post_meta($post->ID, 'speaker_keynote', true);
                $response['items'][] = array(
                    'id'       => $post->ID,
                    'picture'  => !empty($thumbnail[0]) ? $thumbnail[0] : '',
                    'name'     => $speaker_title,
                    'post'     => $speaker_function,
                    'href'     => $permalink,
                    'favorite' => !empty($speaker_keynote) ? 'speakers-favorite' : ''
                );
            endwhile;
        endif;
        echo json_encode($response);
        die();
    }

    public function fudge_load_pois() {
        $loaded_items = $_REQUEST['loadedItems'];
        $pois_arr     = array('locations' => array());
        $pois_db      = get_posts(
                array(
                    'post_type'        => 'poi',
                    'posts_per_page'   => -1,
                    'suppress_filters' => false,
                    'post__not_in'     => explode(',', $loaded_items),
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
        $i            = 0;
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

        echo json_encode($pois_arr);
        die();
    }

    public function fudge_load_news() {
        $ids            = $_REQUEST['ids'];
        $news           = explode(',', $ids);
        $posts_per_page = apply_filters('fudge_news_count', 4);
        $show_load      = false;
        $remaining      = '';
        if (is_array($news) && count($news) > $posts_per_page) {
            $remaining = array_slice($news, $posts_per_page);
            $remaining = implode(',', $remaining);
            $news      = array_slice($news, 0, $posts_per_page);
            $show_load = true;
        }
        $response = array(
            'has_items' => ($show_load) ? 1 : 0,
            'items'     => array(),
            'remaining' => $remaining
        );
        foreach ($news as $news_item) {
            $thumbnail           = wp_get_attachment_image_src(get_post_thumbnail_id($news_item), 'fudge-news');
            $permalink           = get_permalink($news_item);
            $title               = get_the_title($news_item);
            $response['items'][] = array(
                'id'      => $news_item,
                'title'   => $title,
                'picture' => !empty($thumbnail[0]) ? $thumbnail[0] : '',
                'date'    => get_the_date('', $news_item),
                'href'    => $permalink,
            );
        }
        echo json_encode($response);
        die();
    }

    public function wp_footer() {
        global $fudge_footer_scripts;

        if (isset($fudge_footer_scripts)) {
            echo '<style type="text/css">';
            foreach ($fudge_footer_scripts as $script) {
                echo $script;
            }
            echo '</style>';
        }
    }

    public function admin_enqueue_scripts($hook) {
        global $post_type;

        if (in_array($hook, array('post.php', 'post-new.php'))) {
            if ($post_type == 'session') {
                wp_enqueue_script('jquery-ui-datepicker');
                wp_enqueue_style('jquery-ui-datepicker', get_template_directory_uri() . '/assets/css/jquery-ui-smoothness/jquery-ui-1.10.3.custom.min.css');
                wp_enqueue_script('jquery-ui-sortable');
                wp_enqueue_style('fudge-admin-sortable', get_template_directory_uri() . '/assets/css/sortable.css');
            }
            if ($post_type == 'poi') {
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('wp-color-picker');
            }
        }
    }

    public function setup_social_networks() {
        global $twitter, $facebook, $eventbrite;
        $ef_options = $this->ef_options;

        if (!empty($ef_options['efcb_facebook_rsvp_app_id']) && !empty($ef_options['efcb_facebook_rsvp_secret'])) {
            $facebook = new Facebook(array(
                'appId'                 => $ef_options['efcb_facebook_rsvp_app_id'],
                'secret'                => $ef_options['efcb_facebook_rsvp_secret'],
                'default_graph_version' => 'v2.5'
            ));
        }
        if (!empty($ef_options['efcb_twitter_access_token']) && !empty($ef_options['efcb_twitter_access_token_secret']) && !empty($ef_options['efcb_twitter_consumer_key']) && !empty($ef_options['efcb_twitter_consumer_secret'])) {
            $twitter = new TwitterAPIExchange(array(
                'oauth_access_token'        => $ef_options['efcb_twitter_access_token'],
                'oauth_access_token_secret' => $ef_options['efcb_twitter_access_token_secret'],
                'consumer_key'              => $ef_options['efcb_twitter_consumer_key'],
                'consumer_secret'           => $ef_options['efcb_twitter_consumer_secret']
            ));
        }
        if (!empty($ef_options['efcb_eventbrite_client_secret']) && !empty($ef_options['efcb_eventbrite_client_id']) && !empty($ef_options['efcb_eventbrite_oauth_token'])) {
            $eventbrite = new EventBriteConnector($ef_options['efcb_eventbrite_client_secret'], $ef_options['efcb_eventbrite_client_id'], $ef_options['efcb_eventbrite_oauth_token']);
        }
    }

    public static function parse_tweet_text($text) {
        $text = preg_replace('/(https?:\/\/[^\s"<>]+)/', '<a href="$1">$1</a>', $text);
        $text = preg_replace('/(^|[\n\s])@([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/$2">@$2</a>', $text);
        $text = preg_replace('/(^|[\n\s])#([^\s"\t\n\r<:]*)/is', '$1<a href="http://twitter.com/search?q=%23$2">#$2</a>', $text);
        return $text;
    }

    public function fudge_load_tweets() {
        global $twitter;
        if (isset($twitter) && !empty($_REQUEST['next_url'])) {
            $url           = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield      = $_POST['next_url'];
            $requestMethod = 'GET';
            $store         = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();
            $tweets        = json_decode($store);
            $result        = array(
                'has_items' => (!empty($tweets->search_metadata->next_results)) ? 1 : 0,
                'items'     => array(),
                'next_url'  => ''
            );
            if (property_exists($tweets, 'statuses')) {
                foreach ($tweets->statuses as $tweet) {
                    $result['items'][] = array(
                        'id'       => '',
                        'name'     => $tweet->user->name,
                        'login'    => '@' . $tweet->user->screen_name,
                        'feed_txt' => Fudge_Theme_Functions::parse_tweet_text($tweet->text),
                        'href'     => 'https://twitter.com/' . $tweet->user->screen_name . '/status/' . $tweet->id_str
                    );
                }
                $result['next_url'] = $tweets->search_metadata->next_results;
            }
            echo json_encode($result);
        }
        die();
    }

    public function fudge_load_media() {
        $ids         = $_REQUEST['ids'];
        $medias      = explode(',', $ids);
        $i           = 0;
        $show_load   = false;
        $remaining   = '';
        $display_num = apply_filters('fudge_media_count', 9);
        if (is_array($medias) && count($medias) > $display_num) {
            $remaining = array_slice($medias, $display_num);
            $remaining = implode(',', $remaining);
            $medias    = array_slice($medias, 0, $display_num);
            $show_load = true;
        }
        $response = array(
            'has_items' => ($show_load) ? 1 : 0,
            'items'     => array(),
            'remaining' => $remaining
        );
        foreach ($medias as $media) {
            if (intval($media) !== 0) {
                $thumbnail                     = wp_get_attachment_image_src($media, 'large');
                $thumbnail                     = $thumbnail[0];
                $large_image                   = wp_get_attachment_image_src($media, 'custom-image-large');
                $large_image                   = $large_image[0];
                $title                         = get_the_title($media);
                $response['items'][$i]['href'] = $large_image;
            } else {
                $thumbnail                      = EF_Framework_Helper::get_video_thumbnail($media, array('youtube' => 'hqdefault', 'vimeo' => 'thumbnail_large'));
                $embed_code                     = wp_oembed_get($media);
                preg_match('/src="([^"]+)"/', $embed_code, $match);
                $large_image                    = $match[1];
                $title                          = '';
                $response['items'][$i]['video'] = $large_image;
            }
            $response['items'][$i]['title'] = $title;
            $response['items'][$i]['dummy'] = $thumbnail;
            $i++;
        }
        echo json_encode($response);

        die();
    }

    public function print_facebook_script() {
        if (!empty($this->ef_options['efcb_facebook_app_id'])) {
            ?>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=<?php echo $this->ef_options['efcb_facebook_app_id']; ?>";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <?php
        }
    }

    public function ajax_get_video_thumbnail() {
        $ret = '';
        $url = filter_input(INPUT_POST, 'url');
        if (!empty($url)) {
            $ret = EF_Framework_Helper::get_video_thumbnail($url, array('youtube' => 'default', 'vimeo' => 'thumbnail_small'));
        }

        echo json_encode($ret);
        die;
    }

    public function fudge_load_exhibitors() {
        $category  = $_REQUEST['cat'];
        $search    = $_REQUEST['search'];
        $tax_query = array(
            'relation' => 'AND',
        );
        if ((int) $category !== 0) {
            $tax_query[] = array(
                'taxonomy' => 'exhibitor-category',
                'field'    => 'term_id',
                'terms'    => $category,
            );
        }
        $exhibitors = get_posts(array(
            'post_type'      => 'exhibitor',
            'posts_per_page' => -1,
            'tax_query'      => $tax_query,
            's'              => $search
        ));
        $return     = array(
            'items' => array()
        );
        foreach ($exhibitors as $exhibitor) {
            $logo = wp_get_attachment_image_src(get_post_thumbnail_id($exhibitor->ID), 'fudge-sponsor');
            if (!empty($logo[0])) {
                $logo = $logo[0];
            } else {
                $logo = '';
            }
            $return['items'][] = array(
                'url'   => get_permalink($exhibitor->ID),
                'title' => get_the_title($exhibitor->ID),
                'logo'  => $logo
            );
        }
        echo json_encode($return);
        die();
    }

    public function fudge_get_facebook_info() {
        global $facebook;
        $ef_options = EF_Event_Options::get_theme_options();

        $eventid = $ef_options['efcb_facebook_rsvp_event_id'];
        if (isset($facebook) && !empty($eventid)) {
            $event = $facebook->api("/$eventid?fields=name,place,start_time");
            if (isset($event)) {
                echo json_encode($event);
            }
        }

        die;
    }

    public function fudge_get_eventbrite_info() {
        global $eventbrite;
        $ef_options = EF_Event_Options::get_theme_options();
        $eventid    = $ef_options['efcb_eventbrite_event_id'];

        if (isset($eventbrite) && !empty($eventid)) {
            $event_obj                                             = $eventbrite->addEntity(new EventBriteEvent($eventid))->load();
            $event                                                 = $event_obj->getData();
            $venue_obj                                             = $eventbrite->addEntity(new EventBriteVenue($event[$ef_options['efcb_eventbrite_event_id']]->venue_id))->load();
            $venue                                                 = $venue_obj->getData();
            $event[$ef_options['efcb_eventbrite_event_id']]->venue = $venue[$event[$ef_options['efcb_eventbrite_event_id']]->venue_id];

            if (!empty($event)) {
                echo json_encode($event[$ef_options['efcb_eventbrite_event_id']]);
            }
        }

        die;
    }

    public function posts_nav_classes($attr) {
        $attr .= ' class="btn btn_posts_nav"';
        return $attr;
    }

    public static function ef_content_builder_sections($sections) {
        unset($sections['fullexhibitors']);
        unset($sections['schedule-slider']);
        unset($sections['sponsors']);
        unset($sections['facebook']);
        unset($sections['instagram']);
        unset($sections['fullnews']);
        unset($sections['picture-title']);
        unset($sections['speakers-slider']);
        unset($sections['twitter']);
        unset($sections['subscribe']);
        unset($sections['instagram-wrap']);
        array_values($sections);

        return $sections;
    }

    public function posts_per_page($query) {
        if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
            $archive_count = apply_filters('fudge_archive_per_page', 16);
            $query->set('posts_per_page', $archive_count);
        }
        if ($query->is_category() && $query->is_main_query() && !is_admin()) {
            $category_count = apply_filters('fudge_category_per_page', 16);
            $query->set('posts_per_page', $category_count);
        }
        if (is_home() && $query->is_main_query() && !is_admin()) {
            $index_count = apply_filters('fudge_index_per_page', 4);
            $query->set('posts_per_page', $index_count);
        }
    }

    public static function ef_post_type_label($label, $postType, $count) {
        $ef_options = EF_Event_Options::get_theme_options();
        $label_key  = "ef_{$postType}_label_";
        if ($count > 1) {
            $label_key .= 'plural';
        } else {
            $label_key .= 'singular';
        }
        return !empty($ef_options[$label_key]) ? $ef_options[$label_key] : $label;
    }

    public static function admin_post_thumbnail_html($content) {
        global $post_type;
        $size_text = '';

        switch ($post_type) {
            case 'speaker':
                $size_text = '260x162';
                break;
            case 'sponsor':
            case 'exhibitor' :
                $size_text = '392x178';
                break;
        }

        if (!empty($size_text)) {
            $content .= sprintf('<p>%s: %s</p>', __('Recommended size', 'fudge'), $size_text);
        }
        return $content;
    }

}

add_action('after_setup_theme', array('Fudge_Theme_Functions', 'after_setup_theme'));
add_filter('ef_content_builder_sections', array('Fudge_Theme_Functions', 'ef_content_builder_sections'));
add_filter('ef_post_type_label', array('Fudge_Theme_Functions', 'ef_post_type_label'), 10, 3);
//recommended image sizes
add_filter('admin_post_thumbnail_html', array('Fudge_Theme_Functions', 'admin_post_thumbnail_html'));

add_action('wp_update_nav_menu_item', 'fudge_custom_nav_update', 10, 3);

function fudge_custom_nav_update($menu_id, $menu_item_db_id, $args) {
    if (!isset($_REQUEST['fudge-menu-item-highlight']))
        $_REQUEST['fudge-menu-item-highlight']                   = array();
    if (!isset($_REQUEST['fudge-menu-item-highlight'][$menu_item_db_id]))
        $_REQUEST['fudge-menu-item-highlight'][$menu_item_db_id] = false;
    if (is_array($_REQUEST['fudge-menu-item-highlight'])) {
        $custom_value = $_REQUEST['fudge-menu-item-highlight'][$menu_item_db_id];
        update_post_meta($menu_item_db_id, '_fudge_menu_item_highlight', $custom_value);
    }
    if (isset($args['_fudge_menu_item_highlight'])) {
        update_post_meta($menu_item_db_id, '_fudge_menu_item_highlight', $args['_fudge_menu_item_highlight']);
    }
}

add_filter('wp_import_nav_menu_item_args', 'fudge_wp_import_nav_menu_item_args', 10, 2);

function fudge_wp_import_nav_menu_item_args($args, $metas) {
    if (!empty($metas)) {
        foreach ($metas as $meta) {
            if ($meta['key'] == '_fudge_menu_item_highlight') {
                $args['_fudge_menu_item_highlight'] = $meta['value'];
                break;
            }
        }
    }

    return $args;
}

add_filter('wp_setup_nav_menu_item', 'fudge_custom_nav_item');

function fudge_custom_nav_item($menu_item) {
    $menu_item->highlight = get_post_meta($menu_item->ID, '_fudge_menu_item_highlight', true);
    return $menu_item;
}

add_filter('nav_menu_link_attributes', 'fudge_nav_menu_css_class', 10, 2);

function fudge_nav_menu_css_class($args, $item) {
    if (isset($item->highlight) && $item->highlight == 1) {
        if (isset($args['class'])) {
            $args['class'] .= ' btn';
        } else {
            $args['class'] = 'btn';
        }
    }
    return $args;
}

class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu {

    /**
     * @see Walker_Nav_Menu::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function start_lvl(&$output, $depth = 0, $args = array()) {
        
    }

    /**
     * @see Walker_Nav_Menu::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     */
    function end_lvl(&$output, $depth = 0, $args = array()) {
        
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        ob_start();
        $item_id      = esc_attr($item->ID);
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
            '_wpnonce',
        );

        $original_title = '';
        if ('taxonomy' == $item->type) {
            $original_title = get_term_field('name', $item->object_id, $item->object, 'raw');
            if (is_wp_error($original_title))
                $original_title = false;
        } elseif ('post_type' == $item->type) {
            $original_object = get_post($item->object_id);
            $original_title  = get_the_title($original_object->ID);
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr($item->object),
            'menu-item-edit-' . ( ( isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if (!empty($item->_invalid)) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title     = sprintf(__('%s (Invalid)', 'fudge'), $item->title);
        } elseif (isset($item->post_status) && 'draft' == $item->post_status) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title     = sprintf(__('%s (Pending)', 'fudge'), $item->title);
        }

        $title = (!isset($item->label) || '' == $item->label ) ? $title : $item->label;

        $submenu_text = '';
        if (0 == $depth)
            $submenu_text = 'style="display: none;"';
        ?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                <span class="item-title"><span class="menu-item-title"><?php echo esc_html($title); ?></span> <span class="is-submenu" <?php echo $submenu_text; ?>><?php _e('sub item', 'fudge'); ?></span></span>
                <span class="item-controls">
                    <span class="item-type"><?php echo esc_html($item->type_label); ?></span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                        echo wp_nonce_url(
                                add_query_arg(
                                        array(
                            'action'    => 'move-up-menu-item',
                            'menu-item' => $item_id,
                                        ), remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ), 'move-menu_item'
                        );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'fudge'); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                        echo wp_nonce_url(
                                add_query_arg(
                                        array(
                            'action'    => 'move-down-menu-item',
                            'menu-item' => $item_id,
                                        ), remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ), 'move-menu_item'
                        );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'fudge'); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item', 'fudge'); ?>" href="<?php
                    echo ( isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item'] ) ? admin_url('nav-menus.php') : add_query_arg('edit-menu-item', $item_id, remove_query_arg($removed_args, admin_url('nav-menus.php#menu-item-settings-' . $item_id)));
                    ?>"><?php _e('Edit Menu Item', 'fudge'); ?></a>
                </span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
                <?php if ('custom' == $item->type) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                            <?php _e('URL', 'fudge'); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->url); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-thin">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                        <?php _e('Navigation Label', 'fudge'); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->title); ?>" />
                    </label>
                </p>
                <p class="description description-thin">
                    <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
                        <?php _e('Title Attribute', 'fudge'); ?><br />
                        <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->post_excerpt); ?>" />
                    </label>
                </p>
                <p class="description description-wide">
                    <label for="edit-menu-item-custom-<?php echo $item_id; ?>">
                        <?php _e('Highlight', 'fudge'); ?><br />
                        <input type="checkbox" id="edit-menu-item-highlight-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="fudge-menu-item-highlight[<?php echo $item_id; ?>]" value="1" <?php echo($item->highlight == 1 ? 'checked="checked"' : ''); ?>/>
                        <span class="description"><?php _e('Check to highlight in menu', 'fudge'); ?></span>
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked($item->target, '_blank'); ?> />
                        <?php _e('Open link in a new window/tab', 'fudge'); ?>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e('CSS Classes (optional)', 'fudge'); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr(implode(' ', $item->classes)); ?>" />
                    </label>
                </p>
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                        <?php _e('Link Relationship (XFN)', 'fudge'); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->xfn); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                        <?php _e('Description', 'fudge'); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html($item->description); // textarea_escaped                                                                                                                                        ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                    </label>
                </p>

                <p class="field-move hide-if-no-js description description-wide">
                    <label>
                        <span><?php _e('Move', 'fudge'); ?></span>
                        <a href="#" class="menus-move-up"><?php _e('Up one', 'fudge'); ?></a>
                        <a href="#" class="menus-move-down"><?php _e('Down one', 'fudge'); ?></a>
                        <a href="#" class="menus-move-left"></a>
                        <a href="#" class="menus-move-right"></a>
                        <a href="#" class="menus-move-top"><?php _e('To the top', 'fudge'); ?></a>
                    </label>
                </p>

                <div class="menu-item-actions description-wide submitbox">
                    <?php if ('custom' != $item->type && $original_title !== false) : ?>
                        <p class="link-to-original">
                            <?php printf(__('Original: %s', 'fudge'), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>'); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                    echo wp_nonce_url(
                            add_query_arg(
                                    array(
                        'action'    => 'delete-menu-item',
                        'menu-item' => $item_id,
                                    ), admin_url('nav-menus.php')
                            ), 'delete-menu_item_' . $item_id
                    );
                    ?>"><?php _e('Remove', 'fudge'); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url(add_query_arg(array('edit-menu-item' => $item_id, 'cancel' => time()), admin_url('nav-menus.php')));
                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel', 'fudge'); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object_id); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_item_parent); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_order); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->type); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
            <?php
            $output .= ob_get_clean();
        }

    }

    /**
     *
     * Woocommerce Integration
     *
     */
    add_action('after_setup_theme', 'fudge_woocommerce_setup_theme');

    function fudge_woocommerce_setup_theme() {
        add_theme_support('woocommerce');
    }

    add_action('wp_head', 'fudge_wp_head');

    function fudge_wp_head() {
        global $post;
        //if (isset($post) && isset($post->post_content) && in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && (has_shortcode($post->post_content, 'efcb-section-registration') || has_shortcode($post->post_content, 'efcb-section-samplepage'))) {
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
        add_action('woocommerce_before_shop_loop_item', 'fudge_woocommerce_before_shop_loop_item', 10);
        add_filter('woocommerce_locate_template', 'fudge_woocommerce_locate_template', 10, 3);
        //}
    }

    function fudge_woocommerce_before_shop_loop_item() {
        global $post;

        echo '<td class="title">';
        do_action('woocommerce_before_shop_loop_item_title');
        echo '<h3>' . get_the_title() . '</h3>';
        do_action('woocommerce_after_shop_loop_item_title');
        echo '</td>';
        echo '<td class="description">';
        echo '<span class="short-description">' . $post->post_excerpt . '</span>';
        echo '</td>';
        echo '<td class="price">';
        woocommerce_template_loop_price();
        echo '</td>';
        echo '<td class="quantity">';
        woocommerce_quantity_input();
        echo '<input type="hidden" name="product_id" value="' . $post->ID . '" />';
        echo '</td>';
    }

    function fudge_woocommerce_locate_template($template, $template_name, $template_path) {
        return $template;
    }

    /* ----------------------------- */

// shortcodes

    add_filter('efcb_shortcode_render', 'fudge_efcb_shortcode_render', 10, 3);

    function fudge_efcb_shortcode_render($content, $id_base, $args) {
        ob_start();
        include(locate_template("components/templates/shortcodes/$id_base.php"));
        return ob_get_clean();
    }

// generate ,ics files
    class ICS {

        var $data;
        var $name;

        function __construct($start, $end, $name, $description, $location) {
            $this->name = $name;
            $this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:" . date("Ymd\THis\Z", ($start)) . "\nDTEND:" . date("Ymd\THis\Z", ($end)) . "\nLOCATION:" . $location . "\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:" . date("Ymd\THis\Z") . "\nSUMMARY:" . $name . "\nDESCRIPTION:" . $description . "\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";
        }

        function show() {
            header("Content-type:text/calendar");
            header('Content-Disposition: attachment; filename="event.ics"');
            Header('Content-Length: ' . strlen($this->data));
            Header('Connection: close');
            echo $this->data;
        }

    }
    