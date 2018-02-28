<!-- subscribe -->
<div class="subscribe" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">
        <?php if ( !empty($args['title']) ) { ?>
        <h2 class="subscribe__title" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
        <?php } ?>

        <form action="<?php echo $args['mailchimp_action_url']; ?>" method="POST" novalidate>

            <!-- subscribe__email -->
            <input type="email" name="EMAIL" class="subscribe__email" placeholder="<?php echo $args['textbox_text']; ?>" required/>
            <!-- /subscribe__email -->

            <!-- subscribe__email -->
            <button type="submit" class="btn btn_10" <?php echo $args['styles']['button']; ?>><?php echo!empty($args['button_text']) ? $args['button_text'] : __('SUBSCRIBE', 'fudge'); ?></button>
            <!-- /subscribe__email -->

        </form>

    </div>
    <!-- /site__centered -->

</div>
<!-- /subscribe -->