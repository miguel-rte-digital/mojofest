<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <?php
    // hero background
    $thumbnail       = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $hero_background = '';
    if (!empty($thumbnail[0])) {
        $hero_background = ' style="background-image: url(' . $thumbnail[0] . ')" ';
    }
    // location
    $locations    = wp_get_post_terms(get_the_ID(), 'session-location');
    if ($locations && count($locations) > 0)
        $location     = $locations[0];
    // date
    $session_date = get_post_meta($post->ID, 'session_date', true);
    if (empty($session_date)) {
        $session_date = get_the_date(get_option(' date_format'), $post->ID);
    } else {
        $session_date = date_i18n(get_option('date_format'), $session_date);
    }
    // time
    $wp_time_format = get_option("time_format");
    $session_time   = get_post_meta($post->ID, 'session_time', true);
    if (!empty($session_time)) {
        $time_parts = explode(':', $session_time);
        if (count($time_parts) == 2)
            $time       = date($wp_time_format, mktime($time_parts[0], $time_parts[1], 0));
    }
    $end_time = get_post_meta($post->ID, 'session_end_time', true);
    if (!empty($end_time)) {
        $time_parts = explode(':', $end_time);
        if (count($time_parts) == 2)
            $end_time   = date($wp_time_format, mktime($time_parts[0], $time_parts[1], 0));
    }
    // other options
    $session_registration_code  = get_post_meta($post->ID, 'session_registration_code', true);
    $session_registration_title = get_post_meta($post->ID, 'session_registration_title', true);
    $session_registration_text  = get_post_meta($post->ID, 'session_registration_text', true);
    $session_speakers_title     = get_post_meta($post->ID, 'session_speakers_title', true);
    // speakers
    $speakers_list              = get_post_meta(get_the_ID(), 'session_speakers_list', true);
    //labels
    $tracks                     = wp_get_post_terms(get_the_ID(), 'session-track');
    if ($tracks && count($tracks) > 0) {
        foreach ($tracks as $track) {
            $track->color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $track->term_id, 'session_track_color');
        }
    }
    ?>
    <!-- hero -->
    <section class="hero hero_session" <?php echo $hero_background; ?>>
        <!-- hero__layout -->
        <div class="hero__layout">
            <!-- site__centered -->
            <div class="site__centered">
                <!-- time-schedule -->
                <div class="time-schedule">
                    <!-- site__title -->
                    <h2 class="site__title site__title_white site__title_session"><?php the_title(); ?></h2>
                    <!-- /site__title -->
                    <!-- time-schedule__session -->
                    <div class="time-schedule__session">
                        <!-- time-schedule__session__place -->
                        <?php if (isset($location)) { ?>
                            <span class="time-schedule__session__place"><i class="fa fa-location-arrow"></i> <?php echo $location->name; ?></span>
                        <?php } ?>
                        <!-- /time-schedule__session__place -->
                        <time datetime="<?php echo!empty($session_date) ? date('Y-m-d', strtotime($session_date)) . 'T' . $session_time . ':00' : ''; ?>">
                            <?php echo $session_date; ?><?php echo!empty($time) ? ', ' . $time : ''; ?><?php echo!empty($end_time) ? '-' . $end_time : ''; ?>
                        </time>
                    </div>
                    <!-- /time-schedule__session -->
                </div>
                <!-- /time-schedule -->
            </div>
            <!-- /site__centered -->
        </div>
        <!-- /hero__layout -->
    </section>
    <!-- /hero -->
    <!-- presented -->
    <div class="presented">
        <!-- site__centered -->
        <div class="site__centered">
            <!-- speakers__layout -->
            <div class="speakers__layout">
                <?php
                if (!empty($speakers_list)) {
                    foreach ($speakers_list as $speaker_id) {
                        $speakers_image = wp_get_attachment_image_src(get_post_thumbnail_id($speaker_id), apply_filters('ef_schedule_speakers_thumbnail_size', 'fudge-speaker'));
                        if (!empty($speakers_image[0])) {
                            $speakers_image = ' style="background-image:url(\'' . $speakers_image[0] . '\')" ';
                        }
                        $featured         = get_post_meta($speaker_id, 'speaker_keynote', true);
                        $speaker_function = get_post_meta($speaker_id, 'speaker_function', true);
                        ?>
                        <div class="speakers__item">
                            <!-- speakers__person -->
                            <a href="<?php echo get_permalink($speaker_id); ?>" class="speakers__person <?php echo!empty($featured) ? 'speakers-favorite' : ''; ?>">

                                <!-- speakers__photo -->
                                <div class="speakers__photo" <?php echo $speakers_image ?>></div>
                                <!-- /speakers__photo -->

                                <!-- speakers__name -->
                                <h3 class="speakers__name"><?php echo get_the_title($speaker_id); ?></h3>
                                <!-- /speakers__name -->

                                <!-- speakers__post -->
                                <span class="speakers__post"><?php echo $speaker_function; ?></span>
                                <!-- /speakers__post -->

                            </a>
                            <!-- /speakers__person -->
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
            <!-- /speakers__layout -->

        </div>
        <!-- /site__centered -->
    </div>
    <!-- /presented -->

    <!-- session -->
    <section class="session">
        <!-- site__centered -->
        <div class="site__centered">
            <!-- session__text -->
            <div class="session__text content">
                <!-- site__title_subtitle -->
                <?php if (!empty($session_subtitle)) { ?>
                    <h2 class="site__title site__title_subtitle"><?php echo $session_subtitle; ?></h2>
                <?php } ?>
                <!-- /site__title_subtitle -->

                <?php the_content(); ?>

                <div class="session__labels">
                    <?php
                    if (!empty($tracks)) {
                        foreach ($tracks as $track) {
                            $style = '';
                            if (!empty($track->color)) {
                                $style = ' style="background-color: ' . $track->color . '"';
                            }
                            echo '<span class="label" ' . $style . '>' . $track->name . '</span> ';
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- /session__text -->
        </div>
        <!-- /site__centered -->
    </section>
    <!-- /session -->


    <!-- registration -->
    <?php if (!empty($session_registration_title) && !empty($session_registration_text) && !empty($session_registration_code)) { ?>
        <section class="registration">
            <!-- site__centered -->
            <div class="site__centered">
                <!-- site__title -->
                <?php if (!empty($session_registration_title) && !empty($session_registration_text)) { ?>
                    <h2 class="registration__title"><?php echo $session_registration_title; ?>
                        <span><?php echo $session_registration_text; ?></span>
                    </h2>
                <?php } ?>
                <!-- /site__title -->
                <!-- registration__wrap -->
                <?php if (!empty($session_registration_code)) { ?>
                    <div class="registration__wrap">
                        <?php echo do_shortcode($session_registration_code); ?>
                    </div>
                <?php } ?>
                <!-- /registration__wrap -->
            </div>
            <!-- /site__centered -->
        </section>
    <?php } ?>
    <!-- /registration -->
<?php endwhile; ?>

<?php get_footer(); ?>