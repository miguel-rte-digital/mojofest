<?php get_header(); ?>
    <!-- hero -->
    <section class="hero">
        <!-- hero -->
        <div class="hero__layout">
            <!-- site__centered -->
            <div class="site__centered">
                <!-- site__title -->
                <h2 class="site__title site__title_white"><?php the_archive_title(); ?></h2>
                <!-- /site__title -->
            </div>
            <!-- /site__centered -->
        </div>
        <!-- /hero -->
    </section>
    <!-- /hero -->
    <!-- news -->
    <section class="news">

        <!-- site__centered -->
        <div class="site__centered">

            <!-- news__layout -->
            <div class="news__layout">
                <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                    $news_title = get_the_title($post->ID);
                    $news_date = get_the_date('', $post->ID);
                    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fudge-news');
                    $permalink = get_permalink($post->ID);
                    $image_style = '';
                    if ( !empty($thumbnail[0]) ) {
                        $image_style = 'style="background-image:url(\''.$thumbnail[0].'\')"';
                    }
                    ?>
                    <!-- news__item -->
                    <div class="news__item">

                        <!-- news__article -->
                        <article class="news__article">

                            <!-- news__picture -->
                            <div class="news__picture" <?php echo $image_style; ?>></div>
                            <!-- /news__picture -->

                            <!-- news__content -->
                            <div class="news__content">

                                <!-- news__date -->
                                <time datetime="<?php echo $news_date; ?>" class="news__date"><?php echo $news_date; ?></time>
                                <!-- /news__date -->

                                <!-- news__title -->
                                <h2 class="news__title"><?php echo $news_title; ?></h2>
                                <!-- /news__title -->

                                <!-- btn -->
                                <a href="<?php echo $permalink; ?>" class="btn btn_4"><span><?php _e('READ MORE', 'fudge'); ?></span></a>
                                <!-- /btn -->

                            </div>
                            <!-- /news__content -->

                        </article>
                        <!-- /news__article -->

                    </div>
                    <!-- news__item -->
                <?php endwhile; else : ?>
                    <p><?php _e('No posts found', 'fudge'); ?></p>
                <?php endif; ?>
            </div>
            <!-- /news__layout -->
            <div class="row posts_navigation">
                <div class="col-md-6 text-left">
                    <?php if( get_previous_posts_link() ) { previous_posts_link(); } ?>
                </div>
                <div class="col-md-6 text-right">
                    <?php if( get_next_posts_link() ) { next_posts_link(); } ?>
                </div>
            </div>
        </div>
        <!-- /site__centered -->

    </section>
    <!-- /news -->
<?php get_footer(); ?>