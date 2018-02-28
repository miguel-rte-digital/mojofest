<?php

class EF_Facebook_Importer_Field extends EF_Field_Base {

    public function __construct($id, $name, $description = '') {
        parent::__construct($id, $name, $description);
        add_action('wp_ajax_ef_facebook_import', array($this, 'facebook_import'));
        add_action('wp_ajax_nopriv_ef_facebook_import', array($this, 'facebook_import'));
    }

    public $type = 'importer';

    public function display() {
        $defaults = array(
            'section_prefix' => 'section_prefix_',
            'class'          => 'ef-section ef-facebook-importer',
            'style'          => '',
            'id_prefix'      => 'id_prefix',
            'selector'       => '',
            'button_text'    => 'Import'
        );

        $args = wp_parse_args($this->args, $defaults);
        extract($args);
        ?>
        <div id="ef-facebook-importer-<?php echo $this->id; ?>" class="import-success"></div>
        <section id="<?php echo $section_prefix . $this->id ?>" class="<?php echo $class ?>" <?php echo $style; ?>>
            <label for="<?php echo $this->id_prefix . $this->id ?>"><?php echo $this->name; ?></label>
            <div class="ajax-loader"></div>	
            <input class="ef-importer" id="facebook-importer-submit-<?php echo $this->id; ?>" type="submit" value="<?php echo $button_text; ?>" />
            <div class="import-alert">
                <span>Please note: importing multiple times will create duplicated content.</span>
            </div>
        </section>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#facebook-importer-submit-<?php echo $this->id; ?>').click(function (e) {
                    e.preventDefault();
                    $(this).closest('section').find('.ajax-loader').show();
                    $.post(ajaxurl, {
                        action: 'ef_facebook_import'
                    }, function (status) {
                        $('#ef-facebook-importer-<?php echo $this->id; ?>').html('Facebook data imported successfully');
                        $('.ajax-loader').hide();
                    }
                    );

                });
            });
        </script>
        <?php
    }

    public function facebook_import() {
        global $facebook;
        $ef_options = EF_Event_Options::get_theme_options();
        $eventid    = $ef_options['efcb_facebook_rsvp_event_id'];
        if (isset($facebook) && !empty($eventid)) {
            $photos = $facebook->api("/$eventid?fields=photos{picture,created_time}");
            if (isset($photos['photos']) && !empty($photos['photos']['data'])) {
                foreach ($photos['photos']['data'] as $photo) {
                    $file = $photo['picture'];
                    $url  = parse_url($file);
                    if ($url) {
                        $filename    = pathinfo($url['path'], PATHINFO_FILENAME) . "." . pathinfo($url['path'], PATHINFO_EXTENSION);
                        $get         = wp_remote_get($file);
                        $upload_file = wp_upload_bits($filename, null, wp_remote_retrieve_body($get));
                        if (!$upload_file['error']) {
                            $wp_filetype   = wp_check_filetype($filename, null);
                            $attachment    = array(
                                'post_mime_type' => $wp_filetype['type'],
                                //'post_parent'    => 0,
                                'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            );
                            $attachment_id = wp_insert_attachment($attachment, $upload_file['file']);
                            if (!is_wp_error($attachment_id)) {
                                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                                $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
                                wp_update_attachment_metadata($attachment_id, $attachment_data);
                            }
                        }
                    }
                }
            }
        }
        die();
    }

}
