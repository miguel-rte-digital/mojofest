<!-- facebook-content -->
<div class="facebook-content" <?php echo $args['styles']['section']; ?>>
    <!-- facebook-content__centered -->
    <div class="facebook-content__centered">
        <!-- facebook-content__statistics -->
        <div class="facebook-content__statistics">
            <!-- facebook-content__interested -->
            <div class="facebook-content__interested" <?php echo $args['styles']['box']; ?>>
                <a href="<?php echo $args['event_link']; ?>" class="facebook-content__icon"  <?php echo $args['styles']['icon']; ?> target="_blank"><i class="fa fa-facebook"></i></a>
                <!-- facebook-content__number -->
                <span class="facebook-content__number" <?php echo $args['styles']['number']; ?>><?php echo $args['attendees']['interested']; ?></span>
                <!-- /facebook-content__number -->
                <span <?php echo $args['styles']['label']; ?>><?php _e('Interested', 'fudge'); ?></span>
            </div>
            <!-- /facebook-content__interested -->
            <!-- facebook-content__going -->
            <div class="facebook-content__going" <?php echo $args['styles']['box']; ?>>
                <!-- facebook-content__number -->
                <span class="facebook-content__number" <?php echo $args['styles']['number']; ?>><?php echo $args['attendees']['going']; ?></span>
                <!-- /facebook-content__number -->
                <span <?php echo $args['styles']['label']; ?>><?php _e('Going', 'fudge'); ?></span>
            </div>
            <!-- /facebook-content__going -->
        </div>
        <!-- /facebook-content__statistics -->
        <!-- facebook-content__wrap -->
        <div class="facebook-content__wrap">
            <!-- facebook-content__plugin -->
            <div class="facebook-content__plugin">
                <?php
                if (!empty($args['attendees']) && !empty($args['attendees']['attendees'])) {
                    foreach ($args['attendees']['attendees'] as $attendee) {
                        ?>
                        <a href="<?php echo $attendee['link']; ?>" class="facebook-content__item" style="background-image: url('<?php echo $attendee['picture']; ?>')" target="_blank"></a>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- /facebook-content__plugin -->
            <!-- facebook-content__send -->
            <span class="facebook-content__send" <?php echo $args['styles']['pre_event_link']; ?>><?php echo $args['pre_event_link']; ?></span>
            <!-- /facebook-content__send -->
            <!-- facebook-content__link -->
            <a href="<?php echo $args['event_link']; ?>" class="facebook-content__link" <?php echo $args['styles']['event_link']; ?> target="_blank"><?php echo $args['event_link_text']; ?></a>
            <!-- /facebook-content__link -->
        </div>
        <!-- /facebook-content__wrap -->
    </div>
    <!-- /facebook-content__centered -->
</div>
<!-- /facebook-content -->