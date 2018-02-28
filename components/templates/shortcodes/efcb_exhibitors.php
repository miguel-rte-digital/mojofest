<?php
global $fudge_footer_scripts;

$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select__item, #{$args['element_id']} .ares-select__popup { background-color: {$args['filter_background_color']}; color: {$args['filter_font_color']}; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select::after { border-color: {$args['filter_font_color']} {$args['filter_font_color']} transparent transparent; } ";
$fudge_footer_scripts[] = " #{$args['element_id']} .ares-select { border-color: {$args['filter_font_color']}; } ";
?>
<!-- exhibitors -->
<section class="exhibitors exhibitors_load" id="<?php echo $args['element_id']; ?>" <?php echo $args['styles']['section']; ?>>

    <!-- site__centered -->
    <div class="site__centered">
        <?php if ( !empty($args['title']) ) { ?>
            <h2 class="site__title" <?php echo $args['styles']['title']; ?>>
                <?php echo $args['title']; ?>
            </h2>
        <?php } ?>
        <?php if ( !empty($args['subtitle']) ) { ?>
            <p <?php echo $args['styles']['subtitle']; ?>><?php echo $args['subtitle']; ?></p>
        <?php } ?>

        <?php
        $categories = get_terms('exhibitor-category');
        ?>
        <!-- exhibitors__filters -->
        <div class="exhibitors__filters">
            <?php if ( !empty($categories) && !is_wp_error($categories) ) { ?>
                <select name="selector-filter1" id="selector-category" class=" exhibitor_filter">
                    <option value="0"><?php _e('CATEGORY:', 'fudge'); ?></option>
                    <?php foreach( $categories as $category ) { ?>
                        <option value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                    <?php } ?>
                </select>
            <?php } ?>
            <?php if ( $args['show_search'] !== 'no' ) { ?>
                <div class="site__form">
                    <input type="text" name="search_exhibitors" id="search_exhibitors" placeholder="<?php _e('Search', 'fudge'); ?>" />
                    <span><i class="fa fa-search"></i></span>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <!-- /exhibitors__filters -->

        <!-- exhibitors__items -->
        <div class="exhibitors__items">
            <!-- exhibitors__item -->
            <div class="exhibitors__item exhibitors__item_silver">
                <?php foreach( $args['exhibitors'] as $exhibitor ) {
                    $permalink = get_permalink($exhibitor->ID);
                    $title = get_the_title($exhibitor->ID);
                    $logo = wp_get_attachment_image_src(get_post_thumbnail_id($exhibitor->ID), 'fudge-sponsor');
                    $thumb_style = '';
                    if ( !empty($logo[0]) ) {
                        $thumb_style = " style=\"background-image: url('$logo[0]')\" ";
                    }
                    ?>
                    <a href="<?php echo $permalink; ?>" class="exhibitors__logo" title="<?php echo $title; ?>">
                        <div <?php echo $thumb_style; ?>>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <!-- /exhibitors__item -->
        </div>
        <!-- /exhibitors__items -->

    </div>
    <!-- /site__centered -->

</section>
<!-- /exhibitors -->