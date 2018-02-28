<!-- tickets -->
<section class="tickets" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- site__title -->
        <?php if ( !empty($args['title']) ) { ?>
            <h2 class="site__title site__title_1" <?php echo $args['styles']['title']; ?>>
                <?php echo $args['title']; ?>
            </h2>
        <?php } ?>
        <!-- /site__title -->
        <?php if ( !empty($args['subtitle']) ) { ?>
            <p  <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
        <?php } ?>
        <!-- tickets__layout -->
        <div class="tickets__layout">
            <?php if ( !empty($args['tickets']) ) {
                foreach( $args['tickets'] as $ticket ) {
                    $ticket_price = get_post_meta($ticket->ID, 'ticket_price', true);
                    $ticket_button_text = get_post_meta($ticket->ID, 'ticket_button_text', true);
                    $ticket_button_link = get_post_meta($ticket->ID, 'ticket_button_link', true);
                    $ticket_status = get_post_meta($ticket->ID, 'ticket_status', true);
                    $ticket_features = get_post_meta($ticket->ID, 'ticket_features', true);
                    $ticket_title = get_the_title($ticket->ID);
                    switch($ticket_status) {
                        case 'featured':
                            $class = 'tickets__item_best';
                            break;
                        case 'soldout' :
                            $class = 'tickets__item_disabled';
                            break;
                        default :
                            $class = '';
                    }
                    ?>
                    <!-- tickets__item -->
                    <div class="tickets__item <?php echo $class; ?>" <?php echo $args['styles']['ticket']; ?>>

                        <?php if ( !empty($ticket_price) ) { ?>
                            <span class="tickets__price" <?php echo $args['styles']['ticket_price_box']; ?>><?php echo $ticket_price; ?></span>
                        <?php } ?>
                        <span class="tickets__status" <?php echo $args['styles']['ticket_title']; ?>><?php echo $ticket_title; ?></span>

                        <ul class="tickets__list" <?php echo $args['styles']['ticket_text']; ?>>
                            <?php if ( !empty($ticket_features) ) {
                                $features = preg_split('/\r\n|[\r\n]/',$ticket_features);
                                foreach( $features as $feature ) { ?>
                                    <li><?php echo $feature; ?></li>
                                <?php }
                            } ?>
                        </ul>

                        <a href="<?php echo $ticket_button_link; ?>" class="btn btn_9" <?php echo $args['styles']['ticket_button']; ?>><?php echo $ticket_button_text; ?></a>

                    </div>
                <?php } ?>
                <!-- /tickets__item -->
            <?php } ?>
        </div>
        <!-- /tickets__layout -->

    </div>
    <!-- /site__centered -->

</section>
<!-- /tickets -->