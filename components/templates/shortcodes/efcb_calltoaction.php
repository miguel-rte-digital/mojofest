<?php
global $fudge_footer_scripts;
if ( !empty($args['button_hover_font_color']) ) {
    $fudge_footer_scripts[] = "#{$args['element_id']} .btn.btn_1:hover { color:{$args['button_hover_font_color']} !important; }";
}
if ( !empty($args['button_hover_background_color']) ) {
    $fudge_footer_scripts[] = " #{$args['element_id']} .btn.btn_1:hover { background-color: {$args['button_hover_background_color']} !important; border-color: {$args['button_hover_background_color']} !important; }";
}
$register_class = '';
if ( empty($args['background_image']) ) {
    $register_class = ' register-now__no-images ';
}
?>
<!-- register-now -->
<section class="register-now <?php echo $register_class; ?>" <?php echo $args['styles']['section']; ?> id="<?php echo $args['element_id']; ?>">

    <!-- hero__images -->
    <div class="register-now__images">
        <?php if ( !empty($args['background_image']) ) { ?>
        <img src="<?php echo $args['background_image']; ?>" class="register-now__desktop" />
        <?php } ?>
        <?php if ( !empty($args['background_image_tablet']) ) { ?>
        <img src="<?php echo $args['background_image_tablet']; ?>" class="register-now__tablet" />
        <?php } ?>
        <?php if ( !empty($args['background_image_mobile']) ) { ?>
        <img src="<?php echo $args['background_image_mobile']; ?>" class="register-now__mobile" />
        <?php } ?>
    </div>
    <!-- /hero__images -->

    <!-- register-now__layout -->
    <div class="register-now__layout">

        <div class="site__centered" <?php echo $args['styles']['content_element']; ?>>
            <?php if ( !empty($args['title']) ) { ?>
                <h2 class="site__title site__title_white" <?php echo $args['styles']['title']; ?>>
                    <?php echo $args['title']; ?>
                </h2>
            <?php } ?>
            <?php if ( !empty($args['subtitle']) ) { ?>
                <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
            <?php } ?>
            <?php if ( !empty($args['button_text']) ) { ?>
                <a href="<?php echo $args['button_url']; ?>" class="btn btn_1" <?php echo $args['styles']['button']; ?>><?php echo $args['button_text']; ?></a>
            <?php } ?>
        </div>

    </div>
    <!-- /register-now__layout -->

</section>
<!-- /register-now -->