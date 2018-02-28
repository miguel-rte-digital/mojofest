<?php
$date_format = get_option('date_format');
global $fudge_footer_scripts;
if ( !empty($args['day_bar_background_color']) ) {
    $fudge_footer_scripts[] = " #{$args['element_id']} .schedule__date-btn.active { background-color: {$args['day_bar_background_color']}; }";
}
$fudge_footer_scripts[] = " #{$args['element_id']} h2.schedule__event { color: {$args['session_title_font_color']} !important; font-size: {$args['session_title_font_size']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .schedule__time { color: {$args['session_time_font_color']} !important; font-size: {$args['session_time_font_size']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .schedule__main-place { color: {$args['session_location_font_color']} !important; font-size: {$args['session_location_font_size']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .schedule__info .btn { color: {$args['session_button_font_color']} !important; font-size: {$args['session_button_font_size']}; background-color: {$args['session_button_background_color']}; border-color: {$args['session_button_background_color']};} ";
$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select__item, #{$args['element_id']} .ares-select__popup { background-color: {$args['background_color']}; color: {$args['title_font_color']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select::after { border-color: {$args['title_font_color']} {$args['title_font_color']} transparent transparent; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select { border-color: {$args['title_font_color']}; } ";
$hero_style = $args['styles']['hero'];
if ( !empty($args['hero_background_image']) ) {
    $background = 'background-image: url('.$args['hero_background_image'].'); ';
    if ( !empty($hero_style) ) {
        $hero_style = str_replace(';"', '; '.$background.';"', $hero_style);
    } else {
        $hero_style = ' style="'.$background.'" ';
    }
}
?>
<!-- hero -->
<section class="hero hero-full__schedule" <?php echo $hero_style; ?>>

    <!-- hero__layout -->
    <div class="hero__layout">

        <!-- site__centered -->
        <div class="site__centered">

            <!-- site__title -->
            <?php if ( !empty($args['title']) ) { ?>
                <h2 class="site__title site__title_white" <?php echo $args['styles']['title']; ?>><?php echo $args['title']; ?></h2>
            <?php } ?>
            <!-- /site__title -->

            <!-- hero__text -->
            <?php if ( !empty($args['subtitle']) ) { ?>
            <p class="hero__text" <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
            <?php } ?>
            <!-- /hero__text -->

        </div>
        <!-- /site__centered -->

    </div>
    <!-- /hero__layout -->

</section>
<!-- /hero -->
<!-- schedule -->
<section class="schedule" <?php echo $args['styles']['section']; ?> id="<?php echo $args['element_id']; ?>" data-max-items="-1">

    <!-- site__centered -->
    <div class="site__centered">

        <!-- schedule__date-btns -->
        <div class="schedule__date-btns">
            <?php
            $i = 0;
            foreach( $args['dates'] as $date ) {
                $active = '';
                if ( $i == 0 ) { $active = 'active'; }
                $i++;
                ?>
                <a class="schedule__date-btn <?php echo $active; ?>" href="#" data-value="<?php echo $date->meta_value; ?>" <?php echo $args['styles']['day_bar']; ?>><?php echo date_i18n($date_format, $date->meta_value); ?></a>
            <?php } ?>
        </div>
        <!-- /schedule__date-btns -->

        <!-- schedule__filters -->
        <div class="schedule__filters">
            <select name="main-venue" id="main-venue" class="schedule__filters-main-venue">
                <option value="0"><?php _e('All', 'fudge'); ?></option>
                <?php foreach( $args['locations'] as $location ) { ?>
                    <option value="<?php echo $location->term_id; ?>"><?php echo $location->name; ?></option>
                <?php } ?>
            </select>
            <select name="Technology" id="technology" class="schedule__filters-technology">
                <option value="0"><?php _e('All', 'fudge'); ?></option>
                <?php foreach( $args['labels'] as $labels ) { ?>
                    <option value="<?php echo $labels->term_id; ?>"><?php echo $labels->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- /schedule__filters -->
        <!-- schedule__items -->
        <div class="schedule__items">

        </div>
        <!-- /schedule__items -->

    </div>
    <!-- /site__centered -->

</section>
<!-- schedule -->