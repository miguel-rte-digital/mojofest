<?php
$hero_style = $args['styles']['hero'];
if ( !empty($args['hero_background_image']) ) {
    $background = 'background-image: url('.$args['hero_background_image'].'); ';
    if ( !empty($hero_style) ) {
        $hero_style = str_replace(';"', '; '.$background.';"', $hero_style);
    } else {
        $hero_style = ' style="'.$background.'" ';
    }
}
?>
<!-- hero -->
<section class="hero hero_speakers" <?php echo $hero_style; ?>>

    <!-- hero__layout -->
    <div class="hero__layout">

        <!-- site__centered -->
        <div class="site__centered">

            <!-- time-schedule -->
            <div class="time-schedule">

                <!-- site__title -->
                <?php if ( !empty($args['hero_title']) ) { ?>
                <h2 class="site__title site__title_big site__title_white" <?php echo $args['styles']['hero_title']; ?>><?php echo $args['hero_title']; ?></h2>
                <?php } ?>
                <!-- /site__title -->
                <p class="site__desktop" <?php echo $args['styles']['hero_subtitle']; ?>><?php echo $args['hero_subtitle']; ?></p>

                <p class="site__mobile" <?php echo $args['styles']['hero_subtitle']; ?>><?php echo !empty($args['hero_subtitle_mobile']) ? $args['hero_subtitle_mobile']: $args['hero_subtitle']; ?></p>

            </div>
            <!-- /time-schedule -->

        </div>
        <!-- /site__centered -->

    </div>
    <!-- /hero__layout -->

</section>
<!-- /hero -->
<!-- speakers -->
<section class="speakers speakers_page" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- site__title -->
        <?php if ( !empty($args['title']) ) { ?>
        <h2 class="site__title" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
        <?php } ?>
        <!-- /site__title -->

        <?php if ( !empty($args['subtitle']) ) { ?>
        <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
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
                    <div class="speakers__item">
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

    </div>
    <!-- /site__centered -->

</section>
<!-- /speakers -->