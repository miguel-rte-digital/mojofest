<!-- social-feed -->
<?php
global $fudge_footer_scripts;
$fudge_footer_scripts[] = " #{$args['element_id']} .social-feed__txt a { color: {$args['tweets_link_color']}; } ";
?>
<?php if( !empty($args['tweets']) && property_exists($args['tweets'], 'statuses') ) { ?>
<div class="social-feed social-feed_load" id="<?php echo $args['element_id']; ?>" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- social-feed__wrap -->
        <div class="social-feed__wrap">

            <!-- social-feed__item -->
            <?php foreach( $args['tweets']->statuses as $tweet ) { ?>
            <div class="social-feed__item">

                <!-- social-feed__inner -->
                <div class="social-feed__inner" <?php echo $args['styles']['tweet']; ?>>

                    <!-- social-feed__head -->
                    <div class="social-feed__head">

                        <!-- social-feed__logo -->
                        <div class="social-feed__logo">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <!-- /social-feed__logo -->

                        <!-- social-feed__name -->
                        <div class="social-feed__name" <?php echo $args['styles']['tweet_name']; ?>><?php echo $tweet->user->name; ?></div>
                        <!-- /social-feed__name -->
                        @<?php echo $tweet->user->screen_name; ?>

                    </div>
                    <!-- /social-feed__head -->

                    <!-- social-feed__txt -->
                    <div class="social-feed__txt" <?php echo $args['styles']['tweet_text']; ?>><?php echo Fudge_Theme_Functions::parse_tweet_text($tweet->text); ?></div>
                    <!-- /social-feed__txt -->

                    <!-- social-feed__hover -->
                    <div class="social-feed__hover">

                        <!-- btn -->
                        <a target="_blank" href="https://twitter.com/<?php echo $tweet->user->screen_name.'/status/'.$tweet->id_str; ?>" class="btn btn_11"><?php _e('VIEW ON TWITTER', 'fudge'); ?> <i class="fa fa-long-arrow-right"></i></a>
                        <!-- /btn -->

                    </div>
                    <!-- /social-feed__hover -->

                </div>
                <!-- /social-feed__inner -->

            </div>
            <?php } ?>
            <!-- /social-feed__item -->

        </div>
        <!-- /social-feed__wrap -->
        <!-- btn -->
        <?php if( !empty($args['tweets']->search_metadata->next_results) ) { ?>
        <a href="#" class="btn btn_1 social-feed__more" data-action="<?php echo $args['tweets']->search_metadata->next_results; ?>"><?php _e('LOAD MORE', 'fudge'); ?></a>
        <?php } ?>
        <!-- /btn -->

    </div>
    <!-- /site__centered -->

</div>
<?php } ?>
<!-- /social-feed -->