<!-- hero -->
<?php
$hero_class = '';
if ($args['layout'] == 'slider') {
    $hero_class = 'hero_slider';
} elseif ($args['layout'] == 'video') {
    $hero_class = 'hero_video';
} elseif ($args['layout'] == 'small') {
    $hero_class = 'hero_small';
}
if (empty($args['background_image_desktop'])) {
    $hero_class .= ' hero_no-images';
}
$iframe   = wp_oembed_get($args['youtube_code']);
$video_id = '';
if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $args['youtube_code'], $match)) {
    $video_id = $match[1];
}
?>
<section class="hero <?php echo $hero_class; ?>" id="<?php echo $args['element_id']; ?>">
    <?php if ($args['layout'] == 'slider') { ?>
        <!-- main-slider -->
        <div class="main-slider swiper-container" <?php echo $args['styles']['section']; ?>>
            <div class="swiper-wrapper">
                <?php
                foreach ($args['entities'] as $slider_img_id) {
                    $slider_img = wp_get_attachment_image_src($slider_img_id, 'full');
                    ?>
                    <div class="swiper-slide" style="background-image: url('<?php echo $slider_img[0]; ?>');">

                        <!-- hero__layout -->
                        <div class="hero__layout" <?php echo $args['styles']['section']; ?>>
                            <!-- site__centered -->
                            <div class="site__centered">
                                <!-- time-schedule -->
                                <div class="time-schedule">
                                    <!-- time-schedule__pic -->
                                    <?php if (!in_array($args['layout'], array('small', 'video'))) { ?>
                                        <div class="time-schedule__pic">
                                            <?php if (!empty($args['image'])) { ?>
                                                <img src="<?php echo $args['image']; ?>" width="139" height="139" alt="<?php echo $args['title']; ?>">
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($args['layout'] == 'video') { ?>
                                        <div class="hero__video">
                                            <?php
                                            if (!empty($iframe)) {
                                                echo $iframe;
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <!-- /time-schedule__pic -->
                                    <!-- site__title -->
                                    <?php if (!empty($args['title'])) { ?>
                                        <h2 class="site__title site__title_big site__title_white" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
                                    <?php } ?>
                                    <!-- /site__title -->
                                    <!-- time-schedule__place -->
                                    <time datetime="<?php echo $args['date']; ?>" class="time-schedule__place" <?php echo $args['styles']['date_location']; ?>>
                                        <?php echo $args['datetext'] . ' ' . $args['location']; ?>
                                    </time>
                                    <!-- /time-schedule__place -->
                                    <!-- btn -->
                                    <?php if (empty($args['hide_register_button']) || $args['hide_register_button'] == 'no') { ?>
                                        <a href="<?php echo $args['view_url']; ?>" class="btn btn_1" <?php echo $args['styles']['register_button']; ?>><?php echo $args['view_text']; ?></a>
                                    <?php } ?>
                                    <!-- /btn -->
                                    <!-- time-schedule__save -->
                                    <?php if (empty($args['hide_calendar']) || $args['hide_calendar'] == 'no') { ?>
                                        <div class="time-schedule__save">
                                            <span><?php echo $args['calendar_text']; ?></span>
                                            <div>
                                                <a target="_blank" href="<?php echo Fudge_Theme_Functions::get_calendar_link($args); ?>"><i class="fa fa-google"></i></a>
                                                <a target="_blank"  href="<?php echo Fudge_Theme_Functions::get_calendar_link($args, 'ics'); ?>"><i class="fa fa-apple"></i></a>
                                                <a target="_blank"  href="<?php echo Fudge_Theme_Functions::get_calendar_link($args, 'ics'); ?>"><i class="fa fa-windows"></i></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- /time-schedule__save -->
                                </div>
                                <!-- /time-schedule -->

                            </div>
                            <!-- /site__centered -->
                        </div>
                        <!-- /hero__layout -->
                    </div>
                <?php } ?>
            </div>
            <!-- Add Arrows -->
            <?php if (count($args['entities']) > 1) { ?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <!-- hero__layout -->

        <!-- hero__images -->
        <div class="hero__images">
            <?php if (!empty($args['background_image_desktop'])) { ?>
                <img src="<?php echo $args['background_image_desktop']; ?>" class="background_image background_image_desktop" />
            <?php } ?>
            <?php if (!empty($args['background_image_tablet'])) { ?>
                <img src="<?php echo $args['background_image_tablet']; ?>" class="background_image background_image_tablet" />
            <?php } ?>
            <?php if (!empty($args['background_image_mobile'])) { ?>
                <img src="<?php echo $args['background_image_mobile']; ?>" class="background_image background_image_mobile" />
            <?php } ?>
        </div>
        <!-- /hero__images -->

        <div class="hero__layout" <?php echo $args['styles']['section']; ?>>
            <?php
            if ($args['layout'] !== 'video' && !empty($video_id)) {
                ?>
                <div class="video_background"></div>
                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery('.video_background').YTPlayer({
                            videoId: '<?php echo $video_id; ?>',
                            fitToBackground: true
                        });
                    });
                </script>
            <?php } ?>
            <!-- site__centered -->
            <div class="site__centered">
                <!-- time-schedule -->
                <div class="time-schedule">
                    <!-- time-schedule__pic -->
                    <?php if (!in_array($args['layout'], array('small', 'video'))) { ?>
                        <div class="time-schedule__pic">
                            <?php if (!empty($args['image'])) { ?>
                                <img src="<?php echo $args['image']; ?>" width="139" height="139" alt="<?php echo $args['title']; ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if ($args['layout'] == 'video') { ?>
                        <div class="hero__video">
                            <?php
                            $iframe = wp_oembed_get($args['youtube_code']);
                            if (!empty($iframe)) {
                                echo $iframe;
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <!-- /time-schedule__pic -->
                    <!-- site__title -->
                    <?php if (!empty($args['title'])) { ?>
                        <h2 class="site__title site__title_big site__title_white" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
                    <?php } ?>
                    <!-- /site__title -->
                    <!-- time-schedule__place -->
                    <time datetime="<?php echo $args['date']; ?>" class="time-schedule__place" <?php echo $args['styles']['date_location']; ?>>
                        <?php echo $args['datetext'] . ' ' . $args['location']; ?>
                    </time>
                    <!-- /time-schedule__place -->
                    <!-- btn -->
                    <?php if (empty($args['hide_register_button']) || $args['hide_register_button'] == 'no') { ?>
                        <a href="<?php echo $args['view_url']; ?>" class="btn btn_1" <?php echo $args['styles']['register_button']; ?>><?php echo $args['view_text']; ?></a>
                    <?php } ?>
                    <!-- /btn -->
                    <!-- time-schedule__save -->
                    <?php if (empty($args['hide_calendar']) || $args['hide_calendar'] == 'no') { ?>
                        <div class="time-schedule__save">
                            <span><?php echo $args['calendar_text']; ?></span>
                            <div>
                                <a target="_blank" href="<?php echo Fudge_Theme_Functions::get_calendar_link($args); ?>"><i class="fa fa-google"></i></a>
                                <a target="_blank"  href="<?php echo Fudge_Theme_Functions::get_calendar_link($args, 'ics'); ?>"><i class="fa fa-apple"></i></a>
                                <a target="_blank"  href="<?php echo Fudge_Theme_Functions::get_calendar_link($args, 'ics'); ?>"><i class="fa fa-windows"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- /time-schedule__save -->
                </div>
                <!-- /time-schedule -->

            </div>
            <!-- /site__centered -->
        </div>
        <!-- /hero__layout -->
    <?php } ?>
</section>
<!-- /hero -->
