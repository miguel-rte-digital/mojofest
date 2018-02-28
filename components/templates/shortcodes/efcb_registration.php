<?php if ( $args['hide_hero'] !== 'yes' ) { ?>
<section class="hero hero-registration" <?php echo $args['styles']['hero']; ?>>
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
<?php } ?>
<div class="register content" <?php echo $args['styles']['section']; ?>>
    <div class="site__centered">
        <div <?php echo $args['styles']['text']; ?>><?php echo $args['text']; ?></div>
        <div <?php echo $args['styles']['text']; ?>><?php echo do_shortcode($args['embed_code']); ?></div>
    </div>
</div>