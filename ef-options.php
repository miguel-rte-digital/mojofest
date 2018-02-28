<?php

global $ef_panel_manager;
$theme_options       = $ef_panel_manager->get_panel('theme_options');
$ef_options          = EF_Event_Options::get_theme_options();
$instagram_login_url = InstagramAPI::API_OAUTH_URL . '?client_id=' . (isset($ef_options['efcb_instagram_client_id']) ? $ef_options['efcb_instagram_client_id'] : '') . '&redirect_uri=' . admin_url('admin.php?page=ef-options') . '&scope=public_content&response_type=code';
/*
 * Generate Theme Options Tabs
 */

$tab_general_site_options = new EF_Options_Tab();
$tab_misc                 = new EF_Options_Tab();
$tab_social_connecting    = new EF_Options_Tab();
$tab_contacts             = new EF_Options_Tab();
$tab_api                  = new EF_Options_Tab();

/*
 * General Site Options Fields
 */
$header_logo            = new EF_Image_Field('ef_header_logo', __('Logo (Recommended size:145x45)', 'fudge'));
$header_mobile_logo     = new EF_Image_Field('ef_footer_logo', __('Logo Footer (Recommended size:145x45)', 'fudge'));
$font                   = new EF_Select_Field(
        'ef_font', __('General Font', 'fudge'), '', array('options' => array(
        ''                  => __('Default', 'fudge'),
        'Open Sans'         => __('Open Sans', 'fudge'),
        'Droid Sans'        => __('Droid Sans', 'fudge'),
        'PT Sans'           => __('PT Sans', 'fudge'),
        'Lato'              => __('Lato', 'fudge'),
        'Oswald'            => __('Oswald', 'fudge'),
        'Droid Serif'       => __('Droid Serif', 'fudge'),
        'Roboto'            => __('Roboto', 'fudge'),
        'Lora'              => __('Lora', 'fudge'),
        'Libre Baskerville' => __('Libre Baskerville', 'fudge'),
        'Josefin Slab'      => __('Josefin Slab', 'fudge'),
        'Arvo'              => __('Arvo', 'fudge'),
        'Ubuntu'            => __('Ubuntu', 'fudge'),
        'Raleway'           => __('Raleway', 'fudge'),
        'Source Sans Pro'   => __('Source Sans Pro', 'fudge'),
        'Lobster'           => __('Lobster', 'fudge'),
        'PT Serif'          => __('PT Serif', 'fudge'),
        'Old Standard TT'   => __('Old Standard TT', 'fudge'),
        'Volkorn'           => __('Volkorn', 'fudge'),
        'Gravitas One'      => __('Gravitas One', 'fudge'),
        'Merriweather'      => __('Merriweather', 'fudge'),
    ))
);
$primary_color          = new EF_Color_Field('ef_primary_color', __('Primary Color', 'fudge'), '', array('default' => ''));
$secondary_color        = new EF_Color_Field('ef_secondary_color', __('Secondary Color', 'fudge'), '', array('default' => ''));
$highlight_color        = new EF_Color_Field('ef_highlight_color', __('Hover Color', 'fudge'), '', array('default' => ''));
$speaker_label_singular = new EF_Text_Field('ef_speaker_label_singular', __('Singular Performer Label', 'fudge'));
$speaker_label_plural   = new EF_Text_Field('ef_speaker_label_plural', __('Plural Performer Label', 'fudge'));
$footer_text            = new EF_Text_Field('ef_footer_text', __('Footer text', 'fudge'));

// Social and Connecting
$social_facebook    = new EF_Text_Field('ef_facebook', __('Facebook URL', 'fudge'));
$social_twitter     = new EF_Text_Field('ef_twitter', __('Twitter URL', 'fudge'));
$social_rss         = new EF_Checkbox_Field('ef_rss', __('Show RSS?', 'fudge'));
$social_email       = new EF_Text_Field('ef_email', __('Email Address', 'fudge'));
$social_google_plus = new EF_Text_Field('ef_google_plus', __('Google+ URL', 'fudge'));
$social_flickr      = new EF_Text_Field('ef_flickr', __('Flickr URL', 'fudge'));
$social_instagram   = new EF_Text_Field('ef_instagram', __('Instagram URL', 'fudge'));
$social_pinterest   = new EF_Text_Field('ef_pinterest', __('Pinterest URL', 'fudge'));
$social_linkedin    = new EF_Text_Field('ef_linkedin', __('LinkedIn URL', 'fudge'));
$social_youtube     = new EF_Text_Field('ef_youtube', __('Youtube URL', 'fudge'));
$social_skype       = new EF_Text_Field('ef_skype', __('Skype User', 'fudge'));
$social_vimeo       = new EF_Text_Field('ef_vimeo', __('Vimeo URL', 'fudge'));

