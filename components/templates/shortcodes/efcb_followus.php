<!-- follow-us -->
<div class="follow-us" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- follow-us__title -->
        <?php if ( !empty($args['title']) ) { ?>
        <div class="follow-us__title" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></div>
        <?php } ?>
        <!-- /follow-us__title -->

        <!-- follow-us__item -->
        <?php if ( !empty($args['hashtag']) ) { ?>
        <span class="follow-us__item">
            <iframe id="twitter-widget-0" src="https://platform.twitter.com/widgets/tweet_button.1384994725.html#_=1385458781193&amp;button_hashtag=<?php echo $args['hashtag']; ?>&amp;count=none&amp;id=twitter-widget-0&amp;lang=en&amp;size=m&amp;type=hashtag" class="twitter-hashtag-button twitter-tweet-button twitter-hashtag-button twitter-count-none" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 120px; height: 20px; margin:0; padding:0; border:none;"></iframe>
        </span>
        <?php } ?>
        <?php if ( !empty($args['facebook']) )  { ?>
        <span class="follow-us__item">
            <div class="fb-like" data-href="<?php echo $args['facebook']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
        </span>
        <?php } ?>
        <!-- /follow-us__item -->

    </div>
    <!-- /site__centered -->

</div>
<!-- /follow-us -->