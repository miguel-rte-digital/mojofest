<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php
    $speakers_id          = $post->ID;
    $thumbnail            = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fudge-speaker');
    $speaker_subtitle     = get_post_meta($post->ID, 'speaker_title', true);
    $speaker_function     = get_post_meta($post->ID, 'speaker_function', true);
    $speaker_excerpt      = get_post_meta($post->ID, 'speaker_excerpt', true);
    $speaker_linkedin     = get_post_meta($post->ID, 'linkedin_url', true);
    $speaker_facebook     = get_post_meta($post->ID, 'facebook_url', true);
    $speaker_twitter      = get_post_meta($post->ID, 'twitter_url', true);
    $speaker_media        = trim(get_post_meta($post->ID, 'speaker_media', true));
    $my_sessions_title    = get_post_meta($post->ID, 'my_sessions_title', true);
    $my_sessions_subtitle = get_post_meta($post->ID, 'my_sessions_subtitle', true);
    $featured             = get_post_meta($post->ID, 'speaker_keynote', true);

    add_filter('posts_fields', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_fields'));
    add_filter('posts_orderby', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_orderby'));
    $sessions_loop = EF_Session_Helper::get_sessions_loop();
    remove_filter('posts_fields', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_fields'));
    remove_filter('posts_orderby', array('EF_Speakers_Helper', 'ef_speaker_sessions_posts_orderby'));
    ?>
    <!-- hero -->
    <section class="hero">

        <!-- hero__layout -->
        <div class="hero__layout hero__layout_profile">

            <!-- site__centered -->
            <div class="site__centered">

                <!-- speaker-info -->
                <div class="speaker-info">

                    <!--speaker-info__pic-->
                    <div class="speaker-info__pic <?php echo!empty($featured) ? 'speakers-favorite' : ''; ?>">
                        <?php if (!empty($thumbnail[0])) { ?>
                            <img src="<?php echo $thumbnail[0]; ?>" alt="speaker-info">
                        <?php } ?>
                    </div>
                    <!--/speaker-info__pic-->

                    <!--speaker-info__inner-->
                    <div class="speaker-info__inner">

                        <!-- site__title -->
                        <h2 class="site__title site__title_white"><?php the_title(); ?></h2>
                        <!-- /site__title -->

                        <!--speaker-info__text-->
                        <p class="speaker-info__text">
                            <?php echo $speaker_function; ?>
                        </p>
                        <!--/speaker-info__text-->

                    </div>
                    <!--/speaker-info__inner-->

                    <!-- social -->
                    <div class="social">
                        <?php if (!empty($speaker_linkedin)) { ?>
                            <a href="<?php echo $speaker_linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <?php } ?>
                        <?php if (!empty($speaker_facebook)) { ?>
                            <a href="<?php echo $speaker_facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php } ?>
                        <?php if (!empty($speaker_twitter)) { ?>
                            <a href="<?php echo $speaker_twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <?php } ?>
                    </div>
                    <!-- /social -->

                </div>
                <!-- /speaker-info -->

            </div>
            <!-- /site__centered -->

        </div>
        <!-- /hero__layout -->

    </section>
    <!-- /hero -->

    <!--speaker-profile-->
    <div class="speaker-profile">

        <!-- description -->
        <section class="description content">
            <?php the_content(); ?>
        </section>
        <!-- description -->
        <!-- schedule -->
        <section class="schedule">

            <!-- site__centered -->
            <div class="site__centered">

                <!-- site__title -->
                <h2 class="site__title site__title_black"><?php
                    if (!empty($my_sessions_title)) {
                        echo $my_sessions_title;
                    } else {
                        _e('My Sessions', 'fudge');
                    }
                    ?></h2>
                <!-- /site__title -->

                <!--schedule__text-block-->
                <?php if (!empty($my_sessions_subtitle)) { ?>
                    <p class="schedule__text-block">
                        <?php echo $my_sessions_subtitle; ?>
                    </p>
                <?php } ?>
                <!--/schedule__text-block-->

                <!-- schedule__items -->
                <?php if ($sessions_loop->have_posts()): ?>
                    <div class="schedule__items schedule__items_profile">
                        <?php
                        while ($sessions_loop->have_posts()): $sessions_loop->the_post();
                            $session_speakers = get_post_meta(get_the_ID(), 'session_speakers_list', true);
                            if ($session_speakers && is_array($session_speakers) && in_array($speakers_id, $session_speakers)) {
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
                                // speakers
                                $speakers_list = get_post_meta(get_the_ID(), 'session_speakers_list', true);
                                //labels
                                $tracks        = wp_get_post_terms(get_the_ID(), 'session-track');
                                if ($tracks && count($tracks) > 0) {
                                    foreach ($tracks as $track) {
                                        $track->color = EF_Taxonomy_Helper::ef_get_term_meta('session-track-metas', $track->term_id, 'session_track_color');
                                    }
                                }
                                ?>
                                <!-- schedule__item -->
                                <div class="schedule__item schedule__item-drop-down">
                                    <time  class="schedule__time" datetime="<?php echo!empty($session_date) ? date('Y-m-d', strtotime($session_date)) . 'T' . $session_time . ':00' : ''; ?>">
                                        <span><?php echo $session_date; ?></span><?php echo!empty($time) ? ' ' . $time : ''; ?><?php echo!empty($end_time) ? ' - ' . $end_time : ''; ?>
                                    </time>
                                    <!--schedule__inner-->
                                    <div class="schedule__inner">
                                        <h2 class="schedule__event"><?php the_title(); ?></h2>

                                        <!-- schedule__main-place -->
                                        <?php if (isset($location)) { ?>
                                            <a href="#" class="schedule__main-place">
                                                <i class="fa fa-location-arrow"></i>
                                                <?php echo $location->name; ?>
                                            </a>
                                        <?php } ?>
                                        <!-- /schedule__main-place -->
                                    </div>
                                    <!--/schedule__inner-->


                                    <!-- schedule__details -->
                                    <div class="schedule__details">

                                        <!-- schedule__close -->
                                        <a class="schedule__close" href="#"><i class="fa fa-times"></i></a>
                                        <!-- /schedule__close -->

                                        <!-- schedule__layout -->
                                        <div class="schedule__layout">

                                            <!-- schedule__speakers-group -->
                                            <div class="schedule__speakers-group">
                                                <?php
                                                foreach ($speakers_list as $speaker_id) {
                                                    $speakers_image = wp_get_attachment_image_src(get_post_thumbnail_id($speaker_id), apply_filters('ef_schedule_speakers_thumbnail_size', 'fudge-speaker'));
                                                    if (!empty($speakers_image[0])) {
                                                        $speakers_image = ' style="background-image:url(\'' . $speakers_image[0] . '\')" ';
                                                    }
                                                    $featured         = get_post_meta($speaker_id, 'speaker_keynote', true);
                                                    $speaker_function = get_post_meta($speaker_id, 'speaker_function', true);
                                                    ?>
                                                    <!-- schedule__speaker -->
                                                    <a href="<?php echo get_permalink($speaker_id); ?>" class="schedule__speaker">

                                                        <!-- schedule__speaker-pic -->
                                                        <div class="schedule__speaker-pic" <?php echo $speakers_image; ?>>
                                                            <span class="schedule__speaker-hover">VIEW PROFILE +</span>
                                                        </div>
                                                        <!-- /schedule__speaker-pic -->

                                                        <h3 class="schedule__speaker-name"><?php echo get_the_title($speaker_id); ?></h3>

                                                    </a>
                                                    <!-- /schedule__speaker -->
                                                <?php } ?>
                                            </div>
                                            <!-- /schedule__speakers-group -->

                                            <!-- schedule__info -->
                                            <div class="schedule__info">

                                                <!-- schedule__text -->
                                                <div class="schedule__text">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                                <!-- /schedule__text -->

                                                <!-- schedule__labels -->
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
                                                <!-- /schedule__labels -->

                                                <a href="<?php the_permalink(); ?>" class="btn btn_7"><?php _e('READ MORE', 'fudge'); ?></a>

                                            </div>
                                            <!-- /schedule__info -->

                                        </div>
                                        <!-- /schedule__layout -->

                                    </div>
                                    <!-- /schedule__details -->

                                </div>
                                <!-- /schedule__item -->
                                <?php
                            }
                        endwhile;
                        ?>
                    </div>
                <?php endif; ?>
                <!-- /schedule__items -->

            </div>
            <!-- /site__centered -->

        </section>
        <!-- schedule -->

    </div>
    <!--/speaker-profile-->
<?php endwhile; ?>
<?php get_footer(); ?>