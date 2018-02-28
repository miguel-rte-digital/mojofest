<?php

class EF_Eventbrite_Importer_Field extends EF_Field_Base {

    public function __construct($id, $name, $description = '') {
        parent::__construct($id, $name, $description);
        add_action('wp_ajax_ef_eventbrite_import', array($this, 'eventbrite_import'));
        add_action('wp_ajax_nopriv_ef_eventbrite_import', array($this, 'eventbrite_import'));
    }

    public $type = 'importer';

    public function display() {
        $defaults = array(
            'section_prefix' => 'section_prefix_',
            'class'          => 'ef-section ef-eventbrite-importer',
            'style'          => '',
            'id_prefix'      => 'id_prefix',
            'selector'       => '',
            'button_text'    => 'Import'
        );

        $args = wp_parse_args($this->args, $defaults);
        extract($args);
        ?>
        <div id="ef-eventbrite-importer-<?php echo $this->id; ?>" class="import-success"></div>
        <section id="<?php echo $section_prefix . $this->id ?>" class="<?php echo $class ?>" <?php echo $style; ?>>
            <label for="<?php echo $this->id_prefix . $this->id ?>"><?php echo $this->name; ?></label>
            <div class="ajax-loader"></div>	
            <input class="ef-importer" id="eventbrite-importer-submit-<?php echo $this->id; ?>" type="submit" value="<?php echo $button_text; ?>" />
            <div class="import-alert">
                <span>Please note: importing multiple times will create duplicated content.</span>
            </div>
        </section>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#eventbrite-importer-submit-<?php echo $this->id; ?>').click(function (e) {
                    e.preventDefault();
                    $(this).closest('section').find('.ajax-loader').show();
                    $.post(ajaxurl, {
                        action: 'ef_eventbrite_import'
                    }, function (status) {
                        $('#ef-eventbrite-importer-<?php echo $this->id; ?>').html('Eventbrite data imported successfully');
                        $('.ajax-loader').hide();
                    }
                    );

                });
            });
        </script>
        <?php
    }

    public function eventbrite_import() {
        global $eventbrite;
        $ef_options = EF_Event_Options::get_theme_options();
        $eventid    = $ef_options['efcb_eventbrite_event_id'];
        
        if (isset($eventbrite) && !empty($eventid)) {
            $event = $eventbrite->addEntity(new EventBriteEvent($eventid))->load()->load('ticket_classes')->getData();
            if (isset($event) && isset($event['ticket_classes']) && !empty($event['ticket_classes']->ticket_classes)) {
                foreach ($event['ticket_classes']->ticket_classes as $ticket) {
                    $ticket_id    = wp_insert_post(array(
                        'post_type'  => 'ticket',
                        'post_title' => $ticket->name,
                    ));
                    $price        = '0';
                    $availability = 'available';

                    if ($ticket->free != 1) {
                        $price = $ticket->actual_cost->display;
                    }
                    if ($ticket->on_sale_status != 'AVAILABLE') {
                        $availability = 'soldout';
                    }
                    update_post_meta($ticket_id, 'ticket_price', $price);
                    update_post_meta($ticket_id, 'ticket_status', $availability);
                    update_post_meta($ticket_id, 'ticket_features', $ticket->description);
                    update_post_meta($ticket_id, 'ticket_button_link', $event[$eventid]->url);
                    update_post_meta($ticket_id, 'eventbrite_ticket_id', $ticket->id);
                }
            }
            /*if(isset($event) && isset($event['attendees']) && !empty($event['attendees']->attendees)){
                foreach($event['attendees']->attendees as $attendee){
                    wp_insert_user(array(
                        'user_login' => '',
                        'user_url' => '',
                        'roles' => array(),
                        'user_pass' => null,
                        'user_email' => $attendee->profile->email,
                        'first_name' => $attendee->profile->first_name,
                        'last_name' => $attendee->profile->last_name
                    ));
                }
            }*/
        }
        die();
    }

}