// Misc Fields
$misc_importer       = new EF_Importer_Field('misc-importer', __('Demo Data', 'fudge'), __('Import test data. Success message will follow.', 'fudge'));
$facebook_importer   = new EF_Facebook_Importer_Field('facebook-importer', __('Facebook Data', 'fudge'), __('Import Facebook event pictures. Success message will follow.', 'fudge'));
$eventbrite_importer = new EF_Eventbrite_Importer_Field('eventbrite-importer', __('Eventbrite Data', 'fudge'), __('Import Eventbrite event tickets. Success message will follow.', 'fudge'));
$excel_importer = new EF_Excel_Importer_Field('excel-importer', __('Excel Data', 'cpt'), __('Import data from Excel files. Allowed extension: xlsx. Success message will follow.', 'cpt'));

// Add fields to General Site Options
$tab_general_site_options->add_field('ef_title_logo', new EF_Separator_Field(__('Logo', 'fudge'), '', ''));
$tab_general_site_options->add_field('ef_header_logo', $header_logo);
//$tab_general_site_options->add_field('ef_mobile_logo', $header_mobile_logo);
$tab_general_site_options->add_field('ef_title_font', new EF_Separator_Field(__('Font', 'fudge'), '', ''));
$tab_general_site_options->add_field('ef_font', $font);
$tab_general_site_options->add_field('ef_title_colors', new EF_Separator_Field(__('Colors', 'fudge'), '', ''));
$tab_general_site_options->add_field('ef_primary_color', $primary_color);
$tab_general_site_options->add_field('ef_secondary_color', $secondary_color);
$tab_general_site_options->add_field('ef_highlight_color', $highlight_color);
$tab_general_site_options->add_field('ef_title_performers', new EF_Separator_Field(__('Performers', 'fudge'), '', __('How would you like to call your performers? (Default: Speakers)', 'fudge')));
$tab_general_site_options->add_field('ef_speaker_label_singular', $speaker_label_singular);
$tab_general_site_options->add_field('ef_speaker_label_plural', $speaker_label_plural);
$tab_general_site_options->add_field('ef_footer_text', $footer_text);

// Add fields to Misc tab
$tab_misc->add_field('misc_importer', $misc_importer);
$tab_misc->add_field('facebook_importer', $facebook_importer);
$tab_misc->add_field('eventbrite_importer', $eventbrite_importer);
$tab_misc->add_field('excel_importer', $excel_importer);

// Add fields to Social and Connecting tab
$tab_social_connecting->add_field('ef_linkedin', $social_linkedin);
$tab_social_connecting->add_field('ef_twitter', $social_twitter);
$tab_social_connecting->add_field('ef_facebook', $social_facebook);
$tab_social_connecting->add_field('ef_instagram', $social_instagram);
$tab_social_connecting->add_field('ef_youtube', $social_youtube);
$tab_social_connecting->add_field('ef_pinterest', $social_pinterest);
$tab_social_connecting->add_field('ef_google_plus', $social_google_plus);
$tab_social_connecting->add_field('ef_email', $social_email);
$tab_social_connecting->add_field('ef_vimeo', $social_vimeo);
$tab_social_connecting->add_field('ef_rss', $social_rss);

/*
 * APIs Fields
 */

