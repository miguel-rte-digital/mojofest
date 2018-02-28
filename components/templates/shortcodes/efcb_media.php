<?php
global $fudge_footer_scripts;
$fudge_footer_scripts[] = " #{$args['element_id']} .media-gallery__item_video:hover::before{ background-color: {$args['icon_font_color']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .media-gallery__item-title { color: {$args['icon_font_color']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .media-gallery__item-title::after, .media-gallery__item-title::before { background-color: {$args['icon_font_color']}; } ";
?>
<!-- media-gallery -->
<section class="media-gallery" <?php echo $args['styles']['section']; ?> id="<?php echo $args['element_id']; ?>">

    <!-- site__title -->
    <?php if ( !empty($args['title']) ) { ?>
    <h2 class="site__title site__title_white" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
    <?php } ?>
    <!-- /site__title -->
    <?php if ( !empty($args['subtitle']) ) { ?>
    <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
    <?php } ?>
    <!-- media-gallery__cover -->
    <div class="media-gallery__cover">

        <!-- media-gallery__wrap -->
        <div class="media-gallery__wrap">
            <?php $i = 0; ?>
            <?php foreach( $args['medias'] as $media ) { ?>
                <?php
                $i++;
                switch($i) {
                    case ($i%9 == 0):
                        $media_class = '';
                        break;
                    case ($i%8 == 0):
                        $media_class = '';
                        break;
                    case ($i%7 == 0):
                        $media_class = '';
                        break;
                    case ($i%6 == 0):
                        $media_class = 'media-gallery__item_width2x';
                        break;
                    case ($i%5 == 0):
                        $media_class = 'media-gallery__item_height2x media-gallery__item_width2x';
                        break;
                    case ($i%4 == 0):
                        $media_class = '';
                        break;
                    case ($i%3 == 0):
                        $media_class = 'media-gallery__item_width2x';
                        break;
                    case ($i%2 == 0):
                        $media_class = '';
                        break;
                    default:
                        $media_class = 'media-gallery__item_height2x';
                }
                if ( intval($media) !== 0 ) {
                    $thumbnail = wp_get_attachment_image_src($media, 'large');
                    $thumbnail = $thumbnail[0];
                    $large_image = wp_get_attachment_image_src($media, 'custom-image-large');
                    $large_image = $large_image[0];
                    $title = get_the_title($media);
                } else {
                    $thumbnail = EF_Framework_Helper::get_video_thumbnail($media, array('youtube' => 'hqdefault', 'vimeo' => 'thumbnail_large'));
                    $embed_code = wp_oembed_get($media);
                    preg_match('/src="([^"]+)"/', $embed_code, $match);
                    $large_image = $match[1];
                    $title = '';
                    $media_class .= ' media-gallery__item_video';
                }
                ?>
                <!-- media-gallery__item -->
                <a href="<?php echo $large_image; ?>" title="<?php echo $title; ?>" class="media-gallery__item <?php echo $media_class; ?>" data-color="<?php echo $args['icon_font_color']; ?>" style="background-image: url('<?php echo $thumbnail; ?>');">
                    <!-- media-gallery__item-title -->
                    <span class="media-gallery__item-title"><?php echo $title; ?></span>
                    <!-- /media-gallery__item-title -->
                </a>
                <!-- /media-gallery__item -->
            <?php } ?>

        </div>
        <!-- /gallery__wrap -->

    </div>
    <!-- /media-gallery__cover -->

    <!-- btn -->
    <?php if ( $args['show_load'] ) { ?>
    <a href="#" data-remaining="<?php echo implode(',',$args['remaining']); ?>" class="btn btn_3 media-gallery__more"><?php _e('LOAD MORE', 'fudge'); ?></a>
    <?php } ?>
    <!-- /btn -->

</section>
<!-- /media-gallery -->