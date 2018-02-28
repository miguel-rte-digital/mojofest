<!-- news -->
<section class="news" <?php echo $args['styles']['section']; ?>>

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
        <!-- news__layout -->
        <div class="news__layout">
            <?php foreach( $args['news'] as $news ) {
                $news_title = get_the_title($news->ID);
                $news_date = get_the_date('', $news->ID);
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($news->ID), 'fudge-news');
                $permalink = get_permalink($news->ID);
                $image_style = '';
                if ( !empty($thumbnail[0]) ) {
                    $image_style = 'style="background-image:url(\''.$thumbnail[0].'\')"';
                }
                ?>
            <!-- news__item -->
            <div class="news__item" data-id="<?php echo $news->ID; ?>">

                <!-- news__article -->
                <article class="news__article">

                    <!-- news__picture -->
                    <div class="news__picture" <?php echo $image_style; ?>></div>
                    <!-- /news__picture -->

                    <!-- news__content -->
                    <div class="news__content">

                        <!-- news__date -->
                        <time datetime="<?php echo $news_date; ?>" class="news__date" <?php echo $args['styles']['news_subtitle']; ?>><?php echo $news_date; ?></time>
                        <!-- /news__date -->

                        <!-- news__title -->
                        <h2 class="news__title" <?php echo $args['styles']['news_title']; ?>><?php echo $news_title; ?></h2>
                        <!-- /news__title -->

                        <!-- btn -->
                        <a href="<?php echo $permalink; ?>" class="btn btn_4" <?php echo $args['styles']['news_detail_button']; ?>><span><?php _e('READ MORE', 'fudge'); ?></span></a>
                        <!-- /btn -->

                    </div>
                    <!-- /news__content -->

                </article>
                <!-- /news__article -->

            </div>
            <!-- news__item -->
            <?php } ?>
        </div>
        <!-- /news__layout -->

        <!-- btn -->
        <?php if ( is_array($args['remaining']) && count($args['remaining']) > 0 ) { ?>
        <a href="#" data-remaining="<?php echo implode(',',$args['remaining']); ?>" class="btn btn_1 news__more">
            <?php echo $args['view_button_text']; ?>
        </a>
        <?php } ?>
        <?php if ( !empty($args['view_all_button_url']) ) { ?>
        <a class="btn btn_6" href="<?php echo $args['view_all_button_url']; ?>"><?php echo $args['view_all_button_text']; ?></a>
        <?php } ?>
        <!-- /btn -->

    </div>
    <!-- /site__centered -->

</section>
<!-- /news -->