//for twitter
$twitter_title               = new EF_Separator_Field(__('Twitter', 'fudge'), '', '');
$twitter_access_token        = new EF_Text_Field('efcb_twitter_access_token', __('Twitter Access Token', 'fudge'));
$twitter_access_token_secret = new EF_Text_Field('efcb_twitter_access_token_secret', __('Twitter Access Token Secret', 'fudge'));
$twitter_consumer_key        = new EF_Text_Field('efcb_twitter_consumer_key', __('Twitter Consumer Key', 'fudge'));
$twitter_consumer_secret     = new EF_Text_Field('efcb_twitter_consumer_secret', __('Twitter Consumer Secret', 'fudge'));
//for instagram
//$instagram_title             = new EF_Separator_Field(__('Instagram', 'fudge'), '', '');
//$instagram_client_id         = new EF_Text_Field('efcb_instagram_client_id', __('Instagram Client ID', 'fudge'));
//$instagram_client_secret     = new EF_Text_Field('efcb_instagram_client_secret', __('Instagram Client Secret', 'fudge'));
//$instagram_client_login      = new EF_Link_Field('efcb_instagram_login', __('Instagram Login', 'fudge'), __('Please set as Redirect URI in your APP: ', 'fudge') . admin_url('admin.php?page=ef-options'), array('link' => $instagram_login_url));
//for facebook
$facebook_title              = new EF_Separator_Field(__('Facebook', 'fudge'), '', '');
$facebook_app_id             = new EF_Text_Field('efcb_facebook_rsvp_app_id', __('Facebook App ID', 'fudge'));
$facebook_secret_key         = new EF_Text_Field('efcb_facebook_rsvp_secret', __('Facebook Secret Key', 'fudge'));
$facebook_event_id           = new EF_Text_Field('efcb_facebook_rsvp_event_id', __('Facebook Event ID', 'fudge'));
//for eventbrite
$eventbrite_title            = new EF_Separator_Field(__('Eventbrite', 'fudge'), '', '');
$eventbrite_client_secret    = new EF_Text_Field('efcb_eventbrite_client_secret', __('Eventbrite Client Secret', 'fudge'));
$eventbrite_client_id        = new EF_Text_Field('efcb_eventbrite_client_id', __('Eventbrite Client ID', 'fudge'));
$eventbrite_oauth_token      = new EF_Text_Field('efcb_eventbrite_oauth_token', __('Eventbrite Oauth Token', 'fudge'));
$eventbrite_event_id         = new EF_Text_Field('efcb_eventbrite_event_id', __('Eventbrite Event ID', 'fudge'));
$googlemaps_title            = new EF_Separator_Field(__('Google Maps', 'cpt'), '', '');
$googlemaps_key              = new EF_Text_Field('efcb_googlemaps_key', __('Google Maps API Key', 'cpt'));

// Add fields to APIs
$tab_api->add_field('efcb_twitter_title', $twitter_title);
$tab_api->add_field('efcb_twitter_access_token', $twitter_access_token);
$tab_api->add_field('efcb_twitter_access_token_secret', $twitter_access_token_secret);
$tab_api->add_field('efcb_twitter_consumer_key', $twitter_consumer_key);
$tab_api->add_field('efcb_twitter_consumer_secret', $twitter_consumer_secret);
//$tab_api->add_field('efcb_instagram_title', $instagram_title);
//$tab_api->add_field('efcb_instagram_client_id', $instagram_client_id);
//$tab_api->add_field('efcb_instagram_client_secret', $instagram_client_secret);
//$tab_api->add_field('efcb_instagram_login', $instagram_client_login);
$tab_api->add_field('efcb_facebook_title', $facebook_title);
$tab_api->add_field('efcb_facebook_app_id', $facebook_app_id);
$tab_api->add_field('efcb_facebook_secret_key', $facebook_secret_key);
$tab_api->add_field('efcb_facebook_event_id', $facebook_event_id);
$tab_api->add_field('efcb_eventbrite_title', $eventbrite_title);
$tab_api->add_field('efcb_eventbrite_client_secret', $eventbrite_client_secret);
$tab_api->add_field('efcb_eventbrite_client_id', $eventbrite_client_id);
$tab_api->add_field('efcb_eventbrite_oauth_token', $eventbrite_oauth_token);
$tab_api->add_field('efcb_eventbrite_event_id', $eventbrite_event_id);
$tab_api->add_field('efcb_googlemaps_title', $googlemaps_title);
$tab_api->add_field('efcb_googlemaps_key', $googlemaps_key);
/*
 * Contact
 */
$contacts_title                 = new EF_Separator_Field(__('Contacts', 'fudge'), '', '');
$contacts_recaptcha_public_key  = new EF_Text_Field('efcb_contacts_recaptcha_public_key', __('Recaptcha Site Key', 'fudge'));
$contacts_recaptcha_private_key = new EF_Text_Field('efcb_contacts_recaptcha_private_key', __('Recaptcha Secret Key', 'fudge'));
$contacts_email                 = new EF_Text_Field('efcb_contacts_email', __('Recipient Email', 'fudge'));

$tab_contacts->add_field('efcb_contacts_recaptcha_public_key', $contacts_recaptcha_public_key);
$tab_contacts->add_field('efcb_contacts_recaptcha_private_key', $contacts_recaptcha_private_key);
$tab_contacts->add_field('efcb_contacts_email', $contacts_email);

/*
 * Add All Main Tabs
 */
$theme_options->add_tab(__('General Site Settings', 'fudge'), $tab_general_site_options);
$theme_options->add_tab(__('Social Networks', 'fudge'), $tab_social_connecting);
$theme_options->add_tab(__('Social API', 'fudge'), $tab_api);
$theme_options->add_tab(__('Contact', 'fudge'), $tab_contacts);
$theme_options->add_tab(__('Tools', 'fudge'), $tab_misc);
