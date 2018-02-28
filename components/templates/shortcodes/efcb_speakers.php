<!-- speakers -->
<section class="speakers speakers_load" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- site__title -->
        <?php if (!empty($args['title']) ) { ?>
            <h2 class="site__title site__title_1" <?php echo $args['styles']['title']; ?>><?php echo stripslashes($args['title']); ?></h2>
        <?php } ?>
        <!-- /site__title -->

        <?php if (!empty($args['subtitle']) ) { ?>
            <p <?php echo $args['styles']['subtitle']; ?>><?php echo stripslashes($args['subtitle']); ?></p>
        <?php } ?>
        <!-- speakers__layout -->
        <?php if ($args['speakers'] && count($args['speakers']) > 0) { ?>
            <div class="speakers__layout">
                <?php
                foreach ($args['speakers'] as $speaker) {
                    $thumbnail       = wp_get_attachment_image_src(get_post_thumbnail_id($speaker->ID), 'fudge-speaker');
                    $permalink       = get_permalink($speaker->ID);
                    $speaker_title    = get_the_title($speaker->ID);
                    $speaker_function = get_post_meta($speaker->ID, 'speaker_function', true);
                    $speaker_keynote   = get_post_meta($speaker->ID, 'speaker_keynote', true);
                    ?>
                    <div class="speakers__item" data-id="<?php echo $speaker->ID; ?>">
                        <!-- speakers__person -->
                        <a href="<?php echo $permalink; ?>" class="speakers__person <?php echo !empty($speaker_keynote) ? 'speakers-favorite' : ''; ?>">
                            <!-- speakers__photo -->
                            <?php
                            $image_style = '';
                            if (!empty($thumbnail[0])) {
                                $image_style = 'style="background-image:url('.$thumbnail[0].')"';
                            } ?>
                            <div class="speakers__photo" <?php echo $image_style; ?>></div>
                            <!-- /speakers__photo -->
                            <!-- speakers__name -->
                            <h2 class="speakers__name" <?php echo $args['styles']['speaker_title']; ?>><?php echo $speaker_title; ?></h2>
                            <!-- /speakers__name -->
                            <!-- speakers__post -->
                            <span class="speakers__post" <?php echo $args['styles']['speaker_subtitle']; ?>><?php echo $speaker_function; ?></span>
                            <!-- /speakers__post -->
                        </a>
                        <!-- /speakers__person -->
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <!-- /speakers__layout -->
        <?php if ( (int)$args['show_pagination'] !== 0 ) { ?>
        <a href="#" class="btn btn_5 speakers__more" data-action="php/speakers-content.php"><?php _e('LOAD MORE', 'fudge'); ?></a>
        <?php } ?>
        <?php
        $pages_links = get_option(Fudge_Theme_Functions::LINKS_OPTION_NAME);
        if ( isset($pages_links['speakers']) && !empty($pages_links['speakers']) ) { ?>
            <a href="<?php echo $pages_links['speakers']; ?>" class="btn btn_6"><?php _e('VIEW ALL', 'fudge'); ?></a>
        <?php } ?>

    </div>
    <!-- /site__centered -->

</section>
<!-- /speakers -->