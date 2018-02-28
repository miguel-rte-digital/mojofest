<?php
global $fudge_footer_scripts;
$fudge_footer_scripts[] = "#{$args['element_id']} a { border-bottom-color:{$args['link_font_color']}; color:{$args['link_font_color']} !important; } #{$args['element_id']} a:hover{ border-color: transparent; color:{$args['link_hover_font_color']}!important;}";
?>
<!-- get-touch -->
<section id="<?php echo $args['element_id']; ?>" class="get-touch" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">

        <!-- get-touch__title -->
        <?php if ( !empty($args['title']) ) { ?>
        <h2 class="get-touch__title" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
        <?php } ?>
        <!-- /get-touch__title -->

        <?php if ( !empty($args['subtitle']) ) { ?>
        <div <?php echo $args['styles']['subtitle']; ?>>
            <?php echo $args['subtitle']; ?>
        </div>
        <?php } ?>

    </div>
    <!-- /site__centered -->

</section>
<!-- /get-touch -->