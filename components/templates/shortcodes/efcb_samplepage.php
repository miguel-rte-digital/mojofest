<?php
$hero_style = $args['styles']['hero'];
if ( !empty($args['hero_image']) ) {
    $background = 'background-image: url('.$args['hero_image'].'); ';
    if ( !empty($hero_style) ) {
        $hero_style = str_replace(';"', '; '.$background.';"', $hero_style);
    } else {
        $hero_style = ' style="'.$background.'" ';
    }
}
?>
<!-- samplepage -->
<section class="hero hero-sample__page" <?php echo $hero_style; ?>>

    <!-- hero -->
    <div class="hero__layout">

        <!-- site__centered -->
        <div class="site__centered">

            <!-- site__title -->
            <?php if ( !empty($args['title']) ) { ?>
            <h2 class="site__title site__title_white" <?php echo $args['styles']['title']; ?>><?php echo stripslashes($args['title']); ?></h2>
            <?php } ?>
            <!-- /site__title -->
            <?php if (!empty($args['subtitle'])) { ?>
            <p class="hero__text" <?php echo $args['styles']['subtitle']; ?>><?php echo stripslashes($args['subtitle']); ?></p>
            <?php } ?>

        </div>
        <!-- /site__centered -->

    </div>
    <!-- /hero -->

</section>
<div class="content" <?php echo $args['styles']['section']; ?>>
    <div class="site__centered">
        <?php echo do_shortcode($args['content']); ?>
    </div>
</div>