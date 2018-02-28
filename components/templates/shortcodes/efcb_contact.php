<!-- contact-us -->
<section class="contact-us" <?php echo $args['styles']['section']; ?>>
    <!-- site__centered -->
    <div class="site__centered">
        <!-- contact-us__content -->
        <div class="contact-us__content">

            <!-- site__title -->
            <?php if (!empty($args['title'])) { ?>
                <h2 class="site__title site__title_to-left" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
            <?php } ?>
            <!-- /site__title -->
            <?php if (!empty($args['subtitle'])) { ?>
                <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
            <?php } ?>
            <!-- contact-us__content-double -->
            <address class="contact-us__content-double" <?php echo $args['styles']['address']; ?>>
                <dl>
                    <dt <?php echo $args['styles']['address']; ?>><?php echo $args['address_title']; ?></dt>
                    <dd><?php echo $args['address_line_1']; ?></dd>
                    <dd><?php echo $args['address_line_2']; ?></dd>
                    <dd><?php echo $args['address_line_3']; ?></dd>
                </dl>
                <dl>
                    <dt <?php echo $args['styles']['address']; ?>><?php echo $args['phone_title']; ?></dt>
                    <dd>
                        <a href="tel:<?php echo $args['phone_1']; ?>"><?php echo $args['phone_1']; ?></a>
                    </dd>
                    <dd>
                        <a href="tel:<?php echo $args['phone_2']; ?>"><?php echo $args['phone_2']; ?></a>
                    </dd>
                    <dd>
                        <a href="tel:<?php echo $args['phone_3']; ?>"><?php echo $args['phone_3']; ?></a>
                    </dd>
                </dl>
            </address>
            <!-- /contact-us__content-double -->
        </div>
        <!-- /contact-us__content -->
        <!-- contact-us__form -->
        <div class="contact-us__form">
            <!-- site__form -->
            <form action="" class="site__form form-validation" novalidate>
                <input type="text" placeholder="<?php _e('Name', 'fudge'); ?>" name="contactName" <?php echo $args['styles']['input']; ?> required>
                <input type="email" placeholder="<?php _e('Email', 'fudge'); ?>" name="email" <?php echo $args['styles']['input']; ?> required>
                <textarea name="comments" id="text" cols="30" rows="10" placeholder="<?php _e('Message', 'fudge'); ?>" <?php echo $args['styles']['input']; ?> required></textarea>
                <div class="contact-us__captcha">
                    <?php if (!empty($args['ef_options']['efcb_contacts_recaptcha_public_key']) && !empty($args['ef_options']['efcb_contacts_recaptcha_private_key'])) { ?>
                        <div class="g-recaptcha" data-sitekey="<?php echo $args['ef_options']['efcb_contacts_recaptcha_public_key']; ?>"></div>
                    <?php } ?>
                </div><!-- /contact-us__captcha -->
                <input type="hidden" name="action" value="send_contact_email" />
                <!-- site__form-submit -->
                <div class="site__form-submit">
                    <!-- btn -->
                    <button type="submit" class="btn btn_2" <?php echo $args['styles']['send_button']; ?>><span><?php echo $args['send_text']; ?></span></button>
                    <!-- /btn -->
                    <!-- site__form-sent -->
                    <span class="site__form-sent site__form-sent_hidden">
                        <i class="fa fa-check"></i><?php _e('MESSAGE SENT!', 'fudge'); ?>
                    </span>
                    <!-- /site__form-sent -->
                </div>
                <!-- /site__form-submit -->
            </form>
            <!-- /site__form -->
        </div>
        <!-- /contact-us__form -->
    </div>
    <!-- /site__centered -->
</section>
<!-- /contact-us -->